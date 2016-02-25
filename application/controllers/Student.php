<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student extends CI_Controller {

    public function __construct()
    {
       // Call the CI_Controller constructor
       parent::__construct();
       //load pagination class
	   $this->load->library('pagination');
	   //load student model
	   $this->load->model('Student_model');
	   $this->load->helper('url');
    }
     
    //List students
	public function listing()
	{
		//configuration variables for pagination 
	    $config['base_url']   = site_url('student/listing');
	    //Get the total student count
        $config['total_rows'] = $this->Student_model->studentCount();
        //Records per page
        $config['per_page']   = 2;
        //label of pagination next link
        $config['next_link']  = 'Next';
        //label of pagination previous link
        $config['prev_link']  = 'Previous';
        $this->pagination->initialize($config);
            
        //get student records
        $students = $this->Student_model->getStudents($config['per_page'],$this->uri->segment(3));
        //load view for display
        $this->load->view('list', array('result' => $students));   
        
	}

	
}
