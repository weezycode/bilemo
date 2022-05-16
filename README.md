<h1 align="center">
Bilemo
</h1>

## *BileMo is a company offering a whole selection of high-end cell phones*.

*I am in charge of the development of the mobile showcase of the company BileMo. BileMo's business model is not to sell its products directly on the site, but to provide all platforms that wish to access the catalog via an API (Application Programming Interface). It is therefore a sale exclusively in B2B (business to business).*

*A certain amount of information has been identified. It must be possible to:*

* *consult the list of BileMo products*
* *consult the details of a BileMo product*
* *consult the list of registered users linked to a client on the website*
* *consult the details of a registered user linked to a client* 
* *add a new user linked to a customer*
* *delete a user added by a customer*

* *Only referenced clients can access the APIs. API clients must be authenticated via JWT*

## Installation

*Before installing the project make sure you have PHP8 ^ and composer.*

*To install the project, open your terminal, copy the link and paste it in your development path or anywhere*

      git clone https://github.com/weezycode/bilemo.git

*After cloning the project, go to the folder*

      cd bilemo

*Now install the project*

      composer install
## *Create the database mysql or other and update the .ENV file for the database connection * 


### :warning:  *if you don't have the Symfony CLIENT use  "php bin/console" instead "symfony console"*


*Make migrate the tables in your database*

      symfony console doctrine:migrations:migrate
*Now launch the datasets*

      symfony console doctrine:fixtures:load  
*Now launch a server* 

      symfony serve       
*Or*

      php bin/console server:run
      
## *Documentation*

 *And it's over, go in documentation =>  https://localhost:8000/api/docs*   


*If you want to get a token login with :* 

*Email*

    mauritel@shop.fr
*Password* 

    pass_1234
    
*Enjoy* 😃

[![Codacy Badge](https://app.codacy.com/project/badge/Grade/bba402e9b31e41558192a8af4b8c0e3b)](https://www.codacy.com/gh/weezycode/bilemo/dashboard?utm_source=github.com&amp;utm_medium=referral&amp;utm_content=weezycode/bilemo&amp;utm_campaign=Badge_Grade)
