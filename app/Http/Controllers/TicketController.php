<?php

namespace App\Http\Controllers;

use App\Ticket;
use App\Customer;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' =>['create', 'store', 'track']]);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $tickets = Ticket::with('customer')->latest();

        if($request->status) {
            $tickets = $tickets->whereStatus($request->status);
        }
        if($request->search) {
            $search = $request->search;
            $tickets = $tickets->whereHas('customer', function($q) use($search) {
                $q->where('name', 'Like', "%$search%");
            });
        }

        $tickets = $tickets->paginate(2);
        return view('tickets.index', compact('tickets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // 
        return view('tickets.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validate form data
        $this->validate($request, [
                'name' => 'required',
                'email' => 'required',
                'phone' => 'required',
                'description' => 'required'
            ]);
        
        $customer = \App\Customer::whereEmail($request->email)->first();
        if(!$customer) {
            $customer = new \App\Customer();
            $customer->name = $request->name;
            $customer->email = $request->email;
            $customer->phone = $request->phone;
            // save customer in db
            $customer->save();
        }

        if($customer->id) {
            // 
            $ticket = new \App\Ticket();
            $ticket->customer_id = $customer->id;
            $ticket->description = $request->description;
            $reference = time();
            $ticket->reference = $reference;
            // save ticket/issue in db
            if ($ticket->save()) {
                // 
                // send acknowledgement email to customer
                \Mail::to($customer->email)->send(new \App\Mail\CustomerAcknowledgementMail(['reference'=> $reference]));

                return redirect('/')->with('flash_message_success', 'Support request created successfully! Support ticket reference: '.$reference);
                // return redirect('classes')->with('flash_message_success', 'Support request created successfully!');
            }
        }

        return redirect()->back()->withInput()->with('flash_message_error', 'Support request couldn`t create successfully! Please chack entered data.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function show($reference)
    {
        //
        $ticket = \App\Ticket::with('responseBy')->with('customer')->whereReference($reference)->first();
        return view('tickets.show', compact('ticket'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function track(Request $request)
    {
        //
        $reference = $request->reference;
        $ticket = \App\Ticket::with('responseBy')->with('customer')->whereReference($reference)->first();
        return view('tickets.show', compact('ticket'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function edit(Ticket $ticket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $ticket)
    {
        //
        $this->validate($request, [
                'response' => 'required'
            ]);

        $ticket = Ticket::find($ticket);
        $ticket->response = $request->response;
        $ticket->response_by = \Auth::user()->id;
        $ticket->status = 'closed';

        if ($ticket->update()) {
            // 
            $customer = \App\Customer::find($ticket->customer_id);
            // send status update email to customer
            \Mail::to($customer->email)->send(new \App\Mail\TicketUpdateMail(['reference'=> $ticket->reference]));
            
            return redirect('tickets')->with('flash_message_success', 'Support request updated successfully! Support ticket reference: '.$ticket->reference);
        }

        return redirect()->back()->withInput()->with('flash_message_error', 'Support request couldn`t update successfully! Please chack entered data.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ticket $ticket)
    {
        //
    }
}
