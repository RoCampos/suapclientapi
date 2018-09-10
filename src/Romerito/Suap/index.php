<?php 

	require __DIR__ . "/vendor/autoload.php";

	use Romerito\Suap\SuapClient;

	$client = new SuapClient;

	$user = readline();
	$pass = readline();

	$token = $client->auth ($user, $pass);

	echo $token . "\n";





