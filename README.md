# How to run this application

## System Requirements: 

* Q5 - 
* PHP >= 5.6
* MySQL >= 5.6
* Use settings.php for database settings.

* I would prefer to use some authentication token in order to maintain state. But as per requirement 
* for this project I used file id to maintain state.
* I used slim framework, as I am familiar with it and its a powerful and light weight Rest framework.  
* I also used Slim Eloquent (ORM) for this application to connect to database. Its easy to setup and use so for this
* small project, I thought of using this.


* Q6 - 
* composer (for dependencies - just in case, you don't have to since i have included vendor)
* I first goto stackoverflow to see if I can find something useful.
* There are couple of resources or blogs that I like using such as MDN, stackoverflow etc.
* 2nd would be people and 3rd books.
* Probably using API Client eg many browsers come with extensions.



# Slim Framework 3 Skeleton Application

Use this skeleton application to quickly setup and start working on a new Slim Framework 3 application. This application uses the latest Slim 3 with the PHP-View template renderer. It also uses the Monolog logger.

This skeleton application was built for Composer. This makes setting up a new Slim Framework application quick and easy.

## Install the Application

Run this command from the directory in which you want to install your new Slim Framework application.

    php composer.phar create-project slim/slim-skeleton [my-app-name]

Replace `[my-app-name]` with the desired directory name for your new application. You'll want to:

* Point your virtual host document root to your new application's `public/` directory.
* Ensure `logs/` is web writeable.

To run the application in development, you can also run this command. 

	php composer.phar start

Run this command to run the test suite

	php composer.phar test

That's it! Now go build something cool.
# nova-test
