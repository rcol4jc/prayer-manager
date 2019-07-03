# prayer-manager
A program to manage prayer requests for different users

## Purpose
My wife had been wanting my to make her a prayer request program and journal for a couple of years so I thought this would be a job for 
Laravel and would be a great project for me to show what I've learned. This is the alpha version and only the prayer request program. I will be refactoring and updating as time goes on. This is open
source and you may clone it and modify to your heart's content

## Technologies used

1. Laravel 5.8
2. JavaScript 
3. CSS SASS
4. Bootstrap
5. PHP 7+
6. MySql

## Requirements to Run

1. PHP 7+
2. Composer
3. node.js (npm) for installing dependies
4. git

## Instructions to install

1. Make sure PHP 7+ and Mysql is installed and running. I recommend Xampp for windows users.
2. Create and empty mysql database and note the name, username, and password.
3. Make sure git is installed. 
4. At a command prompt, type "git clone https://github.com/rcol4jc/prayer-manager.git". This will create a prayer-manager folder in your current directory.
5. Cd into that directory.
6. Run 'composer install'
7. Run 'npm install'
8. copy .env.exmple file to .env
9. Type 'php artisan key:generate'
10. Edit the .env (not .env.example) and under the mysql settings, put in your database name, username, and password from step 2.
11. Type 'php artisan migrate' to set up the tables in the database.
12. Type 'php artisan serve' to start the development. Browse to http://localhost:8000 to see the running site
13. Register as a new user and play around!

## Demo live

I have a demo of this up at:

http://prayer-journal.rickcollins.info

You have two users to chose from:

Username: johndoe
Password: Abcd1234@

Username: janedoe
Password: Abcd1234@
