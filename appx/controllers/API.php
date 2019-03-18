<?php  
/**
 * Api for users
 */

require(APPPATH . 'libraries/REST_Controller.php');

class Api extends \Restserver\Libraries\REST_Controller {
	
	public function __construct() {
		parent::__construct();
		//load the model
		$this->load->model('user_model');
		$this->load->library('form_validation');
	}

	public function register_post() {
		$data = $this->post();

		$this->form_validation->set_data($data);
		if($this->form_validation->run() == FALSE) {
			$errors = $this->form_validation->error_array();
			$result["response"] = false;
			$result["errors"] = $errors;
			$this->response($result);
		} else {
			unset($data["confpass"]);
			$result = $this->user_model->register($data);
			$this->response($result);
		}
		
	}

	public function login_post() {
		$data = $this->post();
		$this->form_validation->set_data($data);
		if($this->form_validation->run() == FALSE) {
			$errors = $this->form_validation->error_array();
			$result["response"] = false;
			$result["errors"] = $errors;
			$this->response($result);
		} else {
			$result = $this->user_model->login($data);
			$this->response($result);
		}

	}
}
?>