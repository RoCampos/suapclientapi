<?php 

namespace Romerito\Suap;

use Romerito\Suap\SuapAPI as SA;
use Romerito\model\Professor;
use Romerito\model\VirtualClassroom;

/**
 * summary
 */
class ProfessorClient
{

	private $suapclient = null;

    /**
     * summary
     */
    public function __construct($client)
    {
        $this->suapclient = $client;
    }


    public function getProfessorArray () {
    	
    	$data = $this->suapclient->get(SA::MYDATA);

    	if ($data->vinculo->categoria == "docente") {

    		$id = $data->id;
    		$registry = $data->vinculo->matricula;
    		$name = $data->vinculo->nome;
    		$email = $data->email;

    		return ['id' => $id, 
    			'registry' => $registry,
    			'name' => $name,
    			'email' => $email
    		];
    	}
   
 		return [];
    }

    function getProfessorObject()
    {
    	$data = $this->getJsonObject();

    	if(count($data) >= 0) {
    		return new Professor (
    			$data['id'],
    			$data['registry'],
    			$data['name'],
    			$data['email']
    		);
    	}
    	return null;
    }

    function getSchoolRegisterBooks ($year, $semester = 1) {
    	
    	$data = $this->suapclient->get(
    		SA::SRBOOKS. $year . '/'. $semester
    	);

    	$srbooks = [];
    	if (count($data) > 0) {
    		foreach ($data as $srs) {
    	
    			array_push($srbooks, 
    				new VirtualClassroom(
    					$srs->id,
    					$srs->componente_curricular,
    					$srs->data_inicio,
    					$srs->data_fim,
    					count($srs->participantes)
    			));
    		}
    	}

    	return $srbooks;
    }

    function getSchoolRegisterBook ($id) {

    	$data = $this->suapclient->get(
    		SA::SRBOOK . $id
    	);

    	if (isset($data)) {
    		$vc = new VirtualClassroom(
	    		$data->id,
	    		$data->componente_curricular,
	    		$data->data_inicio,
	    		$data->data_fim,
	    		count($data->participantes));
	    	return $vc;
    	}
    	
    	return null;

    }

}


 ?>