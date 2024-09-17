Assignment
Project Description
This project is a responsive job sheet viewing system where users can view various details about jobs, including client information, reported issues, and technician assignments. It was designed to be responsive for desktop resolution.

Tech Stack
Frontend: HTML, CSS (Flexbox/Grid)
Backend: PHP (PDO for database interaction)
Database: SQLite
Features
Responsive design for desktop
Displays job sheet details with sections for client information, technician, and status
Option to add or update notes for each job sheet
Local Setup
To set up this project on your local machine, follow the steps below:

Prerequisites
Make sure you have the following installed:
PHP (version 7.x or above)
SQLite
A web server (like XAMPP, WAMP, or MAMP for local testing)


Steps
Clone the repository

bash

git clone https://github.com/abhi07rana/-assignment.git
Navigate to the project directory

bash

cd -assignment
Start a PHP development server

You can use the built-in PHP server for quick testing.


php -S localhost:8000
Database setup

The database file client_management.db is included in the project. If it's missing, you can create a new SQLite database in the root directory of the project and run the appropriate table creation queries as per the project requirement.
Ensure your PHP environment supports SQLite.
