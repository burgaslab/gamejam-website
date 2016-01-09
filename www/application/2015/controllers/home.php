<?php if ( ! defined("BASEPATH")) exit("No direct script access allowed");

class Home extends CI_Controller {

	public $method;

	public function __construct() {
		parent::__construct();

		$this->load->library("path");

		$this->method = $this->router->fetch_method();
	}

	public function index() {
		$this->load->view("home");
	}

	public function what() {
		$this->load->view("what");
	}

	public function rules() {
		$this->load->view("rules");
	}

	public function programme() {
		$this->load->view("programme");
	}

	public function support() {
		$this->load->view("support");
	}

	public function jammers() {
		$this->load->view("jammers");
	}

	public function gallery() {		
		clearstatcache();
		
		$config['image_library'] = 'gd2';
		$config['create_thumb'] = TRUE;
		$config['maintain_ratio'] = TRUE;
		$config['thumb_marker'] = '';
		$config['width'] = 300;
		$config['height'] = 150;
		$this->load->library('image_lib', $config); 	
		
		$imgthumbsdir = 'resource/img/site/event/thumbs/'; //Pick your thumbs folder
		$imgdir = 'resource/img/site/event/'; //Pick your folder
		$allowed_types = array('png','jpg','jpeg','gif'); //Allowed types of files
		$errors = array();
		
		if (is_dir($imgdir)) {
			if ($dh = opendir($imgdir)) {
				while (($imgfile = readdir($dh)) !== false) {
					/*If the file is an image add it to the array*/
				   if( in_array(strtolower(substr($imgfile,-3)),$allowed_types) OR
						in_array(strtolower(substr($imgfile,-4)),$allowed_types) ) {
						$photos[] = $imgfile;
					}
				}
				closedir($dh);
			}
		}
		
		if (is_dir($imgthumbsdir)) {
			$count = count($photos);
			for($i = 0; $i < $count; $i++){
				$thumb = FCPATH . $imgthumbsdir . $photos[$i];
				$thumbrel = $imgthumbsdir . $photos[$i];
				$original = FCPATH . $imgdir . $photos[$i];
				$originalrel = $imgdir . $photos[$i];
				
				if(!file_exists($thumb) &&  file_exists($original)) {
					$config['source_image'] = $originalrel;	
					$config['new_image'] = $thumbrel;	
					
					$this->image_lib->initialize($config);					
					 if (!$this->image_lib->resize()) {
						$errors[] = $this->image_lib->display_errors();
					}
					$this->image_lib->clear();
				}
			}
		}
		
		$data = array(
		   'photos' => $photos,
		   'imgdir' => $imgdir,
		   'imgthumbsdir' => $imgthumbsdir,
		   'errors' => $errors
		);		
		$this->load->view("gallery", $data);
	}
}
