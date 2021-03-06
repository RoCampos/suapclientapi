<?php 

namespace Romerito\Suap;

use Romerito\Suap\SuapAPI as SA;
use Romerito\model\Professor;
use Romerito\model\VirtualClassroom;

/**
 * This class is a client for the SUAP API.
 * It is specialized in calls to part of the API related to professors.
 * 
 * This provides methods to access professional informations of the pofessor and its school regiser books.
 * 
 * @author Romerito C. Andrade <romerito.campos@gmail.com>
 * 
 */
class ProfessorClient
{

    /**
     * 
     * @var SuapClient instance of SUAP API.
     * 
     */
	private $suapclient = null;

    /**
     * The construction of a ProfessorClient demands an instance of SuapClient class.
     * 
     */
    public function __construct($client)
    {
        $this->suapclient = $client;
    }


    /**
     * 
     * This method perform a call to obtain the data of a professor. 
     * 
     * It uses a SuapClient instance to deal with the call. 
     * 
     * If the call is peformed using a 
     * token generated by a professor 
     * credentials, then the returned 
     * data is your professional data as
     * name, email etc.
     * 
     * In the other hand, an empty array 
     * is given as return.
     * 
     * @return array professional data of professor
     */
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

    /**
     * 
     * This method returns the same data 
     * obtaind by getProfessorArray. 
     * 
     * However, an object of class 
     * Professor is created and returned.
     * 
     * @return Professor 
     */
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


    /**
     * 
     * This method is used to get all 
     * the school register book of a professor.
     * 
     * It receives two arguments: $year and $semester.
     * 
     * The $year is formated with four digits. For exemplo: 2018.
     * 
     * The semester is a default argument
     * with value equal to one. However, 
     * it is possible use the value two as a valid argument.
     * 
     * @param string $year.
     * @param string $semester.
     * 
     * @return array an array of VirtualClassroom objects.
     */
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

    /**
     * 
     * This method returns an specific
     * school register book (SRB). 
     * 
     * Each SRB have an
     * $id. Then, with this information is
     * possible to recover the complementary
     * information of the SRB.
     * 
     * @param int $id
     * 
     * @return VirtualClassroom 
     */
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