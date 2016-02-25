<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Student_model extends CI_Model {
	
	
     public function __construct()
     {
        // Call the CI_Model constructor
        parent::__construct();
     }

     //Count all student records
     public function studentCount()
     {
        return $this->db->count_all_results('students');
     }
     
     //Get students
     public function getStudents ($limit,$offset)
     {
        $result = $this->db->get('students',$limit,$offset);
        return $result->result_array();
     }
     
     
  

}
