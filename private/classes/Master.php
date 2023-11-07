<?php
require_once('../config.php');
Class Master extends DBConnection {
	private $settings;
	public function __construct(){
		global $_settings;
		$this->settings = $_settings;
		$this->permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		parent::__construct();
	}
	public function __destruct(){
		parent::__destruct();
	}
	function capture_err(){
		if(!$this->conn->error)
			return false;
		else{
			$resp['status'] = 'failed';
			$resp['error'] = $this->conn->error;
			return json_encode($resp);
			exit;
		}
	}
	function save_topic(){
		extract($_POST);
		$data = "";
		foreach($_POST as $k =>$v){
			if(!in_array($k,array('id','description'))){
				if(!empty($data)) $data .=",";
				$data .= " `{$k}`='{$v}' ";
			}
		}
		if(isset($_POST['description'])){
			if(!empty($data)) $data .=",";
				$data .= " `description`='".addslashes(htmlentities($description))."' ";
		}
		$check = $this->conn->query("SELECT * FROM `rooms` where `name` = '{$name}' ".(!empty($id) ? " and id != {$id} " : "")." ")->num_rows;
		if($this->capture_err())
			return $this->capture_err();
		if($check > 0){
			$resp['status'] = 'failed';
			$resp['msg'] = "Topic already exist.";
			return json_encode($resp);
			exit;
		}
		if(empty($id)){
			$sql = "INSERT INTO `rooms` set {$data} ";
			$save = $this->conn->query($sql);
		}else{
			$sql = "UPDATE `rooms` set {$data} where id = '{$id}' ";
			$save = $this->conn->query($sql);
		}
		if($save){
			$resp['status'] = 'success';
			if(empty($id))
				$this->settings->set_flashdata('success',"New Topic successfully saved.");
			else
				$this->settings->set_flashdata('success',"Topic successfully updated.");
		}else{
			$resp['status'] = 'failed';
			$resp['err'] = $this->conn->error."[{$sql}]";
		}
		return json_encode($resp);
	}
	function delete_topic(){
		extract($_POST);
		$del = $this->conn->query("DELETE FROM `rooms` where id = '{$id}'");
		if($del){
			$resp['status'] = 'success';
			$this->settings->set_flashdata('success',"Topic successfully deleted.");
		}else{
			$resp['status'] = 'failed';
			$resp['error'] = $this->conn->error;
		}
		return json_encode($resp);

	}
	function save_sched_type(){
		extract($_POST);
		$data = "";
		foreach($_POST as $k =>$v){
			if(!in_array($k,array('id','description'))){
				if(!empty($data)) $data .=",";
				$data .= " `{$k}`='{$v}' ";
			}
		}
		if(isset($_POST['description'])){
			if(!empty($data)) $data .=",";
				$data .= " `description`='".addslashes($description)."' ";
		}
		$check = $this->conn->query("SELECT * FROM `schedule_type` where `sched_type` = '{$sched_type}' ".(!empty($id) ? " and id != {$id} " : "")." ")->num_rows;
		if($this->capture_err())
			return $this->capture_err();
		if($check > 0){
			$resp['status'] = 'failed';
			$resp['msg'] = "Schedule Type already exist.";
			return json_encode($resp);
			exit;
		}
		if(empty($id)){
			$sql = "INSERT INTO `schedule_type` set {$data} ";
			$save = $this->conn->query($sql);
		}else{
			$sql = "UPDATE `schedule_type` set {$data} where id = '{$id}' ";
			$save = $this->conn->query($sql);
		}
		if($save){
			$resp['status'] = 'success';
			if(empty($id))
				$this->settings->set_flashdata('success',"New Schedule Type successfully saved.");
			else
				$this->settings->set_flashdata('success',"Schedule Type successfully updated.");
		}else{
			$resp['status'] = 'failed';
			$resp['err'] = $this->conn->error."[{$sql}]";
		}
		return json_encode($resp);
	}
	function delete_sched_type(){
		extract($_POST);
		$del = $this->conn->query("DELETE FROM `schedule_type` where id = '{$id}'");
		if($del){
			$resp['status'] = 'success';
			$this->settings->set_flashdata('success',"Schedule Type successfully deleted.");
		}else{
			$resp['status'] = 'failed';
			$resp['error'] = $this->conn->error;
		}
		return json_encode($resp);

	}
	function generate_string($input, $strength = 10) {
		
		$input_length = strlen($input);
		$random_string = '';
		for($i = 0; $i < $strength; $i++) {
			$random_character = $input[mt_rand(0, $input_length - 1)];
			$random_string .= $random_character;
		}
	 
		return $random_string;
	}
	
	function save_event(){
		extract($_POST);
		$data = "";
		foreach($_POST as $k =>$v){
			$v = addslashes($v);
			if(!in_array($k,array('id'))){
				if(!empty($data)) $data .=",";
				$data .= " `{$k}`='{$v}' ";
			}
		}
		if(empty($id)){
			$sql = "INSERT INTO `events` set {$data} ";
			$save = $this->conn->query($sql);
		}else{
			$sql = "UPDATE `events` set {$data} where id = '{$id}' ";
			$save = $this->conn->query($sql);
		}
		if($save){
			if(empty($id))
				$this->settings->set_flashdata('success',"New Event successfully saved.");
			else
				$this->settings->set_flashdata('success',"Event successfully updated.");
			$resp['status'] = 'success';
			$id = empty($id) ? $this->conn->insert_id : $id;
			if(isset($_FILES['img']) && !empty($_FILES['img']['tmp_name'])){
				$dir = 'uploads/events/';
				if(!is_dir(base_app.$dir))
				mkdir(base_app.$dir);
				$fname = $dir.$id.'.'.(pathinfo($_FILES['img']['name'], PATHINFO_EXTENSION));
				$move = move_uploaded_file($_FILES['img']['tmp_name'], base_app.$fname);
				if($move){
					$this->conn->query("UPDATE `events` set img_path = '{$fname}' where id = '{$id}'");
				}
			}
		}else{
			$resp['status'] = 'failed';
			$resp['err'] = $this->conn->error."[{$sql}]";
		}
		return json_encode($resp);
	}
	function delete_event(){
		extract($_POST);
		$img_path = $this->conn->query("SELECT img_path FROM `events` where id = '{$id}'")->fetch_array()['img_path'];
		$del = $this->conn->query("DELETE FROM `events` where id = '{$id}'");
		if($del){
			$resp['status'] = 'success';
			$this->settings->set_flashdata('success',"Event successfully deleted.");
			if(is_file(base_app.$img_path)){
				unlink(base_app.$img_path);
			}
		}else{
			$resp['status'] = 'failed';
			$resp['error'] = $this->conn->error;
		}
		return json_encode($resp);

	}
	function save_donation(){
		extract($_POST);
		$data = "";
		foreach($_POST as $k =>$v){
			if(!in_array($k,array('id'))){
				if(!empty($data)) $data .=",";
				$data .= " `{$k}`='{$v}' ";
			}
		}
		
		$sql = "INSERT INTO `donations` set {$data} ";
		$save = $this->conn->query($sql);
		if($save){
			$resp['status'] = 'success';
			$this->settings->set_flashdata('success',"Donation successfully Added. Thank you!");
		}else{
			$resp['status'] = 'failed';
			$resp['err'] = $this->conn->error."[{$sql}]";
		}
		return json_encode($resp);
	}

	function save_appointment_req(){
		extract($_POST);
		$data = "";
		foreach($_POST as $k=>$v){
			if(!in_array($k,array('id'))){
				if(!empty($data)) $data .= ", ";
				$data .= " `{$k}` = '{$v}' ";
			}
		}
		if(empty($id)){
			$sql = "INSERT INTO `appointment_request` set {$data}";
		}else{
			$sql = "UPDATE `appointment_request` set {$data} where id = '{$id}'";
		}
		$save = $this->conn->query($sql);
		if($save){
			$resp['status'] = 'success';
			if(isset($status)){
				$this->settings->set_flashdata("Appointment Request Successfully Updated.");
			}
		}else{
			$resp['status'] = 'failed';
			$resp['error_sql'] = $sql;
			$resp['error'] = $this->conn->error;
		}
		return json_encode($resp);
	}
	function delete_appointment_request (){
		extract($_POST);
		$save = $this->conn->query("DELETE FROM `appointment_request` where id ='{$id}'");
		if($save){
			$resp['status'] = 'success';
			$this->settings->set_flashdata("success"," Appointment Request Successfully Deleted.");
		}else{
			$resp['status'] = 'failed';
			$resp['err'] = $this->conn->error;
		}
		return json_encode($resp);
	}
}


	function save_room_req(){
		extract($_POST);
		$data = "";
		foreach($_POST as $k=>$v){
			if(!in_array($k,array('id'))){
				if(!empty($data)) $data .= ", ";
				$data .= " `{$k}` = '{$v}' ";
			}
		}
		if(empty($id)){
			$sql = "INSERT INTO `room_request` set {$data}";
		}else{
			$sql = "UPDATE `room_request` set {$data} where id = '{$id}'";
		}
		$save = $this->conn->query($sql);
		if($save){
			$resp['status'] = 'success';
			if(isset($status)){
				$this->settings->set_flashdata("Room Request Successfully Updated.");
			}
		}else{
			$resp['status'] = 'failed';
			$resp['error_sql'] = $sql;
			$resp['error'] = $this->conn->error;
		}
		return json_encode($resp);
	}
	function delete_room_request (){
		extract($_POST);
		$save = $this->conn->query("DELETE FROM `room_request` where id ='{$id}'");
		if($save){
			$resp['status'] = 'success';
			$this->settings->set_flashdata("success"," Room Request Successfully Deleted.");
		}else{
			$resp['status'] = 'failed';
			$resp['err'] = $this->conn->error;
		}
		return json_encode($resp);
	}

$Master = new Master();
$action = !isset($_GET['f']) ? 'none' : strtolower($_GET['f']);
$sysset = new SystemSettings();
switch ($action) {

	case 'delete_topic':
		echo $Master->delete_topic();
	break;
	case 'save_sched_type':
		echo $Master->save_sched_type();
	break;
	case 'delete_sched_type':
		echo $Master->delete_sched_type();
	break;
	case 'upload_files':
		echo $Master->upload_files();
	break;

	case 'save_event':
		echo $Master->save_event();
	break;
	case 'delete_event':
		echo $Master->delete_event();
	break;
	case 'save_donation':
		echo $Master->save_donation();
	break;
	case 'save_cause':
		echo $Master->save_cause();
	break;
	case 'delete_img':
		echo $Master->delete_img();
	break;
	case 'save_appointment_req':
		echo $Master->save_appointment_req();
	break;
	case 'delete_appointment_request':
		echo $Master->delete_appointment_request();
	break;
		case 'save_room_req':
		echo $Master->save_room_req();
	break;
	case 'delete_room_request':
		echo $Master->delete_room_request();
	break;
	default:
		// echo $sysset->index();
		break;
}