<?php 

namespace Romerito\model;


/**
 * This class implements a new type Professor.
 * 
 * The class is defined with four attributes.
 * 
 * $id is an attribute associated with professor.
 * 
 * Each professor has an $registry.
 * 
 * Additional informations are name and email.
 * 
 * 
 * @author Romerito C. Andrade <romerito.campos@gmail.com>
 * 
 */
class Professor
{

    /**
     * 
     * @var int identifier provided by SUAP API. 
     * 
     */
	private $id = 0;

    /**
     * 
     * @var int each professor has one registry.
     * 
     */
	private $registry = 0;

    /**
     * 
     * @var string the name of the professor.
     * 
     */
	private $name = "";

    /**
     * 
     * @var string the email of the professor.
     * 
     */
	private $email = "";

    /**
     * The construction of an instance of Professor
     * demands four attributes. 
     * 
     * These attributes are: $id, $registry, $name and $email.
     * 
     */
    public function __construct($id, $registry, $name, $email)
    {
        $this->id = $id;
        $this->registry = $registry;
        $this->name = $name;
        $this->email = $email;
    }

    /**
     * 
     * Access $id of a Professor.
     * 
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * 
     * Access $id of a Professor.
     * 
     * 
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * 
     * Access $email of a Professor.
     * 
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * 
     * Access $registry of a Professor.
     * 
     * @return string
     */
    public function getRegistry()
    {
        return $this->registry;
    }


    /**
     * 
     * Returns an instance of Professor in json format.
     * 
     * @return array 
     */
    public function json () {
    	return json_encode([
    		"id" => $this->id, 
    		"regystr" => $this->registry, 
    		"name" => $this->name, 
    		"email" => $this->email
    	]);
    }


}


 ?>