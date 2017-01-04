<?php if ( ! defined("BASEPATH")) exit("No direct script access allowed");

require("base.php");

class Gallery extends Base {

	public function index() {
		clearstatcache();
		
		$config['image_library'] = 'gd2';
		$config['create_thumb'] = TRUE;
		$config['maintain_ratio'] = TRUE;
		$config['thumb_marker'] = '';
		$config['width'] = 300;
		$config['height'] = 150;
		$this->load->library('image_lib', $config);
		
		$source_dir = 'resource/image/gallery/';
		$thumb_dir = 'resource/image/gallery/thumbs/';
		$image_ext = array('png','jpg','jpeg','gif');
		$photos = array();
		
		if ($dh = opendir($source_dir)) {
			while (($file = readdir($dh)) !== false) {
				$ext = pathinfo($file, PATHINFO_EXTENSION);
				if ($ext && in_array($ext, $image_ext)) {
					$photos[] = $file;
				}
			}
			closedir($dh);
		}

		if (!is_dir(FCPATH . $thumb_dir)) {
			mkdir(FCPATH . $thumb_dir, 0777);
		}
		$count = count($photos);
		foreach ($photos as $file) {
			$thumb = FCPATH . $thumb_dir . $file;
	
			if(!file_exists($thumb)) {
				$config['source_image'] = $source_dir . $file;
				$config['new_image'] = $thumb_dir . $file;
					
				$this->image_lib->initialize($config);
				$this->image_lib->resize();
				$this->image_lib->clear();
			}
		}
		
		$data = array(
				'photos' => $photos,
				'dir' => $source_dir,
				'thumb_dir' => $thumb_dir,
		);
		
		$this->view->set("gallery", $data);
		
		$this->render("gallery");
	}
}
