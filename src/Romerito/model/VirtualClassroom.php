<?php 

namespace Romerito\model;


/**
 * summary
 */
class VirtualClassroom
{

	private $id;
	private $subject;
	private $sdate;
	private $fdate;
	private $students;

    /**
     * summary
     */
    public function __construct($id, $subject, 
    	$sdate, $fdate, $students)
    {
        $this->id = $id;
        $this->subject = $subject;
        $this->sdate = $sdate;
        $this->fdate = $fdate;
        $this->students = $students;
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
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * @return type
     */
    public function getSdate()
    {
        return $this->sdate;
    }

    /**
     * @return type
     */
    public function getFdate()
    {
        return $this->fdate;
    }

    /**
     * @return type
     */
    public function getStudentsCount()
    {
        return $this->students;
    }
}


 ?>

