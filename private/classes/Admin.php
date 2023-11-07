<?php
require_once('../config.php');
Class Admin extends DBConnection {
	private $settings;
	public function __construct(){
		global $_settings;
		$this->settings = $_settings;
		parent::__construct();
	}
	public function __destruct(){
		parent::__destruct();
	}
	public function save_admin(){
		extract($_POST);
		$data = '';
		foreach($_POST as $k => $v){
			if(!in_array($k,array('id','password'))){
				if(!empty($data)) $data .=" , ";
				$data .= " {$k} = '{$v}' ";
			}
		}
		if(!empty($password)){
			$password = md5($password);
			if(!empty($data)) $data .=" , ";
			$data .= " `password` = '{$password}' ";
		}

		if(isset($_FILES['img']) && $_FILES['img']['tmp_name'] != ''){
				$fname = 'uploads/'.strtotime(date('y-m-d H:i')).'_'.$_FILES['img']['name'];
				$move = move_uploaded_file($_FILES['img']['tmp_name'],'../'. $fname);
				if($move){
					$data .=" , avatar = '{$fname}' ";
					if(isset($_SESSION['admindata']['avatar']) && is_file('../'.$_SESSION['admindata']['avatar']) && $_SESSION['admindata']['id'] == $id)
						unlink('../'.$_SESSION['admindata']['avatar']);
				}
		}
		if(empty($id)){
			$qry = $this->conn->query("INSERT INTO admin set {$data}");
			if($qry){
				$this->settings->set_flashdata('success','Admin Details successfully saved.');
				return 1;
			}else{
				return 2;
			}

		}else{
			$qry = $this->conn->query("UPDATE admin set $data where id = {$id}");
			if($qry){
				$this->settings->set_flashdata('success','Admin Details successfully updated.');
				foreach($_POST as $k => $v){
					if($k != 'id'){
						if(!empty($data)) $data .=" , ";
						$this->settings->set_admindata($k,$v);
					}
				}
				if(isset($fname) && isset($move))
				$this->settings->set_admindata('avatar',$fname);

				return 1;
			}else{
				return "UPDATE admin set $data where id = {$id}";
			}
			
		}
	}
	public function delete_admin(){
		extract($_POST);
		$avatar = $this->conn->query("SELECT avatar FROM admin where id = '{$id}'")->fetch_array()['avatar'];
		$qry = $this->conn->query("DELETE FROM admin where id = $id");
		if($qry){
			$this->settings->set_flashdata('success','Admin Details successfully deleted.');
			if(is_file(base_app.$avatar))
				unlink(base_app.$avatar);
			$resp['status'] = 'success';
		}else{
			$resp['status'] = 'failed';
		}
		return json_encode($resp);
	}
	public function save_fadmin(){
		extract($_POST);
		$data = "";
		foreach($_POST as $k => $v){
			if(!in_array($k, array('id','password'))){
				if(!empty($data)) $data .= ", ";
				$data .= " `{$k}` = '{$v}' ";
			}
		}

			if(!empty($password))
			$data .= ", `password` = '".md5($password)."' ";
		
			if(isset($_FILES['img']) && $_FILES['img']['tmp_name'] != ''){
				$fname = 'uploads/'.strtotime(date('y-m-d H:i')).'_'.$_FILES['img']['name'];
				$move = move_uploaded_file($_FILES['img']['tmp_name'],'../'. $fname);
				if($move){
					$data .=" , avatar = '{$fname}' ";
					if(isset($_SESSION['admindata']['avatar']) && is_file('../'.$_SESSION['admindata']['avatar']))
						unlink('../'.$_SESSION['admindata']['avatar']);
				}
			}
			$sql = "UPDATE faculty set {$data} where id = $id";
			$save = $this->conn->query($sql);

			if($save){
			$this->settings->set_flashdata('success','Admin Details successfully updated.');
			foreach($_POST as $k => $v){
				if(!in_array($k,array('id','password'))){
					if(!empty($data)) $data .=" , ";
					$this->settings->set_admindata($k,$v);
				}
			}
			if(isset($fname) && isset($move))
			$this->settings->set_admindata('avatar',$fname);
			return 1;
			}else{
				$resp['error'] = $sql;
				return json_encode($resp);
			}

	} 

	public function save_sadmin(){
		extract($_POST);
		$data = "";
		foreach($_POST as $k => $v){
			if(!in_array($k, array('id','password'))){
				if(!empty($data)) $data .= ", ";
				$data .= " `{$k}` = '{$v}' ";
			}
		}

			if(!empty($password))
			$data .= ", `password` = '".md5($password)."' ";
		
			if(isset($_FILES['img']) && $_FILES['img']['tmp_name'] != ''){
				$fname = 'uploads/'.strtotime(date('y-m-d H:i')).'_'.$_FILES['img']['name'];
				$move = move_uploaded_file($_FILES['img']['tmp_name'],'../'. $fname);
				if($move){
					$data .=" , avatar = '{$fname}' ";
					if(isset($_SESSION['admindata']['avatar']) && is_file('../'.$_SESSION['admindata']['avatar']))
						unlink('../'.$_SESSION['admindata']['avatar']);
				}
			}
			$sql = "UPDATE students set {$data} where id = $id";
			$save = $this->conn->query($sql);

			if($save){
			$this->settings->set_flashdata('success','Admin Details successfully updated.');
			foreach($_POST as $k => $v){
				if(!in_array($k,array('id','password'))){
					if(!empty($data)) $data .=" , ";
					$this->settings->set_admindata($k,$v);
				}
			}
			if(isset($fname) && isset($move))
			$this->settings->set_admindata('avatar',$fname);
			return 1;
			}else{
				$resp['error'] = $sql;
				return json_encode($resp);
			}

	} 
	
}

$admin = new admin();
$action = !isset($_GET['f']) ? 'none' : strtolower($_GET['f']);
switch ($action) {
	case 'save':
		echo $admin->save_admin();
	break;
	case 'fsave':
		echo $admin->save_fadmin();
	break;
	case 'ssave':
		echo $admin->save_sadmin();
	break;
	case 'delete':
		echo $admin->delete_admin();
	break;
	default:
		// echo $sysset->index();
		break;
}