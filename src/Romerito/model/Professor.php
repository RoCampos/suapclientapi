<?php 

namespace Romerito\model;


/**
 * summary
 */
class Professor
{

	private $id = 0;
	private $registry = 0;
	private $name = "";
	private $email = "";

    /**
     * summary
     */
    public function __construct($id, $registry, $name, $email)
    {
        $this->id = $id;
        $this->registry = $registry;
        $this->name = $name;
        $this->email = $email;
    }

    /**
     * @return type
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return type
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return type
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return type
     */
    public function getRegistry()
    {
        return $this->registry;
    }

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