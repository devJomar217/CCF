<?php
session_start();
include './student.php';

// Establish connection to database
function databaseConnection(){
  $servername = "localhost:3307";
  $username = "root";
  $password = "";
  $dbname = "code_connect";
  
  $conn = new mysqli($servername, $username, $password, $dbname);

  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  } else {
    return $conn;
  }
  echo "Connected successfully";
}

// search for login user in the data base
function login($email, $password){
  $connectDB = databaseConnection();
  $sql = "SELECT * FROM account_information where email='$email' AND password='$password'";
  $result = $connectDB->query($sql);
  
  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      if($row["status"] == 0){
        echo json_encode(array("statusCode"=>5000));
      } else {
        $_SESSION['user_id'] = $row["user_id"];
        $_SESSION['user_type'] = $row["user_type"];
        $_SESSION['user_name'] = $row["user_name"];
        echo json_encode(array("statusCode"=>200));
      }
    }
    
  } else {
    echo json_encode(array("statusCode"=>201));
  }
  $connectDB->close();
}

function forgotPassword($email){
  $connectDB = databaseConnection();
  $statusCode = array();
  $existing=mysqli_query($connectDB,"select * from account_information where email='$email'");
  if (mysqli_num_rows($existing)==0){
    echo json_encode(array("statusCode"=>5006));
  } else {
    echo json_encode(array("statusCode"=>200));
  }
  $connectDB->close();
}

function createAccount(){
  $connectDB = databaseConnection();
  $studentID=$_POST['studentID'];
  $username=$_POST['username'];
  $email=$_POST['email'];
  $name=$_POST['name'];
  $specialization=$_POST['specialization'];
  $yearLevel=$_POST['yearLevel'];
  $password=$_POST['password'];
  $statusCode = array();
  $duplicate=mysqli_query($connectDB,"select * from account_information where email='$email' OR user_name='$username' OR user_id='$studentID'");
  if (mysqli_num_rows($duplicate)>0){
    while($row = $duplicate->fetch_assoc()) {
      if($row['user_id'] == $studentID){
        array_push($statusCode, 5001);
      }

      if($row['user_name'] == $username){
        array_push($statusCode, 5002);
      } 

      if($row['email'] == $email){
        array_push($statusCode, 5003);
      }
    }
  } else {
    $insertAccountInformationQuery = "INSERT INTO `account_information`( `user_id`, `user_type`, `user_name`, `email`, `password`, `status`) 
    VALUES ('$studentID','1','$username','$email', '$password', '0')";

    $insertStudentInformationQuery = "INSERT INTO `student_information`( `student_id`, `name`, `year_level`, `specialization`) 
    VALUES ('$studentID','$name','$yearLevel', '$specialization')";

    if (mysqli_query($connectDB, $insertAccountInformationQuery)) {
      array_push($statusCode, 200);
    } else {
      array_push($statusCode, 5004);
    }

    if (mysqli_query($connectDB, $insertStudentInformationQuery)) {
      array_push($statusCode, 200);
    } else {
      array_push($statusCode, 5005);
    }
  }

  echo json_encode(array("statusCode"=>$statusCode));
  $connectDB->close();
}

function changePassword(){

}

function updateStudentStatus(){
  $connectDB = databaseConnection();
	$id=$_POST['id'];
	$name=$_POST['name'];
	$email=$_POST['email'];
	$phone=$_POST['phone'];
	$city=$_POST['city'];
	$sql = "UPDATE `crud` 
	SET `name`='$name',
	`email`='$email',
	`phone`='$phone',
	`city`='$city' WHERE id=$id";
	if (mysqli_query($conn, $sql)) {
		echo json_encode(array("statusCode"=>200));
	} 
	else {
		echo json_encode(array("statusCode"=>201));
	}
	mysqli_close($conn);
}

function retrieveStudentAccountRequest(){
  $connectDB = databaseConnection();
  $sql = "SELECT account_information.user_id, account_information.email, account_information.user_name, account_information.status, student_information.name, student_information.year_level, student_information.specialization, student_information.picture FROM account_information INNER JOIN student_information ON account_information.user_id=student_information.student_id where account_information.status='0'";
  $result = $connectDB->query($sql);

  if ($result->num_rows > 0) {
    $studentList = array(); 
    while($row = $result->fetch_assoc()) {
      $student = new Student();
      $student->set_studentID($row["user_id"]);
      $student->set_name($row["name"]);
      $student->set_yearLevel($row["year_level"]);
      $student->set_specialization($row["specialization"]);
      $student->set_email($row["email"]);
      $student->set_username($row["user_name"]);
      $student->set_picture($row["picture"]);
      $student->set_status($row["status"]);
      array_push($studentList, $student);
    }
    echo json_encode($studentList);
  } else {
    echo json_encode(array("statusCode"=>201));
  }
  $connectDB->close();
}

function saveQuestion(){

}

function updateQuestion(){

}

function deleteQuestion(){

}

function saveAnswer(){

}

function updateAnswer(){

}

function deleteAnswer(){

}

function addRating(){

}

function updateRating(){

}

function debug_to_console($data) {
  $output = $data;
  if (is_array($output))
      $output = implode(',', $output);

  echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
}

if($_POST['action']=='login'){
  login($_POST['email'], $_POST['password']);
}

if($_POST['action']=='create-account'){
  createAccount();
}

if($_POST['action']=='forgot-password'){
  forgotPassword($_POST['email']);
}

if($_POST['action']=='retrieve-student-account-request'){
  retrieveStudentAccountRequest();
}

?>