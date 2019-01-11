<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class CI_Smarty {

	const TEMPLATES_EXT = ".tpl";

	private $smarty = null;
	private $CI = null;

	public function __construct() {
		$this->CI =& get_instance();
		require_once($this->CI->path->abs_app . "/third_party/smarty/Smarty.class.php");
		$this->CI->load->config("smarty");

		$this->smarty = new Smarty();
		$config = conf("smarty");
		foreach ($config as $key=>$value) {
			$this->smarty->$key = $value;
		}

		log_message("debug", "Smarty Class Initialized");

		//$this->smarty->loadFilter("variable", "htmlspecialchars");
		//$this->smarty->registerFilter("pre", "prefilter");
	}

	public function set($key, $value) {
		$this->smarty->assign($key, $value);
	}

	public function set_array($arr) {
		foreach($arr as $k => $v) {
			$this->set($k, $v);
		}
	}

	public function get_start_time() {
		return $this->smarty->start_time;
	}

	public function result($template, $return = false, $model = array()) {
		if ($model) {
			$this->set_array($model);
		}

		$template = $template . self::TEMPLATES_EXT;
		if ($return) {
			return $this->smarty->fetch($template);
		} else {
			// debug console require display()
			if ($this->smarty->debugging) {
				$this->smarty->display($template);
			} else {
				$res = $this->smarty->fetch($template);
				$this->CI->output->append_output($res);
			}
			return;
		}
	}

	public function clear_cache() {
		$this->smarty->clearAllCache();
	}

}
