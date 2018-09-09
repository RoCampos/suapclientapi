<?php 

	require __DIR__ . '/../vendor/autoload.php';

	use Romerito\Suap\SuapClient as SC;
	use Romerito\Suap\SuapAPI as SA;
	use Romerito\Suap\ProfessorClient as PS;
	use Romerito\model\Professor;
	// $user = readline();
	// $pass = readline();

	$suap = new SC;
	echo $suap->auth (1047828, "@*sj87pe01@");

	#school register book exemplo
	// var_dump(SA::SRBOOKS . "2018" . "/1");
	// $data = $suap->get(SA::SRBOOKS . "2018" . "/1");
	// var_dump($data);
	$pclient = new PS ($suap);
	$data = $pclient->getSchoolRegisterBooks(2017,1);
	// var_dump($data);
	
	var_dump($data[0]);

	$data2 = $pclient->getSchoolRegisterBook($data[0]->getId());
	// var_dump($data2);
	
	

	# professor teste
	// $pclient = new PS($suap);
	// $data = $pclient->getJsonObject();
	// var_dump($data);
	// $data = $pclient->getProfessorObject();
	// var_dump($data);
	

 ?>