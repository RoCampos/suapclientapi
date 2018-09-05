<?php 

	require __DIR__ . '/../vendor/autoload.php';

	use Romerito\Suap\SuapClient as SC;
	$user = '1047828';
	$pass = '@*sj87pe01@';


	$suap = new SC;
	echo $suap->auth ($user, $pass);
	echo $suap->getToken() . "\n";

 ?>