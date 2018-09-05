<?php 

	require __DIR__ . '/../vendor/autoload.php';

	use Romerito\Suap\SuapClient as SC;
	use Romerito\Suap\SuapAPI as SA;
	$user = readline();
	$pass = readline();

	$suap = new SC;
	echo $suap->auth ($user, $pass);
	echo $suap->getToken() . "\n\n";

	$out = $suap->get(SA::MYDATA);

	echo $out->id . "\n";



 ?>