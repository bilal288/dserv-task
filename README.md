

## Project is based on  Laravel 9.* 
* [Programing Languages](#programing)
* [Features](#feature1)
* [Requirements](#feature2)
* [How to install](#feature3)
* [License](#feature5)
wqewqe
<a name="programing"></a>
## Programing Languages used in this project:
* Html
* Css
* Bootstrap
* Jquery
* Ajax
* Php
* MySql
* Frameworks: 
	* Laravel 9.x

-----
<a name="feature1"></a>
## Starter Site Features:
* Laravel 9.x
* Back-end
	* Automatic install and setup website.
	* Dashboard.
    * Add User.
    * Delete user
	* Edit User
	* View all user and their groups


-----
<a name="feature2"></a>
##Requirements

	PHP >= 8
	Composer

-----
<a name="feature3"></a>
##How to install:
* [Step 1: Get the code](#step1)
* [Step 2: Use Composer to install dependencies](#step2)
* [Step 3: Create database](#step3)
* [Step 4: Install](#step4)
* [Step 5: Start Page](#step5)


-----
<a name="step1"></a>
### Step 1: Get the code - Download the repository
	Donwload the repository 
Extract it in www(or htdocs if you using XAMPP or MAMP) folder and put it for example in Starter folder.

-----
<a name="step2"></a>
### Step 2: Use Composer to install dependencies

Laravel utilizes [Composer](http://getcomposer.org/) to manage its dependencies. First, download a copy of the composer.phar.
Once you have the PHAR archive, you can either keep it in your local project directory or move to
usr/local/bin to use it globally on your system.
On Windows, you can use the Composer [Windows installer](https://getcomposer.org/Composer-Setup.exe).
Open terminal and go to the project foleder
Then run:

    composer dump-autoload
    composer install --no-scripts

-----
<a name="step3"></a>
### Step 3: Create database

If you finished first two steps, now you can create database on your database server(MySQL). You must create database
Just go to the phpmyadmin and create the new database
After that, copy .env.example and rename it as .env and put connection and change default database connection name, only database connection, put name database, database username and password.

-----
<a name="step4"></a>
### Step 4: Install

Go to your cmd or terminal then type your project root path and after that type the following:

Now that you have the environment configured, you need to create a database configuration for it. For create database tables use this command:

    php artisan migrate

And to initial populate database use this:

    php artisan db:seed

If you install on your localhost in folder ProjectFolder, you can type on web browser:

	http://localhost/ProjectFolder/

OR Run the command " php artisan serv ", and open on the browser the url you get in console :):

-----
<a name="step5"></a>
### Step 5: Start Page

You can now see all the user and their groups



### RuntimeException : No supported encrypter found. The cipher and / or key length are invalid.

    php artisan key:generate

### Site loading very slow

	composer dump-autoload --optimize
OR

    php artisan dump-autoload

-----
<a name="feature4"></a>
## License

This is free software distributed under the terms of the MIT license



