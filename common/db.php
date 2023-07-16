<?php
session_start();
include './data-model.php';
date_default_timezone_set('Asia/Singapore');

// retrieveNumberOfStudentAccountRequest();

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

function login($email, $password){
  $connectDB = databaseConnection();
  $sql = "SELECT * FROM account_information where email='$email' AND password='$password' OR user_name='$email' AND password='$password' ";
  $result = $connectDB->query($sql);
  
  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      if($row["status"] == 0){
        echo json_encode(array("statusCode"=>5000));
      } else {
        $_SESSION['user_id'] = $row["user_id"];
        $_SESSION['user_type'] = $row["user_type"];
        $_SESSION['user_name'] = $row["user_name"];
        $_SESSION['status'] = $row["status"];
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
    $userID = '';
    while($row = $existing->fetch_assoc()) {
      $userID = $row['user_id'];
    }
    echo json_encode(array("statusCode"=>200, "userID"=>$userID));
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

function createAdminAccount(){
  $connectDB = databaseConnection();
  $username=$_POST['username'];
  $email=$_POST['email'];
  $name=$_POST['name'];
  $password=$_POST['password'];
  $statusCode = array();
  $duplicate=mysqli_query($connectDB,"select * from account_information where email='$email' OR user_name='$username'");
  $lastRecord=mysqli_query($connectDB,"select user_id from account_information WHERE user_type='2' ORDER BY user_id DESC LIMIT 1");
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
    $userID = '';
    if ($lastRecord->num_rows > 0) {
      while($row = $lastRecord->fetch_assoc()) {
        $userID = $row["user_id"] + 1;
      }
    }
    
    $insertAccountInformationQuery = "INSERT INTO `account_information`( `user_id`, `user_type`, `user_name`, `email`, `password`, `status`) 
    VALUES ('$userID','2','$username','$email', '$password', '1')";

    $insertAdminInformationQuery = "INSERT INTO `admin_information`( `admin_id`, `name`) 
    VALUES ('$userID','$name')";

    if (mysqli_query($connectDB, $insertAccountInformationQuery)) {
      array_push($statusCode, 200);
    } else {
      array_push($statusCode, 5004);
    }

    if (mysqli_query($connectDB, $insertAdminInformationQuery)) {
      array_push($statusCode, 200);
    } else {
      array_push($statusCode, 5005);
    }
  }
  echo json_encode(array("statusCode"=>$statusCode));
  $connectDB->close();
}

function createNewSubject(){
  $connectDB = databaseConnection();
  $subject=$_POST['subject'];
  $statusCode = array();  
  $sql = "INSERT INTO `subject`(`subject`, `status`) 
  VALUES ('$subject','1')";
  if (mysqli_query($connectDB, $sql)) {
    array_push($statusCode, 200);
  } else {
    array_push($statusCode, 5004);
  }
  echo json_encode(array("statusCode"=>$statusCode));
  $connectDB->close();
}

function retrieveStudentList($status){
  $connectDB = databaseConnection();
  $sql = "SELECT account_information.user_id, account_information.email, account_information.user_name, account_information.status, student_information.name, student_information.year_level, student_information.specialization, student_information.picture FROM account_information INNER JOIN student_information ON account_information.user_id=student_information.student_id where account_information.status=$status AND account_information.user_type=1";
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

function retrieveStudentNumber($status){
  $connectDB = databaseConnection();
  $sql = "SELECT user_id FROM account_information where status='$status' AND user_type='1'";
  $result = $connectDB->query($sql);
  $number = $result->num_rows;
  $connectDB->close();
  return $number;
}

function retrieveQuestionNumber($status, $subject){
  $connectDB = databaseConnection();
  if($status != null AND $subject != null){
    $sql = "SELECT question_id FROM question where status='$status'";
  } else if($status != null) {
    $sql = "SELECT question_id FROM question where status='$status' AND subject_id='$subject'";
  } else {
    $sql = "SELECT question_id FROM question";
  }
  
  $result = $connectDB->query($sql);
  $number = $result->num_rows;
  $connectDB->close();
  return $number;
}

function retrieveAnswerNumber(){
  $connectDB = databaseConnection();
  $sql = "SELECT answer_id FROM answer where status='1'";
  $result = $connectDB->query($sql);
  $number = $result->num_rows;
  $connectDB->close();
  return $number;
}


function retrieveAdminList($status){
  $connectDB = databaseConnection();
  $sql = "SELECT account_information.user_id, account_information.email, account_information.user_name, account_information.status, admin_information.name, admin_information.picture FROM account_information INNER JOIN admin_information ON account_information.user_id=admin_information.admin_id where account_information.status=$status AND account_information.user_type=2";
  $result = $connectDB->query($sql);

  if ($result->num_rows > 0) {
    $adminList = array(); 
    while($row = $result->fetch_assoc()) {
      $admin = new Admin();
      $admin->set_adminID($row["user_id"]);
      $admin->set_name($row["name"]);
      $admin->set_email($row["email"]);
      $admin->set_username($row["user_name"]);
      $admin->set_picture($row["picture"]);
      $admin->set_status($row["status"]);
      array_push($adminList, $admin);
    }
    echo json_encode($adminList);
  } else {
    echo json_encode(array("statusCode"=>201));
  }
  $connectDB->close();
}

function retrieveQuestionList($status){
  $connectDB = databaseConnection();
  $sql = "SELECT question.* ,subject.*  FROM question INNER JOIN subject ON question.subject_id=subject.subject_id where question.status=$status";
  $result = $connectDB->query($sql);

  if ($result->num_rows > 0) {
    $questionList = array(); 
    while($row = $result->fetch_assoc()) {
      $question = new Question();
      $question->set_studentID($row["student_id"]);
      $question->set_questionID($row["question_id"]);
      $question->set_subjectID($row["subject_id"]);
      $question->set_subject($row["subject"]);
      $question->set_creationDateTime($row["creation_datetime"]);
      $question->set_question($row["question"]);
      $question->set_status($row["status"]);
      array_push($questionList, $question);
    }
    echo json_encode($questionList);
  } else {
    echo json_encode(array("statusCode"=>201));
  }
  $connectDB->close();
}

function retrieveAnswerList($status){
  $connectDB = databaseConnection();
  $sql = "SELECT question.* ,answer.*  FROM answer INNER JOIN question ON answer.question_id=question.question_id where answer.status=$status";
  $result = $connectDB->query($sql);

  if ($result->num_rows > 0) {
    $answerList = array(); 
    while($row = $result->fetch_assoc()) {
      $answer = new Answer();
      $answer->set_answerID($row["answer_id"]);
      $answer->set_studentID($row["student_id"]);
      $answer->set_questionID($row["question_id"]);
      $answer->set_answer($row["answer"]);
      $answer->set_creationDateTime($row["creation_datetime"]);
      $answer->set_status($row["status"]);
      array_push($answerList, $answer);
    }
    echo json_encode($answerList);
  } else {
    echo json_encode(array("statusCode"=>201));
  }
  $connectDB->close();
}

function retrieveSubjectList(){
  $connectDB = databaseConnection();
  $sql = "SELECT * FROM subject where status='1'";
  $result = $connectDB->query($sql);

  if ($result->num_rows > 0) {
    $subjectList = array(); 
    while($row = $result->fetch_assoc()) {
      $subject = new Subject();
      $subject->set_subjectID($row["subject_id"]);
      $subject->set_subject($row["subject"]);
      $subject->set_status($row["status"]);
      array_push($subjectList, $subject);
    }
    echo json_encode($subjectList);
  } else {
    echo json_encode(array("statusCode"=>201));
  }
  $connectDB->close();
}

function updateAccountStatus($userID, $status){
  $connectDB = databaseConnection();
	$sql = "UPDATE `account_information` SET `status`='$status' WHERE user_id=$userID";
	if (mysqli_query($connectDB, $sql)) {
		echo json_encode(array("statusCode"=>200));
	} else {
		echo json_encode(array("statusCode"=>201));
	}
	mysqli_close($connectDB); 
}

function updateSubject(){
  $subjectID=$_POST['subjectID'];
  $subject=$_POST['subject'];
  $status=$_POST['status'];
  $connectDB = databaseConnection();
	$sql = "UPDATE `subject` SET `subject`='$subject', `status`='$status' WHERE subject_id=$subjectID";
	if (mysqli_query($connectDB, $sql)) {
		echo json_encode(array("statusCode"=>200));
	} else {
		echo json_encode(array("statusCode"=>201));
	}
	mysqli_close($connectDB); 
}

function changePassword($userID, $password){
  $connectDB = databaseConnection();
	$sql = "UPDATE `account_information` SET `password`='$password' WHERE user_id=$userID";
	if (mysqli_query($connectDB, $sql)) {
		echo json_encode(array("statusCode"=>200));
	} else {
		echo json_encode(array("statusCode"=>201));
	}
	mysqli_close($connectDB); 
}

function updateLastActive($userID){
  $connectDB = databaseConnection();
  $currentDateTime = date('Y-m-d H:i:s');
	$sql = "UPDATE `account_information` SET `last_active`='$currentDateTime' WHERE user_id=$userID";
	if (mysqli_query($connectDB, $sql)) {
		echo json_encode(array("statusCode"=>200));
	} else {
		echo json_encode(array("statusCode"=>201));
	}
	mysqli_close($connectDB); 
}

function retrieveActiveUser(){
  updateLastActive("2023000001");
  $connectDB = databaseConnection();
  $dateTime = date('Y-m-d H:i:s', time() - 5 * 60);
  $sql = "SELECT * FROM account_information WHERE last_active>='$dateTime' AND status='1'";
  $result = $connectDB->query($sql);

  if ($result->num_rows > 0) {
    $studentList = array(); 
    while($row = $result->fetch_assoc()) {
      $student = new Student();
      $student->set_studentID($row["user_id"]);
      $student->set_name($row["user_name"]);
      array_push($studentList, $student);
    }
    echo json_encode($studentList);
  } else {
    echo json_encode(array("statusCode"=>201));
  }
  $connectDB->close();
}

function retrieveStudentYearLevel($yearLevel){
  $connectDB = databaseConnection();
  $sql = "SELECT year_level FROM student_information WHERE year_level='$yearLevel'";
  $result = $connectDB->query($sql);
  $number = $result->num_rows;
  $connectDB->close();
  return $number;
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

if($_POST['action']=='create-admin-account'){
  createAdminAccount();
}

if($_POST['action']=='create-new-subject'){
  createNewSubject();
}

if($_POST['action']=='update-subject'){
  updateSubject();
}

if($_POST['action']=='forgot-password'){
  forgotPassword($_POST['email']);
}

if($_POST['action']=='retrieve-student-account-request'){
  retrieveStudentList(0);
}

if($_POST['action']=='retrieve-student-list'){
  retrieveStudentList(1);
}

if($_POST['action']=='retrieve-admin-list'){
  retrieveAdminList(1);
}

if($_POST['action']=='retrieve-subject-list'){
  retrieveSubjectList();
}

if($_POST['action']=='retrieve-question-list'){
  retrieveQuestionList(1);
}

if($_POST['action']=='retrieve-answer-list'){
  retrieveAnswerList(1);
}

if($_POST['action']=='update-account-status'){
  updateAccountStatus($_POST['userID'],$_POST['status']);
}

if($_POST['action']=='change-password'){
  changePassword($_POST['userID'],$_POST['password']);
}

if($_POST['action']=='get-dashboard-data'){
  // retrieveActiveUser();
  $numberOfStudent = retrieveStudentNumber(1);
  $numberOfStudentRequest = retrieveStudentNumber(0);
  $numberOfQuestion = retrieveQuestionNumber(null, null);
  $numberOfAnsweredQuestion = retrieveQuestionNumber(1, null);
  $numberOfUnansweredQuestion = retrieveQuestionNumber(0, null);
  $numberOfAnswer = retrieveAnswerNumber();
  $firstYear = retrieveStudentYearLevel(1);
  $secondYear = retrieveStudentYearLevel(2);
  $thirdYear = retrieveStudentYearLevel(3);
  $fourthYear = retrieveStudentYearLevel(4);
  echo json_encode(array(
    "student"=>array("active"=>$numberOfStudent, "pending"=>$numberOfStudentRequest, "firstYear"=>$firstYear, "secondYear"=>$secondYear,"thirdYear"=>$thirdYear,"fourthYear"=>$fourthYear),
    "forum"=>array("question"=>$numberOfQuestion, "answer"=>$numberOfAnswer, "answered"=>$numberOfAnsweredQuestion, "unanswered"=>$numberOfUnansweredQuestion)));
}

?>