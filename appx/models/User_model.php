<?php 
/**
 *  User_model.php
 */
class User_model extends CI_Model {
	
	public function __construct(){
		parent::__construct();
		//load database
		$this->load->database();
	}

	//login
	public function login($data) {
		$email = $data["email"];
		$password = $data["password"];

		$this->db->select("*");
		$this->db->from("users");
		$this->db->where("email", $email);
		$this->db->limit(1);

		$query = $this->db->get();
		if($query->num_rows() === 1) {
			$record = $query->row_array();
			if(password_verify($password, $record["password"])) {
				unset($record["password"]);
				$result["user"] = $record;
				$result["response"] = true;
				return $result;
			} else {
				$result["response"] = false;
				return $result;
			}
		} else {
			$result["response"] = false;
			return $result;
		}

	}	

	//register user
	public function register($data) {
		$data["password"] = password_hash($data["password"], PASSWORD_DEFAULT);
		if($this->db->insert('users', $data)) {
			$result["response"] = true;
			return $result;
		} else {
			$result["response"] = false;
			return $result;
		}
	}

	//update user
	public function update($id,$data) {
		$this->db->where('id',$id);

		if($this->db->update('users',$data)) {
			return true;
		} else {
			return false;
		}
	}

	//delete user
	public function delete($id) {
		$this->db->where('id',$id);

		if($this->db->delete('users')) {
			return true;
		} else {
			return false;
		}
	}
}
?>