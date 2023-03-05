Laravel Task Management Application
This is a Task management application built with Laravel. With this application, users can create, edit, and delete tasks.

Requirements
PHP >= 8
Composer
MySQL >= 5.7
Installation
Clone the repository:

bash
Copy code
git clone https://github.com/Ilham-Mohamed/Cyntrek-Technical-Assessment.git
Install dependencies:

bash
Copy code
composer install
Create a new MySQL database for the application.

Copy the .env.example file and rename it to .env:

bash
Copy code
cp .env.example .env
Update the .env file with your database credentials:

.env
Copy code
DB_DATABASE=taskmngapp
DB_USERNAME=root
DB_PASSWORD=
Generate a new application key:

bash
Copy code
php artisan key:generate
Run the database migrations:

bash
Copy code
php artisan migrate
Start the development server:

bash
Copy code
php artisan serve
Visit http://127.0.0.1:8000 in your browser to view the application.


To use the application, register a new user account, then log in to create, edit, and delete tasks.

Gmail Configuration

I would like to take a moment to inform you that third-party access is not allowed on Google Gmail account.

Sample Indexpage of My localhost
https://drive.google.com/file/d/155x3r9F7iDzGGknWHNmptt7bp9XU22GN/view?usp=sharing
