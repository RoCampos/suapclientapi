# PHP SUAP CLIENT API

This project implements a wrapper to [SUAP API](https://bit.ly/2N10jvW). The aim is to provide php code to deal with functionalities provided by SUAP API. In this way, it is possible construct php aplications using the SUAP API in php way. 

## How to install

The package can be installed from the [packagist.org](https://packagist.org/packages/romeritocampos/suap-php-api) by the following command:
> composer require "composer require romeritocampos/suap-php-apiˆ^v0.1-beta"

## How to use

The package has two modelus. The first module is defined under ```Romerito\Suap``` namespace. This module contains classe to make appropriate calls to SUAP API and access the data available. The second module is defined under ```Romerito\model``` namespace and its classes are used to represent the information as objects.

### Authorization

Authorization process requires the user credentials. In the following code, it is shown how to perform to check the user credentials and access the token generated in case of valid informations.

```php
<?php 
	require __DIR__ . "/vendor/autoload.php";
	use Romerito\Suap\SuapClient;
	$client = new SuapClient;
	#user credentials
	$user = readline();
	$pass = readline();
	#true or false
	$res = $client->auth ($user, $pass);
	#generated token
	$token = $client->getToken();
	echo $token . "\n";
```

## General Calls
Alternativelly, it is possible use URL's provided by the API in the following way
```php
    	require __DIR__ . "/vendor/autoload.php";
	use Romerito\Suap\SuapClient;
	$client = new SuapClient;
	$user = readline();
	$pass = readline();
	if ($client->auth ($user, $pass)) {
		$result = $client->get("/minhas-informacoes/meus-dados/");
		var_dump($result);
	}
````

It is important to note that the URL provided ocasionally demands some parameters, then the url must be built and passed to the get() method. These details must be checked on [SUAP API](https://bit.ly/2N10jvW).

## Using ProfessorClient

The package provides a class to handle calls to specific resource - Professor. So far, it is possible obtain personal informations and school regiter books associated to a professor. This can be done by the use of ProfessorClient class.

The following code shows how to use ProfessorClient class to make calls to SUAP API:

```php
<?php
	require __DIR__ . "/vendor/autoload.php";
	use Romerito\Suap\SuapClient;
	use Romerito\Suap\ProfessorClient;
	$client = new SuapClient;
	$user = readline();
	$pass = readline();
	$client->auth($user, $pass);
	$pclient = new ProfessorClient($client);
	$object = $pclient->getProfessorObject();
	echo  get_class($object) . "\n";
```
