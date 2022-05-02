## Installation Process

Clone or download the source repository to local/server environment.

**In terminal, **
- move to root directory of the source repository.
- run `composer install` or `composer update` to install the dependencies of the project.
- updated `.env` file with required environment variables such as 


	`APP_NAME="Support Platform"`

	`DB_CONNECTION=mysql`
	`DB_HOST=127.0.0.1`
	`DB_PORT=3306`
	`DB_DATABASE=support-platform`
	`DB_USERNAME=root`
	`DB_PASSWORD=`

	Use mailtrap for email testing. 
	`MAIL_MAILER=smtp`
	`MAIL_HOST=smtp.mailtrap.io`
	`MAIL_PORT=2525`
	`MAIL_USERNAME=xxxxxxxxxxxxxx`
	`MAIL_PASSWORD=xxxxxxxxxxxxxx`
	`MAIL_ENCRYPTION=tls`
	`MAIL_FROM_ADDRESS=your-email@mail.com`
	`MAIL_FROM_NAME="${APP_NAME}"`


- run `php artisan migrate:fresh --seed` to migrate & seed initial user acount into the database. 
- run `php artisan serve` to start the server. 
- to open the application, browse the link `http://127.0.0.1:8000` 

- login details: email: pradeepprasanna.rajapaksha4@gmail.com, password: password