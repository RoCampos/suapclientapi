<?php 

	require __DIR__ . '/../vendor/autoload.php';

	use Romerito\Suap\SuapClient as SC;
	use Romerito\Suap\SuapAPI as SA;
	use Romerito\Suap\ProfessorClient as PS;
	use Romerito\model\Professor;
	$user = readline();
	$pass = readline();

	$suap = new SC;
	
	$pclient = new PS ($suap);
	$data = $pclient->getSchoolRegisterBooks(2017,1);

	$data2 = $pclient->getSchoolRegisterBook($data[0]->getId());
	

 ?>