<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Image extends CI_Controller {

    //Image uploading
	public function upload()
	{
		$this->load->helper('url');
		$message ='';
		//checking post
		if( $this->input->post('post_check') == 1 ) {
			 //This is the directory to which we upload our image
			 //full permission is required for this folder
			 //FCPATH is a constant defined in index.php - its the relative path to project root
			 $config['upload_path']    = FCPATH.'uploads/';
			 //Validation - Only gif jpg png extensions are allowed
			 $config['allowed_types']  = 'gif|jpg|png';
			 //unique file name
			 $file_name           = time();
			 $config['file_name'] = $file_name;
			 $this->load->library('upload', $config);
			 //checking file upload success
			 if ( ! $this->upload->do_upload('image'))
             {
				//error in file uploading
                $message = $this->upload->display_errors();
             }
             else
             {
				//successfully uploaded the image
				$message = 'file uploaded successfully';
				//getting full file upload information
				$result  = $this->upload->data();
				//calling thumb() function to create the thumbnail
				//passing uploaded image name
				$this->thumb($result['file_name']);
             }
	    }
        $this->load->view('upload',array('message' => $message ));   
	}
	
	//creating thumbnails
	private function thumb( $name='' ) {
		//Using gd2 image library
		$config['image_library']  = 'gd2';
		//path of the source file
		//FCPATH is a constant defined in index.php - it is the relative path to project root
		$config['source_image']   = FCPATH.'uploads/'.$name;
		$config['create_thumb']   = TRUE;
		$config['maintain_ratio'] = TRUE;
		$config['width']          = 50;
		$config['height']         = 50;
		$this->load->library('image_lib', $config);
		$this->image_lib->resize();
	}

	
}
