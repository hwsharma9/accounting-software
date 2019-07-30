CI3HMVC
=======

This is a base package of CodeIgniter with HMVC applied that I use for new projects.

- [CodeIgniter 3.1.6](http://codeigniter.com)
- [HMVC (e52dcb6)](http://bitbucket.org) patched for method name change in CI

I put `index.php` into a `/public` folder as well to keep the other stuff out of the web server path.


Unit Testing
------------

Unit Testing for CI is a pita with PHPUnit so I added and updated an old 2.x unit testing thing
I have used for quite some time. The file `application\modules\libraries\Ciut.php` has all the details if you are interested. 

Also
----

I use Vagrant for development:

    composer create-project mtvee/ci3hmvc NAME
    cd NAME
    composer require laravel/homestead --dev
    \\vendor\\bin\\homestead make
    vagrant up

Issues
------

Homestead php 7.1 sql pdo shared lib is [busted sometimes](https://github.com/laravel/homestead/issues/715). Set the following to use php 5.6 in the `Homestead.yaml` file.
    
    sites:
        ...
        php: "5.6"

