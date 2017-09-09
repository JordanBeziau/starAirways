star-airways
============

* Clone or download .zip folder
* Set parameters.yml up to your database
* Create database : ```php bin/console doctrine:database:create```
* Migrate entities :
    
    * ```php bin/console doctrine:migrations:diff```
    
    * ```php bin/console doctrine:migrations:migrate```
    
* Load fixtures : ```php bin/console doctrine:fixtures:load```

Then start server with ```php bin/console server:start``` and the app is ready.
