**Visitor App**

A simple application which saves visitor information in csv format. can be found at https://visitors-app.herokuapp.com/

**Installation**
 1) Pull the git repo
 2) run the command composer install
 3) run the command npm install 
 4) run the command php artisan serve to run the server in localhost
 
**Code Description**
 1) MVC and Repository Design Pattern is used to make the app scalable
 2) Bootstrap is used for front end designing
 3) Blade Engine is used as front end template
 4) CI integration via https://travis-ci.org/ and automated deploy to Heroku
 4) Test is done before CI via https://github.com/atoum/atoum
 5) Tested in code quality checking service https://codeclimate.com/