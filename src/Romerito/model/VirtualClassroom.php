<?php 

namespace Romerito\model;


/**
 * This class implements the type VirtualClassroom.
 * 
 * Students are grouped by levels. Each level has
 * an classroom with a professor and a set of 
 * subjects: math, chimestry and so on.
 * 
 * In this way, a virtul classroom is associated
 * with a set of students and has, at least, one
 * professor associated with.
 * 
 * An instance of virtual classroom has an id,
 * an subject, an start date and finish date and
 * the number of students.
 * 
 * @author Romerito C. Andrade <romerito.campos@gmail.com>
 * 
 */
class VirtualClassroom
{

    /**
     * 
     * @var string identifier of an virtual classroom.
     * 
     */
	private $id;

    /**
     * 
     * @var string specific subject of the curriculun.
     * 
     */
	private $subject;

    /**
     * 
     * @var string start date of the lessons.
     * 
     */
	private $sdate;

    /**
     * 
     * @var string final date of the lessons.
     * 
     */
	private $fdate;

    /**
     * 
     * @var int number of students.
     * 
     */
	private $students;

    /**
     * The construction of a VirtualClassroom instance
     * takes four arguments.
     * 
     * @param int identifier of virtual classroom.
     * @param string specific subject of the virtual classroom.
     * @param string initial date.
     * @param string final date.
     * @param int number of students.
     * 
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
     * 
     * Access id of a virtual classroom.
     * 
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * 
     * Access subject of a virtual classroom.
     * 
     * @return string
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * 
     * Access initial date of a virtual classroom.
     * 
     * @return string
     */
    public function getSdate()
    {
        return $this->sdate;
    }

    /**
     * 
     * Access final date of a virtual classroom.
     * 
     * @return string
     */
    public function getFdate()
    {
        return $this->fdate;
    }

    /**
     * 
     * Access number of students of a virtual classroom.
     * 
     * @return int 
     */
    public function getStudentsCount()
    {
        return $this->students;
    }
}


 ?>

