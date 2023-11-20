<?php
session_start();
include './data-model.php';
date_default_timezone_set('Asia/Singapore');

require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;

if($_POST == null OR $_POST['action'] == null){
  exit;
}

function databaseConnection(){
  // $servername = "localhost:3307";
  // $username = "root";
  // $password = "";
  // $dbname = "code_connect";

  $servername = "127.0.0.1:3306";
  $username = "u929248875_admin";
  $password = "CodeConnect-ccf3";
  $dbname = "u929248875_code_connect";
  
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
  $sql = "SELECT * FROM account_information 
  where email='$email' AND password='$password' 
  OR user_name='$email' AND password='$password' ";
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
        if($row["user_type"] == 1){
          retrieveStudentInformation($connectDB, $row["user_id"]);
        } else if($row["user_type"] == 2) {
          retrieveAdminInformation($connectDB, $row["user_id"]);
        } else if($row["user_type"] == 3) {
          retrieveSpecialAccountInformation($connectDB, $row["user_id"]);
        }
        echo json_encode(array("statusCode"=>200));
      }
    }
  } else {
    echo json_encode(array("statusCode"=>201));
  }
  $connectDB->close();
}

function guestLogin(){
  $_SESSION['user_id'] = "Guest";
  $_SESSION['user_type'] = "4";
  $_SESSION['user_name'] = "Guest";
  $_SESSION['status'] = "1";
  $_SESSION['picture'] = "default.svg";
  echo json_encode(array("statusCode"=>200));
}

function retrieveUserProfile(){
  if($_SESSION["user_type"] == 1){
    $student = new Student();
    $student->set_studentID($_SESSION["user_id"]);
    $student->set_name($_SESSION["name"]);
    $student->set_yearLevel($_SESSION["year_level"]);
    $student->set_specialization($_SESSION["specialization"]);
    $student->set_username($_SESSION["user_name"]);
    $student->set_picture($_SESSION["picture"]);
    $student->set_status($_SESSION["status"]);
    $student->set_ranking(retrieveUserRank($_SESSION["user_id"]));
    echo json_encode(array("statusCode"=>200,"studentInformation"=>$student, "userType"=>$_SESSION["user_type"]));
  } else if($_SESSION["user_type"] == 3){
    $specialAccount = new SpecialAccount();
    $specialAccount->set_accountID($_SESSION["user_id"]);
    $specialAccount->set_name($_SESSION["name"]);
    $specialAccount->set_job($_SESSION["job"]);
    $specialAccount->set_username($_SESSION["user_name"]);
    $specialAccount->set_picture($_SESSION["picture"]);
    echo json_encode(array("statusCode"=>200,"specialAccountInformation"=>$specialAccount, "userType"=>$_SESSION["user_type"]));
  } else if($_SESSION["user_type"] == 4){
    $specialAccount = new SpecialAccount();
    $specialAccount->set_accountID($_SESSION["user_id"]);
    $specialAccount->set_username($_SESSION["user_name"]);
    $specialAccount->set_picture($_SESSION["picture"]);
    echo json_encode(array("statusCode"=>200,"specialAccountInformation"=>$specialAccount, "userType"=>$_SESSION["user_type"]));
  } 
}


function retrieveStudentInformation($connectDB, $studentID){
  $sql = "SELECT * FROM student_information where student_id='$studentID'";
  $result = $connectDB->query($sql);
  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      $_SESSION['name'] = $row["name"];
      $_SESSION['year_level'] = $row["year_level"];
      $_SESSION['specialization'] = $row["specialization"];
      $_SESSION['picture'] = getProfilePicture($row["picture"]);  
    }
  }
}

function retrieveAdminInformation($connectDB,$adminID){
  $sql = "SELECT * FROM admin_information where admin_id='$adminID'";
  $result = $connectDB->query($sql);
  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $_SESSION['name'] = $row["name"];
        $_SESSION['picture'] = getProfilePicture($row["picture"]);
    }
  }
}

function retrieveSpecialAccountInformation($connectDB,$accountID){
  $sql = "SELECT * FROM special_account_information where account_id='$accountID'";
  $result = $connectDB->query($sql);
  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $_SESSION['name'] = $row["name"];
        $_SESSION['picture'] = getProfilePicture($row["picture"]);
        $_SESSION['job'] = $row["job"];
    }
  }
}

function getProfilePicture($picture){
  if($picture != null){
    return $picture;
  } else {
    return "default.svg";
  }
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
  $password=md5($_POST['password']);
  $email=$_POST['email'];
  $statusCode = array();
  
  $duplicate=mysqli_query($connectDB,"SELECT * from account_information where user_name='$username'");
  
  if (mysqli_num_rows($duplicate)>0){
    while($row = $duplicate->fetch_assoc()) {
      if($row['user_name'] == $username){
        array_push($statusCode, 5002);
      } 
    }
  } else {
    $insertAccountInformationQuery = "INSERT INTO 
    `account_information`( `user_id`, `user_type`, `user_name`, `email`, `password`, `status`) 
    VALUES ('$studentID','1','$username','$email', '$password', '1')";

    if (mysqli_query($connectDB, $insertAccountInformationQuery)) {
      array_push($statusCode, 200);
      // if($scanType == 1){
      //   saveAttachment($connectDB, $studentID, $_SESSION['uploadedCOR'], $scanType);
      // }
    } else {
      array_push($statusCode, 5004);
    }
  }
  echo json_encode(array("statusCode"=>$statusCode));
  $connectDB->close();
}

function validateStudentEmail(){
  $connectDB = databaseConnection();
  $email=$_POST['email'];
  $statusCode = array();
  $otp = random_int(100000, 999999);
  $existingSQL = "SELECT * 
  FROM student_information 
  INNER JOIN account_information 
  ON student_information.student_id = account_information.user_id 
  WHERE student_information.email='$email'";
  $existingQuery=mysqli_query($connectDB,$existingSQL);

  $emailSQL = "SELECT * FROM student_information WHERE email='$email'";
  $emailQuery=mysqli_query($connectDB,$emailSQL);
  
  if (mysqli_num_rows($existingQuery)>0){
    array_push($statusCode, 5000);
  } else if (mysqli_num_rows($emailQuery) == 0){
    array_push($statusCode, 5001);
  } else {
    $sql = "UPDATE `student_information` SET `otp`='$otp' WHERE email='$email' ";
    if (mysqli_query($connectDB, $sql)) {
      array_push($statusCode, 200);
    } else {
      array_push($statusCode, 500);
    }
  }
  echo json_encode(array("statusCode"=>$statusCode, "otp"=>$otp));
  $connectDB->close();
}

function validateOTP(){
  $connectDB = databaseConnection();
  $email=$_POST['email'];
  $otp=$_POST['otp'];
  $statusCode = array();
  $student = new Student();

  $sql = "SELECT * FROM student_information WHERE email='$email' AND otp='$otp'";
  $query=mysqli_query($connectDB,$sql);
  
  if (mysqli_num_rows($query)==0){
    array_push($statusCode, 500);
  } else {
    while($row = $query->fetch_assoc()) {
      $student->set_studentID($row["student_id"]);
      $student->set_name($row["name"]);
      $student->set_yearLevel($row["year_level"]);
      $student->set_specialization($row["specialization"]);
      $student->set_email($row["email"]);
    }
    array_push($statusCode, 200);
  }
  echo json_encode(array("statusCode"=>$statusCode, "student"=>$student));
  $connectDB->close();
}

function saveAttachment($connectDB, $userID, $fileName, $type){
  $statusCode = array();  
  $sql = "INSERT INTO `attachment`(`user_id`, `attachment`, `type`) 
  VALUES ('$userID','$fileName', $type)";
  if (mysqli_query($connectDB, $sql)) {
    return 200;
  } else {
    return 201;
  }
}

function createAdminAccount(){
  $connectDB = databaseConnection();
  $username=$_POST['username'];
  $email=$_POST['email'];
  $name=$_POST['name'];
  $password=md5($_POST['password']);
  $statusCode = array();
  $duplicate=mysqli_query($connectDB,"select * from account_information where email='$email' OR user_name='$username'");
  $lastRecord=mysqli_query($connectDB,"select user_id from account_information WHERE user_type='2' ORDER BY user_id DESC LIMIT 1");
  if (mysqli_num_rows($duplicate)>0){
    while($row = $duplicate->fetch_assoc()) {
      // if($row['user_id'] == $studentID){
      //   array_push($statusCode, 5001);
      // }

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
    
    $insertAccountInformationQuery = "INSERT INTO 
    `account_information`( `user_id`, `user_type`, `user_name`, `email`, `password`, `status`) 
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

function createSpecialAccount(){
  $connectDB = databaseConnection();
  $username=$_POST['username'];
  $email=$_POST['email'];
  $name=$_POST['name'];
  $password=md5($_POST['password']);
  $job=$_POST['specialization'];
  $id=$_SESSION['uploadedCOR'];
  $statusCode = array();
  $duplicate=mysqli_query($connectDB,"select * from account_information where email='$email' OR user_name='$username'");
  $lastRecord=mysqli_query($connectDB,"select account_id from special_account_information ORDER BY account_id DESC LIMIT 1");
  if (mysqli_num_rows($duplicate)>0){
    while($row = $duplicate->fetch_assoc()) {

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
        $userID = $row["account_id"] + 1;
      }
    } else {
      $userID = 1000000001;
    }
    
    $insertAccountInformationQuery = "INSERT INTO 
    `account_information`( `user_id`, `user_type`, `user_name`, `email`, `password`, `status`) 
    VALUES ('$userID','3','$username','$email', '$password', '0')";

    $insertSpecialAccountInformationQuery = "INSERT INTO `special_account_information`( `account_id`, `name`, `job`, id) 
    VALUES ('$userID','$name','$job','$id')";

    if (mysqli_query($connectDB, $insertAccountInformationQuery)) {
      array_push($statusCode, 200);
    } else {
      array_push($statusCode, 5004);
    }

    if (mysqli_query($connectDB, $insertSpecialAccountInformationQuery)) {
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

function saveQuestion(){
  $connectDB = databaseConnection();
  $title=$_POST['title'];
  $description=$_POST['description'];
  $subject=$_POST['subject'];
  $userID=$_SESSION['user_id'];

  $statusCode = array();  
  $sql = "INSERT INTO `question_information`(`student_id`, `subject_id`, `title`,`description`,`status`) 
  VALUES ('$userID','$subject','$title','$description','1')";
  if (mysqli_query($connectDB, $sql)) {
    array_push($statusCode, 200);
  } else {
    array_push($statusCode, 201);
  }
  echo json_encode(array("statusCode"=>$statusCode));
  $connectDB->close();
}

function saveAnswer($questionID, $answer){
  $connectDB = databaseConnection();
  $userID=$_SESSION['user_id'];
  $sql = "INSERT INTO `answer`(`student_id`, `question_id`, `answer`,`status`) 
  VALUES ('$userID','$questionID','$answer','1')";
  if (mysqli_query($connectDB, $sql)) {
    if($creatorID=$_POST['creatorID'] != $userID){
      sendNotification($connectDB, $_POST['creatorID'], $questionID, mysqli_insert_id($connectDB), 1);
    }
    echo json_encode(array("statusCode"=>'200'));
  } else {
    echo json_encode(array("statusCode"=>'201'));
  }
  setQuestionAnswered($connectDB, $questionID);
  $connectDB->close();
}

function setQuestionAnswered($connectDB, $questionID){
  $connectDB = databaseConnection();
  $sql = "UPDATE `question_information` SET `status`='2' WHERE question_id=$questionID";
  if (mysqli_query($connectDB, $sql)) {
    return true;
  } else {
    return false;
  }
}

function saveReply($answerID, $response){
  $connectDB = databaseConnection();
  $userID=$_SESSION['user_id'];
  $sql = "INSERT INTO `reply`(`student_id`, `answer_id`, `reply`,`status`) 
  VALUES ('$userID','$answerID','$response','1')";
  if (mysqli_query($connectDB, $sql)) {
    if($creatorID=$_POST['creatorID'] != $userID){
      sendNotification($connectDB, $_POST['creatorID'], $_POST['questionID'], mysqli_insert_id($connectDB), 2);
    }
    echo json_encode(array("statusCode"=>'200'));
  } else {
    echo json_encode(array("statusCode"=>'201'));
  }
  $connectDB->close();
}

function retrieveStudentList($status){
  $connectDB = databaseConnection();

  $sql = "SELECT 
  account_information.user_id, 
  account_information.email, 
  account_information.creation_type, 
  account_information.user_name, 
  account_information.status, 
  student_information.name, 
  student_information.year_level, 
  student_information.specialization, 
  student_information.picture,
  SUM(rating.rating) as total_rating 
  FROM account_information 
  INNER JOIN student_information ON account_information.user_id=student_information.student_id 
  LEFT JOIN rating ON student_information.student_id=rating.student_id 
  where account_information.status=1 AND account_information.user_type=1
  GROUP BY student_information.student_id";

  if($status == 0){
    $sql = "SELECT * FROM student_information";
  }


  $result = $connectDB->query($sql);

  if ($result->num_rows > 0) {
    $studentList = array(); 
    while($row = $result->fetch_assoc()) {
      $student = new Student();
      

      if($status == 1){
        $student->set_studentID($row["user_id"]);
        $student->set_name($row["name"]);
        $student->set_yearLevel($row["year_level"]);
        $student->set_specialization($row["specialization"]);
        $student->set_email($row["email"]);
        $student->set_picture($row["picture"]);
        $student->set_status($row["status"]);
        $student->set_username($row["user_name"]);
        $student->set_rating($row["total_rating"]);
        $student->set_creationType($row["creation_type"]);
        if($row["creation_type"] == 1 and $status == 0){
          $student->set_attachment(retrieveAttachment($connectDB, $row["user_id"]));
        }
      } else {
        $student->set_studentID($row["student_id"]);
        $student->set_name($row["name"]);
        $student->set_yearLevel($row["year_level"]);
        $student->set_specialization($row["specialization"]);
        $student->set_email($row["email"]);
        $student->set_picture($row["picture"]);
      }
      array_push($studentList, $student);
    }
    echo json_encode(array("statusCode"=>200,"studentList"=>$studentList));
  } else {
    echo json_encode(array("statusCode"=>201));
  }
  $connectDB->close();
}

function retrieveSpecialAccountList($status){
  $connectDB = databaseConnection();
  $sql = "SELECT 
  account_information.user_id, 
  account_information.email, 
  account_information.creation_type, 
  account_information.user_name, 
  account_information.status, 
  special_account_information.name, 
  special_account_information.job, 
  special_account_information.picture,
  special_account_information.id
  FROM account_information 
  LEFT JOIN special_account_information ON account_information.user_id=special_account_information.account_id 
  where account_information.status=$status AND account_information.user_type=3";
  $result = $connectDB->query($sql);

  if ($result->num_rows > 0) {
    $studentList = array(); 
    while($row = $result->fetch_assoc()) {
      $student = new Student();
      $student->set_studentID($row["user_id"]);
      $student->set_name($row["name"]);
      $student->set_specialization($row["job"]);
      $student->set_email($row["email"]);
      $student->set_username($row["user_name"]);
      $student->set_picture($row["picture"]);
      $student->set_status($row["status"]);
      $student->set_attachment($row["id"]);
      array_push($studentList, $student);
    }
    echo json_encode(array("statusCode"=>200,"specialAccountList"=>$studentList));
  } else {
    echo json_encode(array("statusCode"=>201));
  }
  $connectDB->close();
}

function retrieveAttachment($connectDB,$studentID){
  $sql = "SELECT attachment FROM `attachment` WHERE user_id = '$studentID'";
  $result = $connectDB->query($sql);
  $attachment = "";
  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      $attachment = $row['attachment'];
    }
  }
  return $attachment;
}

function retrieveUserRank($studentID){
  $connectDB = databaseConnection();
  $sql = "SELECT 
  student_id, 
  SUM(rating) as total_rating, 
  RANK() OVER (ORDER BY SUM(rating) DESC) as rank 
  FROM `rating` 
  GROUP BY student_id;";
  $result = $connectDB->query($sql);
  $rank = new Rank();
  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      if($studentID == $row["student_id"]){
        $rank->set_studentID($row["student_id"]);
        $rank->set_rating($row["total_rating"]);
        $rank->set_rank($row["rank"]);
        break;
      }
    }
  }
  $connectDB->close();
  return $rank;
}

function retrieveRankingList($limit, $filter){
  $connectDB = databaseConnection();
  
  $sql = "SELECT 
    student_id,
    SUM(rating) as total_rating, 
    RANK() OVER (ORDER BY SUM(rating) DESC) as rank 
    FROM `rating` 
    GROUP BY student_id ORDER BY rank LIMIT $limit";
  
  if($filter != -1){
    $sql = "SELECT 
    student_id,
    SUM(rating) as total_rating, 
    RANK() OVER (ORDER BY SUM(rating) DESC) as rank 
    FROM `rating` 
    WHERE rating.student_flag=$filter GROUP BY student_id ORDER BY rank LIMIT $limit";
  }

  $result = $connectDB->query($sql);
  if ($result->num_rows > 0) {
    $rankingList = array(); 
    while($row = $result->fetch_assoc()) {
      $rank = new Rank();
      $rank->set_studentID($row["student_id"]);
      if(isSpecialAccount($row["student_id"])){
        $rank->set_professionalInformation(retrieveProfessionalDetail($connectDB, $row["student_id"]));
      } else {
        $rank->set_studentInformation(retrieveStudentDetail($connectDB, $row["student_id"]));
      }

      $rank->set_rating($row["total_rating"]);
      $rank->set_rank($row["rank"]);
      array_push($rankingList, $rank); 
    }
    echo json_encode(array("statusCode"=>200, "rankingList"=>$rankingList));
  } else {
    echo json_encode(array("statusCode"=>201));
  }
  $connectDB->close();
}

function retrieveProfessionalDetail($connectDB, $studentID){
  $sql = "SELECT 
  account_information.user_name, 
  special_account_information.job, 
  special_account_information.picture 
  FROM account_information 
  INNER JOIN special_account_information 
  ON account_information.user_id=special_account_information.account_id 
  where account_information.status=1 
  AND account_information.user_type=3 
  AND account_information.user_id = '$studentID' LIMIT 1";
  $result = $connectDB->query($sql);
  $specialAccount = new SpecialAccount();
  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      $specialAccount->set_job($row["job"]);
      $specialAccount->set_username($row["user_name"]);
      $specialAccount->set_picture($row["picture"]);
    }
  }
  return $specialAccount;
}

function retrieveStudentDetail($connectDB, $studentID){
  $sql = "SELECT 
  account_information.user_name, 
  student_information.year_level, 
  student_information.specialization, 
  student_information.picture 
  FROM account_information 
  INNER JOIN student_information ON account_information.user_id=student_information.student_id 
  where account_information.status=1 
  AND account_information.user_type=1 
  AND account_information.user_id = '$studentID' LIMIT 1";
  $result = $connectDB->query($sql);
  $student = new Student();
  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      $student->set_yearLevel($row["year_level"]);
      $student->set_specialization($row["specialization"]);
      $student->set_username($row["user_name"]);
      $student->set_picture($row["picture"]);
    }
  }
  return $student;
}

function retrieveStudentNumber($status){
  $connectDB = databaseConnection();
  $sql = "SELECT user_id FROM account_information where status='$status' AND user_type='1'";
  $result = $connectDB->query($sql);
  $number = $result->num_rows;
  $connectDB->close();
  return $number;
}

function retrieveUsername($connectDB, $userID){
  $sql = "SELECT user_name FROM account_information WHERE user_id = $userID";
  $result = $connectDB->query($sql);
  if ($result->num_rows > 0) { 
    $row = $result->fetch_assoc();
    return $row["user_name"];
  }
}

function retrieveQuestionNumber($status, $subject){
  $connectDB = databaseConnection();
  if($status != null AND $subject != null){
    $sql = "SELECT question_id FROM question_information where status='$status' AND subject_id='$subject'";
  } else if($status != null) {
    $sql = "SELECT question_id FROM question_information where status='$status'";
  } else {
    $sql = "SELECT question_id FROM question_information where status != '0'";
  }
  
  $result = $connectDB->query($sql);
  $number = $result->num_rows;
  $connectDB->close();
  return $number;
}

function retrieveQuestionNumberPerYearLevel($subjectID, $yearLevel){
  $connectDB = databaseConnection();

  $sql = "SELECT question_id 
  FROM question_information
  LEFT JOIN student_information ON question_information.student_id=student_information.student_id
  where status!=0 AND student_information.year_level=$yearLevel";

  if($subjectID != null){
    $sql = "SELECT question_id 
    FROM question_information
    LEFT JOIN student_information ON question_information.student_id=student_information.student_id
    where status!=0 
    AND question_information.subject_id='$subjectID'
    AND student_information.year_level=$yearLevel";
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

function retrieveAdminDetail($adminID){
  $connectDB = databaseConnection();
  $sql = "SELECT 
  account_information.user_id, 
  account_information.email, 
  account_information.user_name, 
  account_information.status, 
  admin_information.name, 
  admin_information.picture 
  FROM account_information 
  INNER JOIN admin_information ON account_information.user_id=admin_information.admin_id 
  where account_information.user_id=$adminID 
  AND account_information.user_type=2";
  $result = $connectDB->query($sql);

  if ($result->num_rows > 0) {
    $admin = new Admin(); 
    while($row = $result->fetch_assoc()) {
      $admin->set_adminID($row["user_id"]);
      $admin->set_name($row["name"]);
      $admin->set_email($row["email"]);
      $admin->set_username($row["user_name"]);
      $admin->set_picture(getProfilePicture($row["picture"]));
      $admin->set_status($row["status"]);
    }
    echo json_encode(array("statusCode"=>200, "admin"=>$admin));
  } else {
    echo json_encode(array("statusCode"=>201));
  }
  $connectDB->close();
}

function retrieveAccountInfo($userID){
  $connectDB = databaseConnection();
  $sql = "SELECT 
  account_information.user_id, 
  account_information.email, 
  account_information.user_name,
  account_information.user_type,
  account_information.status, 
  student_information.name AS student_name,
  student_information.year_level AS student_year_level,
  student_information.specialization AS student_specialization,
  student_information.picture AS student_picture,
  special_account_information.name AS special_name,
  special_account_information.job AS special_job,
  special_account_information.picture AS special_picture
  FROM account_information 
  LEFT JOIN student_information ON account_information.user_id=student_information.student_id 
  LEFT JOIN special_account_information ON account_information.user_id=special_account_information.account_id 
  where account_information.user_id=$userID";
  $result = $connectDB->query($sql);

  if ($result->num_rows > 0) {
    $account = new Account(); 
    while($row = $result->fetch_assoc()) {
      $account->set_userID($row["user_id"]);
      $account->set_email($row["email"]);
      $account->set_userName($row["user_name"]);
      $account->set_userType($row["user_type"]);
      $account->set_status($row["status"]);
      if($row['user_type'] == '1'){
        $student = new Student();
        $student->set_name($row["student_name"]);
        $student->set_yearLevel($row["student_year_level"]);
        $student->set_specialization($row["student_specialization"]);
        $student->set_picture(getProfilePicture($row["student_picture"]));
        $account->set_studentInfo($student);
      } else if ($row['user_type'] == '3'){
        $specialAccount = new SpecialAccount();
        $specialAccount->set_name($row["special_name"]);
        $specialAccount->set_job($row["special_job"]);
        $specialAccount->set_picture(getProfilePicture($row["special_picture"]));
        $account->set_specialAccountInfo($specialAccount);
      } 

    }
    echo json_encode(array("statusCode"=>200, "account"=>$account));
  } else {
    echo json_encode(array("statusCode"=>201));
  }
  $connectDB->close();
}


function retrieveAdminList($status){
  $connectDB = databaseConnection();
  $sql = "SELECT 
  account_information.user_id, 
  account_information.email, 
  account_information.user_name, 
  account_information.status, 
  admin_information.name, 
  admin_information.picture 
  FROM account_information 
  INNER JOIN admin_information ON account_information.user_id=admin_information.admin_id 
  where (account_information.status != 2 
  AND account_information.status != -1)  
  AND account_information.user_type=2";
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

function retrieveQuestionList(){
  $connectDB = databaseConnection();
  $sql = "SELECT 
  question_information.* ,
  subject.subject, 
  student_information.name AS student_name,
  student_information.picture AS student_picture,
  student_information.year_level,
  student_information.specialization,
  special_account_information.name AS special_name,
  special_account_information.job AS special_job,
  special_account_information.picture AS special_picture,
  account_information.user_name, 
  account_information.email 
  FROM question_information 
  LEFT JOIN subject ON question_information.subject_id=subject.subject_id 
  LEFT JOIN student_information ON question_information.student_id=student_information.student_id
  LEFT JOIN special_account_information ON question_information.student_id=special_account_information.account_id
  LEFT JOIN account_information ON question_information.student_id=account_information.user_id 
  where question_information.status>0 
  ORDER BY `question_information`.`question_id` ASC";
  $result = $connectDB->query($sql);
  if ($result->num_rows > 0) {
    $questionList = array(); 
    while($row = $result->fetch_assoc()) {
      $question = new Question();
      $question->set_studentID($row["student_id"]);
      $question->set_userName($row["user_name"]);
      $question->set_email($row["email"]);
      $question->set_questionID($row["question_id"]);
      $question->set_subjectID($row["subject_id"]);
      $question->set_subject($row["subject"]);
      $question->set_creationDateTime($row["creation_datetime"]);
      $question->set_title($row["title"]);
      $question->set_description($row["description"]);
      $question->set_status($row["status"]);

      if(isSpecialAccount($row["student_id"])){
        $question->set_name($row["special_name"]);
        $question->set_picture($row["special_picture"]);
        $question->set_specialization($row["special_job"]);
      } else {
        $question->set_name($row["student_name"]);
        $question->set_picture($row["student_picture"]);
        $question->set_yearLevel($row["year_level"]);
        $question->set_specialization($row["specialization"]);
      }

      array_push($questionList, $question);
    }
    echo json_encode($questionList);
  } else {
    echo json_encode(array("statusCode"=>201));
  }
  $connectDB->close();
}

function isSpecialAccount($id){
  if(strlen($id) == 10){
    if(substr($id, 0, 3) == "100"){
      return true;
    } else {
      return false;
    }
  }
}

function retrieveLatestQuestionList($subject, $status, $limit, $search){
  $connectDB = databaseConnection();
  $sql = "";
  $statusFilter = "";
  $searchFilter = "";
  if($status == -1){
    $statusFilter = "question_information.status > 0";
  } else {
    $statusFilter = "question_information.status = ".$status;
  }

  if($search != ""){
    $searchFilter = "AND MATCH(question_information.title) AGAINST ('$search')";
  }

  if($subject == -1){
    $sql = "SELECT question_information.* ,
    student_information.year_level AS student_year_level,
    student_information.picture AS student_picture,
    special_account_information.job AS special_job,
    special_account_information.picture AS special_picture
    FROM question_information 
    LEFT JOIN student_information ON question_information.student_id=student_information.student_id
    LEFT JOIN special_account_information ON question_information.student_id=special_account_information.account_id 
    where $statusFilter  $searchFilter ORDER BY question_information.creation_datetime DESC LIMIT $limit";
  } else {
    $sql = "SELECT question_information.*,
    student_information.year_level AS student_year_level,
    student_information.picture AS student_picture,
    special_account_information.job AS special_job,
    special_account_information.picture AS special_picture
    FROM question_information 
    LEFT JOIN student_information ON question_information.student_id=student_information.student_id 
    LEFT JOIN special_account_information ON question_information.student_id=special_account_information.account_id
    where $statusFilter  $searchFilter and question_information.subject_id=$subject ORDER BY question_information.creation_datetime DESC LIMIT $limit";
  }
  
  $result = $connectDB->query($sql);
  if ($result->num_rows > 0) {
    $questionList = array(); 
    while($row = $result->fetch_assoc()) {
      $question = new Question();
      $question->set_studentID($row["student_id"]);
      $question->set_name(retrieveUsername($connectDB,$row["student_id"]));
      $question->set_questionID($row["question_id"]);
      $question->set_subjectID($row["subject_id"]);
      $question->set_title($row["title"]);
      $question->set_description($row["description"]);
      $question->set_creationDateTime($row["creation_datetime"]);
      $question->set_status($row["status"]);

      if(isSpecialAccount($row["student_id"])){
        $question->set_picture($row["special_picture"]);
      } else {
        $question->set_picture($row["student_picture"]);
      }

      array_push($questionList, $question);
    }
    echo json_encode(array("statusCode"=>200,"questionList"=>$questionList));
  } else {
    echo json_encode(array("statusCode"=>201));
  }
  $connectDB->close();
}


function retrieveActivities(){
  $userID = $_SESSION['user_id'];
  $connectDB = databaseConnection();
  $questionList = retrieveQuestionActivity($connectDB, $userID);
  $answerList = retrieveAnswerActivity($connectDB, $userID);
  $replyList = retrieveReplyActivity($connectDB, $userID);  
  echo json_encode(array("statusCode"=>200,"questionList"=>$questionList,"answerList"=>$answerList,"replyList"=>$replyList));
  $connectDB->close();  
}

function retrieveQuestionActivity($connectDB, $userID){
  $sql = "SELECT * FROM question_information where student_id=$userID and status != 0 ORDER BY creation_datetime DESC";
  $result = $connectDB->query($sql);
  if ($result->num_rows > 0) {
    $questionList = array(); 
    while($row = $result->fetch_assoc()) {
      $question = new Question();
      $question->set_questionID($row["question_id"]);
      $question->set_subjectID($row["subject_id"]);
      $question->set_title($row["title"]);
      $question->set_description($row["description"]);
      $question->set_creationDateTime($row["creation_datetime"]);
      array_push($questionList, $question);
    }
    return $questionList;
  }
}

function retrieveAnswerActivity($connectDB, $userID){
  $userID = $_SESSION['user_id'];
  $connectDB = databaseConnection();
  $sql = "SELECT * FROM answer where student_id=$userID and status != 0 ORDER BY creation_datetime DESC";
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
    return $answerList;
  }
}

function retrieveReplyActivity($connectDB, $userID){
  $userID = $_SESSION['user_id'];
  $connectDB = databaseConnection();
  $sql = "SELECT * FROM reply where student_id=$userID and status != 0 ORDER BY creation_datetime DESC";
  $result = $connectDB->query($sql);
  if ($result->num_rows > 0) {
    $replyList = array(); 
    while($row = $result->fetch_assoc()) {
      $reply = new Reply();
      $reply->set_answerID($row["answer_id"]);
      $reply->set_studentID($row["student_id"]);
      $reply->set_replyID($row["reply_id"]);
      $reply->set_answer($row["reply"]);
      $reply->set_creationDateTime($row["creation_datetime"]);
      array_push($replyList, $reply);
    }
    return $replyList;
  }
}

function retrieveFAQ(){
  $connectDB = databaseConnection();
  $sql = "SELECT 
  question_id, 
  title, 
  COUNT(title) AS `value_occurrence` 
  FROM question_information 
  where status != 0 
  GROUP BY title 
  ORDER BY `value_occurrence` 
  DESC LIMIT 5";
  $result = $connectDB->query($sql);
  if ($result->num_rows > 0) {
    $faqList = array(); 
    while($row = $result->fetch_assoc()) {
      $faq = new FAQ();
      $faq->set_questionID($row["question_id"]);
      $faq->set_title($row["title"]);
      array_push($faqList, $faq);
    }
    echo json_encode(array("statusCode"=>200,"faqList"=>$faqList));
  } else {
    echo json_encode(array("statusCode"=>201));
  }
  $connectDB->close();
}

function searchFAQ($search){
  $connectDB = databaseConnection();
  $sql = "SELECT title FROM question_information WHERE MATCH(title) AGAINST('$search') AND status != 0 GROUP BY title LIMIT 5";
  $result = $connectDB->query($sql);
  if ($result->num_rows > 0) {
    $faqList = array(); 
    while($row = $result->fetch_assoc()) {
      $faq = new FAQ();
      $faq->set_title($row["title"]);
      array_push($faqList, $faq);
    }
    echo json_encode(array("statusCode"=>200,"faqList"=>$faqList));
  } else {
    echo json_encode(array("statusCode"=>201));
  }
  $connectDB->close();
}

function retrieveQuestionDetail($questionID){
    $connectDB = databaseConnection();
    $question = new Question();
    $statusCode = "";
    $subjectID = "";
    $response = array();
    $sql = "SELECT 
    question_information.*,
    student_information.year_level AS student_year_level,
    student_information.picture AS student_picture,
    special_account_information.job AS special_job,
    special_account_information.picture AS special_picture
    FROM question_information 
    LEFT JOIN student_information ON question_information.student_id=student_information.student_id
    LEFT JOIN special_account_information ON question_information.student_id=special_account_information.account_id 
    where question_information.question_id = $questionID LIMIT 1";
    $result = $connectDB->query($sql);
    if ($result->num_rows > 0) { 
      while($row = $result->fetch_assoc()) {
        $question->set_studentID($row["student_id"]);
        $question->set_name(retrieveUsername($connectDB, $row['student_id']));
        $question->set_questionID($row["question_id"]);
        $question->set_subjectID($row["subject_id"]);
        $subjectID = $row["subject_id"];
        $question->set_title($row["title"]);
        $question->set_description($row["description"]);
        $question->set_creationDateTime($row["creation_datetime"]);
        $question->set_status($row["status"]);

        if(isSpecialAccount($row["student_id"])){
          $question->set_picture($row["special_picture"]);
          $question->set_specialization($row["special_job"]);
        } else {
          $question->set_yearLevel($row["student_year_level"]);
          $question->set_picture($row["student_picture"]);      
        }
      }

      $sqlSubject = "SELECT * FROM subject where subject_id = $subjectID";
      $resultSubject = $connectDB->query($sqlSubject);
      if ($resultSubject->num_rows > 0) { 
        while($rowSubject = $resultSubject->fetch_assoc()) {
          $question->set_subject($rowSubject["subject"]);
        }
      }
      $statusCode = "200";
    } else {
      $statusCode = "201";
    }

    echo json_encode(array("statusCode"=>$statusCode,"question"=>$question));

    $connectDB->close();
}

function retrieveAnswer($questionID){
  $connectDB = databaseConnection();
  $question = new Question();
  $statusCode = "";
  $subjectID = "";
  $response = array();
  $sql = "SELECT 
  question_information.* ,
  student_information.*  
  ROM question_information 
  INNER JOIN student_information ON question_information.student_id=student_information.student_id 
  where question_id = $questionID LIMIT 1";
  $result = $connectDB->query($sql);
  if ($result->num_rows > 0) { 
    while($row = $result->fetch_assoc()) {
      $question->set_studentID($row["student_id"]);
      $question->set_picture($row["picture"]);
      $question->set_name($row["name"]);
      $question->set_questionID($row["question_id"]);
      $question->set_subjectID($row["subject_id"]);
      $question->set_yearLevel($row["year_level"]);
      $subjectID = $row["subject_id"];
      $question->set_title($row["title"]);
      $question->set_description($row["description"]);
      $question->set_creationDateTime($row["creation_datetime"]);
      $question->set_status($row["status"]);
    }

    $sqlSubject = "SELECT * FROM subject where subject_id = $subjectID";
    $resultSubject = $connectDB->query($sqlSubject);
    if ($resultSubject->num_rows > 0) { 
      while($rowSubject = $resultSubject->fetch_assoc()) {
        $question->set_subject($rowSubject["subject"]);
      }
    }
    $statusCode = "200";
  } else {
    $statusCode = "201";
  }

  echo json_encode(array("statusCode"=>$statusCode,"question"=>$question));

  $connectDB->close();
}

function retrieveQuestion($questionID){
  $connectDB = databaseConnection();
  $question = new Question();
  $statusCode = "";
  $subjectID = "";
  $response = array();
  $sql = "SELECT question_information.*,
  student_information.picture AS student_picture,
  student_information.specialization AS student_specialization,
  student_information.year_level AS student_year_level,
  student_information.name AS student_name,
  special_account_information.job AS special_job,
  special_account_information.picture AS special_picture,
  special_account_information.name AS special_name
  FROM question_information 
  LEFT JOIN student_information ON question_information.student_id=student_information.student_id
  LEFT JOIN special_account_information ON question_information.student_id=special_account_information.account_id 
  where question_id = $questionID LIMIT 1";
  $result = $connectDB->query($sql);
  if ($result->num_rows > 0) { 
    while($row = $result->fetch_assoc()) {
      $question->set_studentID($row["student_id"]);
      $question->set_questionID($row["question_id"]);
      $question->set_subjectID($row["subject_id"]);
      $subjectID = $row["subject_id"];
      $question->set_title($row["title"]);
      $question->set_description($row["description"]);
      $question->set_creationDateTime($row["creation_datetime"]);
      $question->set_status($row["status"]);

      if(isSpecialAccount($row["student_id"])){
        $question->set_specialization($row["special_job"]);
        $question->set_picture($row["special_picture"]);        
        $question->set_name($row["special_name"]);
      } else {
        $question->set_picture($row["student_picture"]);
        $question->set_specialization($row["student_specialization"]);
        $question->set_yearLevel($row["student_year_level"]);  
        $question->set_name($row["student_name"]);
      }
    }

    $sqlSubject = "SELECT * FROM subject where subject_id = $subjectID";
    $resultSubject = $connectDB->query($sqlSubject);
    if ($resultSubject->num_rows > 0) { 
      while($rowSubject = $resultSubject->fetch_assoc()) {
        $question->set_subject($rowSubject["subject"]);
      }
    }
    $statusCode = "200";
  } else {
    $statusCode = "201";
  }

  echo json_encode(array("statusCode"=>$statusCode,"question"=>$question));

  $connectDB->close();
}

function retrieveAnswerList($status){
  $connectDB = databaseConnection();
  $sql = "SELECT 
  question_information.question_id, 
  question_information.title, 
  question_information.description, 
  question_information.subject_id, 
  question_information.creation_datetime,
  answer.*, 
  subject.subject, 
  student_information.name AS student_name,
  student_information.picture AS student_picture,  
  student_information.year_level, 
  student_information.specialization,

  special_account_information.name AS special_name,
  special_account_information.picture AS special_picture,  
  special_account_information.job,

  account_information.*, 
  SUM(rating.rating) as total_rating 
  FROM answer 
  LEFT JOIN question_information ON answer.question_id=question_information.question_id 
  LEFT JOIN student_information ON student_information.student_id=answer.student_id
  LEFT JOIN special_account_information ON special_account_information.account_id=answer.student_id 
  LEFT JOIN account_information ON answer.student_id=account_information.user_id
  LEFT JOIN rating ON rating.answer_id=answer.answer_id
  LEFT JOIN subject on question_information.subject_id=subject.subject_id where answer.status=1 GROUP BY answer.answer_id";
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
      $answer->set_rating($row["total_rating"]);
      $answer->set_rating(retrieveAnswerTotalRating($connectDB, $row['answer_id']));

      $student = new Student();
      $student->set_studentID($row["user_id"]);
      $student->set_username($row["user_name"]);
      $student->set_status($row["status"]);
      $student->set_email($row["email"]);

      if(isSpecialAccount($row["student_id"])){
        $student->set_name($row["special_name"]);
        $student->set_specialization($row["job"]);
        $student->set_picture($row["special_picture"]);
      } else {
        $student->set_name($row["student_name"]);
        $student->set_yearLevel($row["year_level"]);
        $student->set_specialization($row["specialization"]);
        $student->set_picture($row["student_picture"]);
      }

      $answer->set_studentInformation($student);

      $question = new Question();
      $question->set_questionID($row["question_id"]);
      $question->set_subject($row["subject"]);
      $question->set_creationDateTime($row["creation_datetime"]);
      $question->set_title($row["title"]);
      $question->set_description($row["description"]);
      $question->set_status($row["status"]);
      $answer->set_questionInformation($question);

      array_push($answerList, $answer);
    }
    echo json_encode($answerList);
  } else {
    echo json_encode(array("statusCode"=>201));
  }
  $connectDB->close();
}

function retrieveAnswers($questionID){
  $connectDB = databaseConnection();
  $sql = "SELECT 
  answer.*, 
  student_information.year_level AS student_year_level,
  student_information.specialization AS student_specialization,
  student_information.picture AS student_picture,
  special_account_information.job AS special_job,
  special_account_information.picture AS special_picture
  FROM answer
  LEFT JOIN student_information ON answer.student_id=student_information.student_id 
  LEFT JOIN special_account_information ON answer.student_id=special_account_information.account_id 
  where answer.question_id=$questionID AND answer.status != 0";
  $result = $connectDB->query($sql);

  if ($result->num_rows > 0) {
    $answerList = array(); 
    $replies = array();
    while($row = $result->fetch_assoc()) {
      $answer = new Answer();
      $answer->set_name(retrieveUsername($connectDB, $row['student_id']));
      $answer->set_answerID($row["answer_id"]);
      $answer->set_studentID($row["student_id"]);
      $answer->set_questionID($row["question_id"]);
      $answer->set_answer($row["answer"]);
      $answer->set_creationDateTime($row["creation_datetime"]);
      $answer->set_status($row["status"]);
      $answer->set_rating(retrieveRating($connectDB, $row["answer_id"]));
      $answer->set_replies(retrieveReplies($connectDB, $row["answer_id"]));

      if(isSpecialAccount($row["student_id"])){
        $answer->set_specialization($row["special_job"]);
        $answer->set_picture($row["special_picture"]);        
      } else {
        $answer->set_yearLevel($row["student_year_level"]);
        $answer->set_specialization($row["student_specialization"]);
        $answer->set_picture($row["student_picture"]);  
      }

      array_push($answerList, $answer);
    }
    echo json_encode(array("statusCode"=>200, "answerList"=> $answerList));
  } else {
    echo json_encode(array("statusCode"=>201));
  }
  $connectDB->close();
}

function retrieveReplies($connectDB, $answerID){
  $sql = "SELECT 
  reply.*, 
  student_information.picture AS student_picture,
  student_information.year_level AS student_year_level,
  student_information.specialization AS student_specialization,
  student_information.picture AS student_picture,
  special_account_information.job AS special_job,
  special_account_information.picture AS special_picture
  FROM reply 
  LEFT JOIN student_information ON reply.student_id=student_information.student_id 
  LEFT JOIN special_account_information ON reply.student_id=special_account_information.account_id 
  where reply.answer_id=$answerID AND status != 0";
  $result = $connectDB->query($sql);
  $replies = Array();
  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      $reply = new Reply();
      $reply->set_name(retrieveUsername($connectDB, $row['student_id']));
      $reply->set_answerID($row["answer_id"]);
      $reply->set_studentID($row["student_id"]);
      $reply->set_replyID($row["reply_id"]);
      $reply->set_answer($row["reply"]);
      $reply->set_creationDateTime($row["creation_datetime"]);
      $reply->set_status($row["status"]);

      if(isSpecialAccount($row["student_id"])){
        $reply->set_picture($row["special_picture"]);
        $reply->set_specialization($row["special_job"]);
      } else {
        $reply->set_picture($row["student_picture"]);
        $reply->set_yearLevel($row["student_year_level"]);
        $reply->set_specialization($row["student_specialization"]);
      }

      array_push($replies, $reply);
    }
  }
  return $replies;
}

function retrieveSubjectList($status){
  $connectDB = databaseConnection();
  $sql = "SELECT * FROM subject where status='$status'";
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
    echo json_encode(array("statusCode"=>200,"subjectList"=>$subjectList));
  } else {
    echo json_encode(array("statusCode"=>201));
  }
  $connectDB->close();
}

function retrieveAllSubject(){
  $connectDB = databaseConnection();
  $sql = "SELECT * FROM subject";
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

function changeNewPassword($userID, $currentPassword, $newPassword){
  $connectDB = databaseConnection();
  $existing = "SELECT * FROM account_information where user_id='$userID' AND password='$currentPassword' ";
  $existingResult = $connectDB->query($existing);
  if ($existingResult->num_rows > 0) {
    $sql = "UPDATE `account_information` SET `password`='$newPassword' WHERE user_id=$userID";
    if (mysqli_query($connectDB, $sql)) {
      echo json_encode(array("statusCode"=>200));
    } else {
      echo json_encode(array("statusCode"=>201));
    }
  } else {
    echo json_encode(array("statusCode"=>5000));
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

function updateQuestion(){
  $connectDB = databaseConnection();
  $title=$_POST['title'];
  $description=$_POST['description'];
  $subject=$_POST['subject'];
  $questionID = $_POST['questionID'];
  $status = $_POST['status'];

  $statusCode = array();  
  $sql = "UPDATE `question_information` 
  SET `title`='$title', `description`='$description', `subject_id`='$subject', `status`='$status' 
  WHERE question_id=$questionID";
  if (mysqli_query($connectDB, $sql)) {
    array_push($statusCode, 200);
  } else {
    array_push($statusCode, 201);
  }
  echo json_encode(array("statusCode"=>$statusCode));
  $connectDB->close();
}

function updateQuestionStatus($questionID,$status){
  $connectDB = databaseConnection();
  $sql = "UPDATE `question_information` SET `status`='$status' WHERE question_id=$questionID";
	if (mysqli_query($connectDB, $sql)) {
		return true;
	} else {
		return false;
	}
  $connectDB->close();
}

function updateAnswerStatus(){
  $connectDB = databaseConnection();
  $answerID = $_POST['answerID'];
  $status = $_POST['status'];
  $sql = "UPDATE `answer` SET `status`='$status' WHERE answer_id=$answerID";
	if (mysqli_query($connectDB, $sql)) {
		echo json_encode(array("statusCode"=>200));
	} else {
		echo json_encode(array("statusCode"=>201));
	}
  $connectDB->close();
}

function updateReplyStatus(){
  $connectDB = databaseConnection();
  $replyID = $_POST['replyID'];
  $status = $_POST['status'];
  $sql = "UPDATE `reply` SET `status`='$status' WHERE reply_id=$replyID";
	if (mysqli_query($connectDB, $sql)) {
		echo json_encode(array("statusCode"=>200));
	} else {
		echo json_encode(array("statusCode"=>201));
	}
  $connectDB->close();
}

function updateAnswer(){
  $connectDB = databaseConnection();
  $description=$_POST['description'];
  $answerID = $_POST['answerID'];

  $statusCode = array();  
  $sql = "UPDATE `answer` SET `answer`='$description' WHERE answer_id=$answerID";
  if (mysqli_query($connectDB, $sql)) {
    array_push($statusCode, 200);
  } else {
    array_push($statusCode, 201);
  }
  echo json_encode(array("statusCode"=>$statusCode));
  $connectDB->close();
}

function updateReply(){
  $connectDB = databaseConnection();
  $description=$_POST['description'];
  $replyID = $_POST['replyID'];

  $statusCode = array();  
  $sql = "UPDATE `reply` SET `reply`='$description' WHERE reply_id=$replyID";
  if (mysqli_query($connectDB, $sql)) {
    array_push($statusCode, 200);
  } else {
    array_push($statusCode, 201);
  }
  echo json_encode(array("statusCode"=>$statusCode));
  $connectDB->close();
}

function deleteAnswer(){

}

function isEmailOrUsernameExisting($userID, $username, $email){
  $connectDB = databaseConnection();
	$statusCode = array();
  $sql=mysqli_query($connectDB,"select * 
  from account_information 
  WHERE (email='$email' OR user_name='$username') 
  AND  user_id != '$userID' ");
  if (mysqli_num_rows($sql)>0){
    while($row = $sql->fetch_assoc()) {
      if($row['user_name'] == $username){
        array_push($statusCode, 5100);
      } 

      if($row['email'] == $email){
        array_push($statusCode, 5101);
      }
    }
  } else {
    array_push($statusCode, 200);
  }
  mysqli_close($connectDB);
  return $statusCode;
}

function debug_to_console($data) {
  $output = $data;
  if (is_array($output))
      $output = implode(',', $output);

  echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
}

function validateImageExtension($extension){
  $allowed_extensions = array("jpg","jpeg","png","pdf","docx");
  if(in_array(strtolower($extension), $allowed_extensions)) {
    return true;
  }
  return false;
}

function uploadImage($location){
  $extension = strtolower(pathinfo($location,PATHINFO_EXTENSION));
  if(validateImageExtension($extension)){
    if(move_uploaded_file($_FILES['file']['tmp_name'],$location)){
      return 200;
    }
    return 5000;
  }
  return 5001;
}

function modifyImageName($customName){
  $name = explode('.', $_FILES['file']['name']);
  return $customName . (count($name) > 1 ? '.' . $name[1] : '');
}

function generateRandomImageName(){
  $name = explode('.', $_FILES['file']['name']);
  return $name[0]. rand(0,1000000000) . (count($name) > 1 ? '.' . $name[1] : '');
}

function retrieveRating($connectDB, $answerID){
  $sql = "SELECT * FROM rating WHERE answer_id = '$answerID'";
  $result = $connectDB->query($sql);
  $ratings = Array();
  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      $rating = new Rating();
      $rating->set_ratingID($row["rating_id"]);
      $rating->set_answerID($row["answer_id"]);
      $rating->set_studentID($row["rated_by"]);
      $rating->set_rating($row["rating"]);
      array_push($ratings, $rating);
    }
  }
  return $ratings;
}

function retrieveAnswerTotalRating($connectDB, $answerID){
  $sql = "SELECT * FROM rating WHERE answer_id = '$answerID'";
  $result = $connectDB->query($sql);
  return $result->num_rows;
}

function setRating($answerID, $ratingID, $rating, $accountID){
  $connectDB = databaseConnection();
  if($ratingID != 'undefined'){
    updateRating($connectDB, $ratingID, $rating);
  } else {
    addRating($connectDB, $answerID, $rating, $accountID);
  }
  $connectDB->close();
}

function addRating($connectDB, $answerID, $rating, $accountID){
  $userID = $_SESSION['user_id'];
  $status = 1;

  if(isSpecialAccount($accountID)){
    $status = 0;
  }

  $sql = "INSERT INTO `rating`(`answer_id`, `student_id`, `rating`, `rated_by`, `student_flag`) 
  VALUES ('$answerID','$accountID', '$rating','$userID', '$status')";
  if (mysqli_query($connectDB, $sql)) {
    echo json_encode(array("statusCode"=>200, "ratingID"=>mysqli_insert_id($connectDB)));
	} else {
		echo json_encode(array("statusCode"=>201));
	}
}

function updateRating($connectDB, $ratingID, $rating){
  $sql = "UPDATE `rating` SET `rating`='$rating' WHERE rating_id=$ratingID";
	if (mysqli_query($connectDB, $sql)) {
		echo json_encode(array("statusCode"=>200, "ratingID"=>$ratingID));
	} else {
		echo json_encode(array("statusCode"=>201));
	}
}

function getRatingID($connectDB, $answerID, $rating){
  $userID = $_SESSION['user_id'];
  $sql = "SELECT rating_id FROM rating WHERE answer_id = '$answerID' AND student_id = '$userID' AND rating = '$rating'";
  $result = $connectDB->query($sql);
  $ratingID = "";
  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      $ratingID = $row['rating_id'];
    }
  }
  return $ratingID;
}

function updateAdminRecord(){
  $adminID = $_POST['adminID'];
  $userName = $_POST['userName'];
  $name = $_POST['name'];
  $email = $_POST['email'];
  $statusCode = array();

  $adminSQL = "UPDATE `admin_information` SET `name`='$name' WHERE admin_id=$adminID";

  if($_FILES != null){
    $target_dir = "./../resource/profile/";
    $fileName = modifyImageName($adminID);
    $location = $target_dir . $fileName;
    $uploadStatus = uploadImage($location);
    if($uploadStatus == 200) {
      $adminSQL = "UPDATE `admin_information` SET `picture`='$fileName', `name`='$name' WHERE admin_id=$adminID";
    } 
    array_push($statusCode, $uploadStatus); 
  }

  $duplicateStatusCode = isEmailOrUsernameExisting($adminID, $userName, $email);
  if(in_array(200, $duplicateStatusCode)){
    $connectDB = databaseConnection();
    $accountSQL = "UPDATE `account_information` SET `user_name`='$userName', `email`='$email' WHERE user_id=$adminID";
    
    if (mysqli_query($connectDB, $accountSQL)) {
      if (mysqli_query($connectDB, $adminSQL)) {
        $status = 200;
        array_push($statusCode, 200);
      } else {
        array_push($statusCode, 5002);
      }
    } else {
      array_push($statusCode, 201);
    }

    mysqli_close($connectDB); 
  } else {
    foreach ($duplicateStatusCode as $code) {
      array_push($statusCode, $code);
    }

  }
  echo json_encode(array("statusCode"=>$statusCode));
  exit;
}

function updateStudentRecord(){
  $studentID = $_POST['studentID'];
  $userName = $_POST['userName'];
  $name = $_POST['name'];
  $email = $_POST['email'];
  $specialization = $_POST['specialization'];
  $yearLevel = $_POST['yearLevel'];
  $statusCode = array();

  $studentSQL = "UPDATE `student_information` 
  SET `name`='$name', `specialization`='$specialization', `year_level`='$yearLevel' 
  WHERE student_id=$studentID";

  if($_FILES != null){
    $target_dir = "./../resource/profile/";
    $fileName = modifyImageName($studentID);
    $location = $target_dir . $fileName;
    $uploadStatus = uploadImage($location);
    if($uploadStatus == 200) {
      $studentSQL = "UPDATE `student_information` 
      SET `picture`='$fileName', `name`='$name', `specialization`='$specialization', `year_level`='$yearLevel' 
      WHERE student_id=$studentID";
      $_SESSION['profile'] = $fileName;
    } 
    array_push($statusCode, $uploadStatus); 
  }

  $duplicateStatusCode = isEmailOrUsernameExisting($studentID, $userName, $email);
  if(in_array(200, $duplicateStatusCode)){
    $connectDB = databaseConnection();
    $accountSQL = "UPDATE `account_information` SET `user_name`='$userName', `email`='$email' WHERE user_id=$studentID";
    
    if (mysqli_query($connectDB, $accountSQL)) {
      if (mysqli_query($connectDB, $studentSQL)) {
        $status = 200;
        array_push($statusCode, 200);
      } else {
        array_push($statusCode, 5002);
      }
    } else {
      array_push($statusCode, 201);
    }

    mysqli_close($connectDB); 
  } else {
    foreach ($duplicateStatusCode as $code) {
      array_push($statusCode, $code);
    }

  }
  echo json_encode(array("statusCode"=>$statusCode));
  exit;
}

function updateSpecialAccountRecord(){
  $studentID = $_POST['studentID'];
  $userName = $_POST['userName'];
  $name = $_POST['name'];
  $email = $_POST['email'];
  $specialization = $_POST['specialization'];
  $statusCode = array();

  $studentSQL = "UPDATE `special_account_information` SET `name`='$name', `job`='$specialization' WHERE account_id=$studentID";

  if($_FILES != null){
    $target_dir = "./../resource/profile/";
    $fileName = modifyImageName($studentID);
    $location = $target_dir . $fileName;
    $uploadStatus = uploadImage($location);
    if($uploadStatus == 200) {
      $studentSQL = "UPDATE `special_account_information` 
      SET `picture`='$fileName', `name`='$name', `job`='$specialization' 
      WHERE account_id=$studentID";
      $_SESSION['profile'] = $fileName;
    } 
    array_push($statusCode, $uploadStatus); 
  }

  $duplicateStatusCode = isEmailOrUsernameExisting($studentID, $userName, $email);
  if(in_array(200, $duplicateStatusCode)){
    $connectDB = databaseConnection();
    $accountSQL = "UPDATE `account_information` 
    SET `user_name`='$userName', `email`='$email' 
    WHERE user_id=$studentID";
    
    if (mysqli_query($connectDB, $accountSQL)) {
      if (mysqli_query($connectDB, $studentSQL)) {
        $status = 200;
        array_push($statusCode, 200);
      } else {
        array_push($statusCode, 5002);
      }
    } else {
      array_push($statusCode, 201);
    }

    mysqli_close($connectDB); 
  } else {
    foreach ($duplicateStatusCode as $code) {
      array_push($statusCode, $code);
    }

  }
  echo json_encode(array("statusCode"=>$statusCode));
  exit;
}

function uploadForumImage(){
  if($_FILES != null){
    $target_dir = "./../resource/forum/";
    $fileName = generateRandomImageName();
    $location = $target_dir . $fileName;
    $uploadStatus = uploadImage($location);
    if($uploadStatus == 200) {
      echo json_encode(array("url"=>"./.".$location));
    } else {
      echo json_encode(array("error"=>"Unable to upload image, please try again later!"));
    }
  } else {
    echo json_encode(array("error"=>"Unable to upload image, please try again later!"));
  }
  exit;
}

function report(){
  $connectDB = databaseConnection();
  $detail=$_POST['detail'];
  $id=$_POST['id'];
  //1 = Question, 2 = Answer, 3 = reply
  $type=$_POST['type'];
  $userID=$_SESSION['user_id'];

  $statusCode = array();  
  $sql = "INSERT INTO `report`(`student_id`, `reported_id`, `detail`,`status`,`type`) 
  VALUES ('$userID','$id','$detail','1','$type')";
  if (mysqli_query($connectDB, $sql)) {
    array_push($statusCode, 200);
  } else {
    array_push($statusCode, 201);
  }
  echo json_encode(array("statusCode"=>$statusCode));
  $connectDB->close();
}

function sendNotification($connectDB, $creatorID, $questionID, $id, $type){
  $userID = $_SESSION['user_id'];
  $sql = "INSERT INTO `notification`(`student_id`, `question_id`, `id`, `type`, `status`) 
  VALUES ('$creatorID','$questionID' ,'$id', '$type', '0')";
  if (mysqli_query($connectDB, $sql)) {
    return 200;
	} else {
    return 201;
	}
}

function retrieveNotification(){
  $connectDB = databaseConnection();
  $userID = $_SESSION['user_id'];
  $sql = "SELECT * FROM notification where student_id='$userID' ORDER BY creation_datetime DESC";
  $result = $connectDB->query($sql);
  $notificationList = array(); 
  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      $notification = new Notification();
      $notification->set_notificationID($row["notification_id"]);
      $notification->set_questionID($row["question_id"]);
      $notification->set_creationDateTime($row["creation_datetime"]);
      $notification->set_type($row['type']);
      $notification->set_status($row['status']);
      $id = $row['id'];
      $type = $row['type'];
      if($type == 1){
        $notification->set_detail(retrieveAnswerDetail($connectDB, $id));
      } else if($type == 2){
        $notification->set_detail(retrieveReplyDetail($connectDB, $id));
      }
      array_push($notificationList, $notification);
    }
  }
  echo json_encode(array("statusCode"=>200, "notificationList"=>$notificationList));
  $connectDB->close();
}

function retrieveNotificationCount(){
  $connectDB = databaseConnection();
  $userID = $_SESSION['user_id'];
  $sql = "SELECT * FROM notification where student_id='$userID' AND status='0'";
  $result = $connectDB->query($sql);
  echo json_encode(array("statusCode"=>200, "notificationCount"=>$result->num_rows));
  $connectDB->close();
}

function updateNotification(){
  $notificationID=$_POST['id'];
  $status=$_POST['status'];
  $connectDB = databaseConnection();
	$sql = "UPDATE `notification` SET `status`='$status' WHERE notification_id=$notificationID";
	if (mysqli_query($connectDB, $sql)) {
		echo json_encode(array("statusCode"=>200));
	} else {
		echo json_encode(array("statusCode"=>201));
	}
	mysqli_close($connectDB);
}

function retrieveAnswerDetail($connectDB, $id){
  $sql = "SELECT * FROM answer where answer_id='$id'";
  $result = $connectDB->query($sql);
  $answer = new Answer();
  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $answer->set_name(retrieveUsername($connectDB, $row['student_id']));
    $answer->set_answer($row['answer']);
    $answer->set_studentID($row['student_id']);

    if($_SESSION['user_id'] != $row['student_id']){
      return $answer;
    }
  }
  return null;
}

function retrieveReplyDetail($connectDB, $id){
  $sql = "SELECT * FROM reply where reply_id='$id'";
  $result = $connectDB->query($sql);
  $reply = new Answer();
  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $reply->set_name(retrieveUsername($connectDB, $row['student_id']));
    $reply->set_answer($row['reply']);
    $reply->set_studentID($row['student_id']);

    if($_SESSION['user_id'] != $row['student_id']){
      return $reply;
    }
  }
  return null;
}

function uploadAttachment($path){
  $statusCode = "201";
  $fileName = "";
  if($_FILES != null){
    // $target_dir = "./../resource/profile/";
    if (!is_dir($path)) {
      mkdir($path, 0755, true);
    }
    $fileName = generateRandomImageName();
    $location = $path . $fileName;
    $uploadStatus = uploadImage($location);
    if($uploadStatus == 200) {
      $statusCode = "200";
      $_SESSION['uploadedCOR'] = $fileName;
    }
  }
  echo json_encode(array("statusCode"=>$statusCode));
  exit;
}

function retrieveReportedQuestionList(){
  $connectDB = databaseConnection();
  $sql = "SELECT 
  report.*, 

  question_information.question_id, 
  question_information.student_id AS question_student_id, 
  question_information.creation_datetime, 
  question_information.title,
  question_information.description,
  question_information.subject_id,
  question_information.status AS question_status,

  subject.subject,

  reporter_account_information.user_name AS reporter_account_user_name,
  reporter_account_information.email AS reporter_account_email,
  reporter_account_information.status AS reporter_account_status,

  question_account_information.user_name AS question_account_user_name,
  question_account_information.email AS question_account_email,
  question_account_information.status AS question_account_status,

  reporter_student.student_id AS reporter_student_student_id,
  reporter_student.name AS reporter_student_name,
  reporter_student.year_level AS reporter_student_year_level,
  reporter_student.specialization AS reporter_student_specialization,
  reporter_student.picture AS reporter_student_picture,

  reporter_special_account.account_id AS reporter_special_id,
  reporter_special_account.name AS reporter_special_name,
  reporter_special_account.job AS reporter_special_job,
  reporter_special_account.picture AS reporter_special_picture,

  question_student.student_id AS question_student_student_id,
  question_student.name AS question_student_name,
  question_student.year_level AS question_student_year_level,
  question_student.specialization AS question_student_specialization,
  question_student.picture AS question_student_picture,

  special_account.account_id AS special_id,
  special_account.name AS special_name,
  special_account.job AS special_job,
  special_account.picture AS special_picture

  FROM `report` 
  LEFT JOIN question_information ON report.reported_id=question_information.question_id
  LEFT JOIN account_information AS reporter_account_information ON reporter_account_information.user_id=report.student_id
  LEFT JOIN account_information AS question_account_information ON question_account_information.user_id=question_information.student_id
  LEFT JOIN student_information AS reporter_student ON reporter_student.student_id=report.student_id
  LEFT JOIN special_account_information AS reporter_special_account ON reporter_special_account.account_id=report.student_id
  LEFT JOIN student_information AS question_student ON question_student.student_id=question_information.student_id
  LEFT JOIN special_account_information AS special_account ON special_account.account_id=question_information.student_id
  LEFT JOIN subject ON question_information.subject_id=subject.subject_id
  WHERE report.type=1 and report.status=1 and question_information.status > 0";

  $result = $connectDB->query($sql);
  if ($result->num_rows > 0) {
    $reportedList = array(); 
    while($row = $result->fetch_assoc()) {
      $reported = new Reported();
      $reported->set_reportedID($row["id"]);
      $reported->set_dateTime($row["date_time"]);
      $reported->set_reason($row["detail"]);
      
      $question = new Question();
      $question->set_questionID($row["question_id"]);
      $question->set_creationDateTime($row["creation_datetime"]);
      $question->set_title($row["title"]);
      $question->set_description($row["description"]);
      $question->set_subject($row["subject"]);
      $question->set_status($row["question_status"]);
      $question->set_userName($row["question_account_user_name"]);
      $question->set_email($row["question_account_email"]);

      if(isSpecialAccount($row["question_student_id"])){
        $question->set_studentID($row["special_id"]);
        $question->set_name($row["special_name"]);
        $question->set_specialization($row["special_job"]);
        $question->set_picture($row["special_picture"]);  
      } else {
        $question->set_studentID($row["question_student_student_id"]);
        $question->set_name($row["question_student_name"]);
        $question->set_yearLevel($row["question_student_year_level"]);
        $question->set_specialization($row["question_student_specialization"]);
        $question->set_picture($row["question_student_picture"]);  
      }

      $reported->set_questionInformation($question);

      $reporter = new Student();
      $reporter->set_email($row["reporter_account_email"]);
      $reporter->set_username($row["reporter_account_user_name"]);
      $reporter->set_status($row["reporter_account_status"]);
      
      if(isSpecialAccount($row["student_id"])){
        $reporter->set_studentID($row["reporter_special_id"]);
        $reporter->set_name($row["reporter_special_name"]);
        $reporter->set_specialization($row["reporter_special_job"]);
        $reporter->set_picture($row["reporter_special_picture"]);
      } else {
        $reporter->set_studentID($row["reporter_student_student_id"]);
        $reporter->set_name($row["reporter_student_name"]);
        $reporter->set_yearLevel($row["reporter_student_year_level"]);
        $reporter->set_specialization($row["reporter_student_specialization"]);
        $reporter->set_picture($row["reporter_student_picture"]);  
      }
      
      $reported->set_reporterInformation($reporter);

      array_push($reportedList, $reported);
    }
    echo json_encode($reportedList);
  } else {
    echo json_encode(array("statusCode"=>201));
  }
  $connectDB->close();
}

function retrieveReportedAnswerList(){
  $connectDB = databaseConnection();
  $sql = "SELECT 
  report.*,
  answer.question_id,
  answer.student_id AS answer_student_id, 
  answer.answer_id, 
  answer.creation_datetime, 
  answer.answer,
  answer.status AS answer_status,
  
  reporter_account_student.user_name AS reporter_student_user_name,
  reporter_account_student.email AS reporter_student_email,
  reporter_account_student.status AS reporter_student_status,

  answer_account_student.user_name AS answer_student_user_name,
  answer_account_student.email AS answer_student_email,
  
  reporter_student.student_id AS reporter_student_student_id,
  reporter_student.name AS reporter_student_name,
  reporter_student.year_level AS reporter_student_year_level,
  reporter_student.specialization AS reporter_student_specialization,
  reporter_student.picture AS reporter_student_picture,

  reporter_special_account.account_id AS reporter_special_account_id,
  reporter_special_account.name AS reporter_special_name,
  reporter_special_account.job AS reporter_special_job,
  reporter_special_account.picture AS reporter_special_picture,
  
  answer_student.student_id AS answer_student_student_id,
  answer_student.name AS answer_student_name,
  answer_student.year_level AS answer_student_year_level,
  answer_student.specialization AS answer_student_specialization,
  answer_student.picture AS answer_student_picture,

  answer_special_account.account_id AS answer_special_account_id,
  answer_special_account.name AS answer_special_name,
  answer_special_account.job AS answer_special_job,
  answer_special_account.picture AS answer_special_picture
  
  FROM `report` 
  LEFT JOIN answer ON report.reported_id=answer.answer_id
  LEFT JOIN account_information AS reporter_account_student ON reporter_account_student.user_id=report.student_id
  LEFT JOIN account_information AS answer_account_student ON answer_account_student.user_id=report.student_id

  LEFT JOIN student_information AS reporter_student ON reporter_student.student_id=report.student_id
  LEFT JOIN special_account_information AS reporter_special_account ON reporter_special_account.account_id=report.student_id
  
  LEFT JOIN student_information AS answer_student ON answer_student.student_id=answer.student_id
  LEFT JOIN special_account_information AS answer_special_account ON answer_special_account.account_id=answer.student_id
  WHERE report.type=2 and report.status=1 and answer.status>0";
  $result = $connectDB->query($sql);
  if ($result->num_rows > 0) {
    $reportedList = array(); 
    while($row = $result->fetch_assoc()) {
      $reported = new Reported();
      $reported->set_reportedID($row["id"]);
      $reported->set_dateTime($row["date_time"]);
      $reported->set_reason($row["detail"]);
      
      $answer = new Answer();
      $answer->set_questionID($row["question_id"]);
      $answer->set_answerID($row["answer_id"]);
      $answer->set_creationDateTime($row["creation_datetime"]);
      $answer->set_answer($row["answer"]);
      $answer->set_status($row["answer_status"]);

      $reportedStudent = new Student();
      $reportedStudent->set_userName($row["answer_student_user_name"]);
      $reportedStudent->set_email($row["answer_student_email"]);
      
      if(isSpecialAccount($row["answer_student_id"])){
        $reportedStudent->set_studentID($row["answer_special_account_id"]);
        $reportedStudent->set_name($row["answer_special_name"]);
        $reportedStudent->set_specialization($row["answer_special_job"]);
        $reportedStudent->set_picture($row["answer_special_picture"]);
      } else {
        $reportedStudent->set_studentID($row["answer_student_student_id"]);
        $reportedStudent->set_name($row["answer_student_name"]);
        $reportedStudent->set_yearLevel($row["answer_student_year_level"]);
        $reportedStudent->set_specialization($row["answer_student_specialization"]);
        $reportedStudent->set_picture($row["answer_student_picture"]);
      }

      $answer->set_studentInformation($reportedStudent);

      $reported->set_answerInformation($answer);

      $reporter = new Student();
      $reporter->set_email($row["reporter_student_email"]);
      $reporter->set_username($row["reporter_student_user_name"]);
      $reporter->set_status($row["reporter_student_status"]);

      if(isSpecialAccount($row["student_id"])){
        $reporter->set_studentID($row["reporter_special_account_id"]);
        $reporter->set_name($row["reporter_special_name"]);
        $reporter->set_specialization($row["reporter_special_job"]);
        $reporter->set_picture($row["reporter_special_picture"]);
      } else {
        $reporter->set_studentID($row["reporter_student_student_id"]);
        $reporter->set_name($row["reporter_student_name"]);
        $reporter->set_yearLevel($row["reporter_student_year_level"]);
        $reporter->set_specialization($row["reporter_student_specialization"]);
        $reporter->set_picture($row["reporter_student_picture"]);         
      }

      $reported->set_reporterInformation($reporter);

      array_push($reportedList, $reported);
    }
    echo json_encode($reportedList);
  } else {
    echo json_encode(array("statusCode"=>201));
  }
  $connectDB->close();
}

function retrieveReportedReplyList(){
  $connectDB = databaseConnection();
  $sql = "SELECT 
  report.*,

  reply.answer_id,
  reply.student_id AS reply_student_id, 
  reply.reply_id, 
  reply.creation_datetime, 
  reply.reply,
  reply.status AS reply_status,
  
  reporter_account_student.user_name AS reporter_student_user_name,
  reporter_account_student.email AS reporter_student_email,
  reporter_account_student.status AS reporter_student_status,

  reply_account_student.user_name AS reply_student_user_name,
  reply_account_student.email AS reply_student_email,
  
  reporter_student.student_id AS reporter_student_student_id,
  reporter_student.name AS reporter_student_name,
  reporter_student.year_level AS reporter_student_year_level,
  reporter_student.specialization AS reporter_student_specialization,
  reporter_student.picture AS reporter_student_picture,

  reporter_special_account.account_id AS reporter_special_account_id,
  reporter_special_account.name AS reporter_special_name,
  reporter_special_account.job AS reporter_special_job,
  reporter_special_account.picture AS reporter_special_picture,
  
  reply_student.student_id AS reply_student_student_id,
  reply_student.name AS reply_student_name,
  reply_student.year_level AS reply_student_year_level,
  reply_student.specialization AS reply_student_specialization,
  reply_student.picture AS reply_student_picture,
  
  reply_special_account.account_id AS reply_special_account_id,
  reply_special_account.name AS reply_special_name,
  reply_special_account.job AS reply_special_job,
  reply_special_account.picture AS reply_special_picture

  FROM `report` 
  LEFT JOIN reply ON report.reported_id=reply.reply_id
  LEFT JOIN account_information AS reporter_account_student ON reporter_account_student.user_id=report.student_id
  LEFT JOIN account_information AS reply_account_student ON reply_account_student.user_id=report.student_id

  LEFT JOIN student_information AS reporter_student ON reporter_student.student_id=report.student_id
  LEFT JOIN special_account_information AS reporter_special_account ON reporter_special_account.account_id=report.student_id

  LEFT JOIN student_information AS reply_student ON reply_student.student_id=reply.student_id
  LEFT JOIN special_account_information AS reply_special_account ON reply_special_account.account_id=reply.student_id
  

  WHERE report.type=3 and report.status=1 and reply.status>0";
  $result = $connectDB->query($sql);
  if ($result->num_rows > 0) {
    $reportedList = array(); 
    while($row = $result->fetch_assoc()) {
      $reported = new Reported();
      $reported->set_reportedID($row["id"]);
      $reported->set_dateTime($row["date_time"]);
      $reported->set_reason($row["detail"]);
      
      $reply = new Reply();
      $reply->set_answerID($row["answer_id"]);
      $reply->set_replyID($row["reply_id"]);
      $reply->set_creationDateTime($row["creation_datetime"]);
      $reply->set_answer($row["reply"]);
      $reply->set_status($row["reply_status"]);

      $reportedStudent = new Student();
      $reportedStudent->set_userName($row["reply_student_user_name"]);
      $reportedStudent->set_email($row["reply_student_email"]);


      if(isSpecialAccount($row["reply_student_id"])){
        $reportedStudent->set_studentID($row["reply_special_account_id"]);
        $reportedStudent->set_name($row["reply_special_name"]);
        $reportedStudent->set_specialization($row["reply_special_job"]);
        $reportedStudent->set_picture($row["reply_special_picture"]);
      } else {
        $reportedStudent->set_studentID($row["reply_student_student_id"]);
        $reportedStudent->set_name($row["reply_student_name"]);
        $reportedStudent->set_yearLevel($row["reply_student_year_level"]);
        $reportedStudent->set_specialization($row["reply_student_specialization"]);
        $reportedStudent->set_picture($row["reply_student_picture"]);
      }

      $reply->set_studentInformation($reportedStudent);

      $reported->set_replyInformation($reply);

      $reporter = new Student();
      $reporter->set_email($row["reporter_student_email"]);
      $reporter->set_username($row["reporter_student_user_name"]);
      $reporter->set_status($row["reporter_student_status"]);

      if(isSpecialAccount($row["student_id"])){
        $reporter->set_studentID($row["reporter_special_account_id"]);
        $reporter->set_name($row["reporter_special_name"]);
        $reporter->set_specialization($row["reporter_special_job"]);
        $reporter->set_picture($row["reporter_special_picture"]);  
      } else {
        $reporter->set_studentID($row["reporter_student_student_id"]);
        $reporter->set_name($row["reporter_student_name"]);
        $reporter->set_yearLevel($row["reporter_student_year_level"]);
        $reporter->set_specialization($row["reporter_student_specialization"]);
        $reporter->set_picture($row["reporter_student_picture"]);  
      }

      $reported->set_reporterInformation($reporter);

      array_push($reportedList, $reported);
    }
    echo json_encode($reportedList);
  } else {
    echo json_encode(array("statusCode"=>201));
  }
  $connectDB->close();
}



//Question -> Report -> 2
function updateReportStatus(){
  $reportID = $_POST["reportID"];
  $reportedID = $_POST["reportedID"];
  $type = $_POST["type"];
  $status = $_POST["status"];
  $responseStatus;
  $connectDB = databaseConnection();
  $sql = "UPDATE `report` SET `status`='$status' WHERE id=$reportID";
  if (mysqli_query($connectDB, $sql)) {
    $responseStatus = 200;
  } else {
    $responseStatus = 201;
  }
  $connectDB->close();

  if($type == 1 AND $status == 3){
    if(updateQuestionStatus($reportedID,-1)){
      $responseStatus = 200;
    } else {
      $responseStatus = 201;
    }
  }
  echo json_encode(array("statusCode"=>$responseStatus));
}

if($_POST['action']=='upload-attachment'){
  uploadAttachment($_POST['path']);
  exit;
}


if($_POST['action']=='login'){
  login($_POST['email'], md5($_POST['password']));
  exit;
}

if($_POST['action']=='guest-login'){
  guestLogin();
  exit;
}

if($_POST['action']=='create-account'){
  createAccount();
  exit;
}

if($_POST['action']=='create-special-account'){
  createSpecialAccount();
  exit;
}

if($_POST['action']=='create-admin-account'){
  createAdminAccount();
  exit;
}

if($_POST['action']=='create-new-subject'){
  createNewSubject();
  exit;
}

if($_POST['action']=='update-subject'){
  updateSubject();
  exit;
}

if($_POST['action']=='forgot-password'){
  forgotPassword($_POST['email']);
  exit;
}

if($_POST['action']=='retrieve-student-account-request'){
  retrieveStudentList(0);
  exit;
}

if($_POST['action']=='retrieve-student-list'){
  retrieveStudentList(1);
  exit;
}

if($_POST['action']=='retrieve-special-account-list'){
  retrieveSpecialAccountList(1);
  exit;
}

if($_POST['action']=='retrieve-special-account-request'){
  retrieveSpecialAccountList(0);
  exit;
}

if($_POST['action']=='retrieve-admin-list'){
  retrieveAdminList(1);
  exit;
}

if($_POST['action']=='retrieve-admin-inactive-list'){
  retrieveAdminList(0);
  exit;
}

if($_POST['action']=='retrieve-subject-list'){
  retrieveAllSubject();
  exit;
}

if($_POST['action']=='retrieve-active-subject-list'){
  retrieveSubjectList(1);
  exit;
}

if($_POST['action']=='retrieve-question-list'){
  retrieveQuestionList();
  exit;
}

if($_POST['action']=='retrieve-latest-question-list'){
  retrieveLatestQuestionList($_POST['subject'], $_POST['status'], $_POST['limit'], $_POST['search']);
  exit;
}

if($_POST['action']=='retrieve-question-detail'){
  retrieveQuestionDetail($_POST['questionID']);
  exit;
}

if($_POST['action'] == 'retrieve-user-profile'){
  retrieveUserProfile();
  exit;
}

if($_POST['action']=='retrieve-answer-list'){
  retrieveAnswerList(1);
  exit;
}

if($_POST['action']=='retrieve-admin-detail'){
  retrieveAdminDetail($_SESSION['user_id']);
  exit;
}

if($_POST['action']=='retrieve-account-detail'){
  retrieveAccountInfo($_SESSION['user_id']);
  exit;
}

if($_POST['action']=='update-account-status'){
  updateAccountStatus($_POST['userID'],$_POST['status']);
  exit;
}

if($_POST['action']=='change-password'){
  changePassword($_POST['userID'],md5($_POST['password']));
  exit;
}

if($_POST['action']=='update-admin-record'){
  updateAdminRecord();
  exit;
}

if($_POST['action']=='update-student-record'){
  updateStudentRecord();
  exit;
}

if($_POST['action']=='update-special-account-record'){
  updateSpecialAccountRecord();
  exit;
}

if($_POST['action']=='change-new-password'){
  changeNewPassword($_POST['userID'],md5($_POST['currentPassword']), md5($_POST['newPassword']));
  exit;
}

if($_POST['action']=='save-question'){
  saveQuestion();
  exit;
}

if($_POST['action']=='update-question'){
  updateQuestion();
  exit;
}

if($_POST['action']=='update-answer'){
  updateAnswer();
  exit;
}

if($_POST['action']=='update-reply'){
  updateReply();
  exit;
}

if($_POST['action']=='retrieve-ranking-list'){
  retrieveRankingList($_POST['limit'], $_POST['filter']);
  exit;
}

if($_POST['action']=='save-answer'){
  saveAnswer($_POST['questionID'], $_POST['answer']);
  exit;
}

if($_POST['action'] == 'retrieve-answers'){
  retrieveAnswers($_POST['questionID']);
  exit;
}

if($_POST['action'] == 'retrieve-question'){
  retrieveQuestion($_POST['questionID']);
  exit;
}

if($_POST['action'] == "save-reply"){
  saveReply($_POST['answerID'], $_POST['response']);
  exit;
}

if($_POST['action'] == "set-rating"){
  setRating($_POST['answerID'], $_POST['ratingID'], $_POST['rating'], $_POST['accountID']);
  exit;
}

if($_POST['action'] == "retrieve-faq"){
  retrieveFAQ();
  exit;
}

if($_POST['action'] == "search-faq"){
  searchFAQ($_POST['search']);
  exit;
}

if($_POST['action'] == "upload-forum-image"){
  uploadForumImage();
  exit;
}

if($_POST['action'] == "delete-question"){
  if (updateQuestionStatus($_POST['questionID'], $_POST['status'])) {
		echo json_encode(array("statusCode"=>200));
	} else {
		echo json_encode(array("statusCode"=>201));
	}
  exit;
}

if($_POST['action'] == "delete-answer"){
  updateAnswerStatus();
  exit;
}

if($_POST['action'] == "delete-reply"){
  updateReplyStatus();
  exit;
}

if($_POST['action'] == "report"){
  report();
  exit;
}

if($_POST['action'] == "retrieve-activities"){
  retrieveActivities();
  exit;
}

if($_POST['action'] == "retrieve-notification"){
  retrieveNotification();
  exit;
}

if($_POST['action'] == "update-notification"){
  updateNotification();
  exit;
}

if($_POST['action'] == "retrieve-reported-question-list"){
  retrieveReportedQuestionList();
  exit;
}

if($_POST['action'] == "retrieve-reported-answer-list"){
  retrieveReportedAnswerList();
  exit;
}

if($_POST['action'] == "retrieve-reported-reply-list"){
  retrieveReportedReplyList();
  exit;
}

if($_POST['action'] == "update-report-status"){
  updateReportStatus();
  exit;
}

if($_POST['action'] == "retrieve-notification-count"){
  retrieveNotificationCount();
  exit;
}

if($_POST['action'] == "validate-student-email"){
  validateStudentEmail();
  exit;
}

if($_POST['action'] == "validate-otp"){
  validateOTP();
  exit;
}

if($_POST['action']=='get-dashboard-data'){
  // retrieveActiveUser();
  $numberOfStudent = retrieveStudentNumber(1);
  $numberOfStudentRequest = retrieveStudentNumber(0);
  $numberOfQuestion = retrieveQuestionNumber(null, null);
  $numberOfAnsweredQuestion = retrieveQuestionNumber(2, null);
  $numberOfUnansweredQuestion = retrieveQuestionNumber(1, null);
  $numberOfAnswer = retrieveAnswerNumber();

  $firstYear = retrieveStudentYearLevel(1);
  $secondYear = retrieveStudentYearLevel(2);
  $thirdYear = retrieveStudentYearLevel(3);
  $fourthYear = retrieveStudentYearLevel(4);
  echo json_encode(array(
    "student"=>array("active"=>$numberOfStudent, "pending"=>$numberOfStudentRequest, "firstYear"=>$firstYear, "secondYear"=>$secondYear,"thirdYear"=>$thirdYear,"fourthYear"=>$fourthYear),
    "forum"=>array("question"=>$numberOfQuestion, "answer"=>$numberOfAnswer, "answered"=>$numberOfAnsweredQuestion, "unanswered"=>$numberOfUnansweredQuestion)));
  exit;
}

if($_POST['action']=='get-subject-dashboard'){
  $subjectID = $_POST["subjectID"];
  $numberOfAnsweredQuestion = retrieveQuestionNumber(2, $subjectID);
  $numberOfUnansweredQuestion = retrieveQuestionNumber(1, $subjectID);
  echo json_encode(array("answered"=>$numberOfAnsweredQuestion, "unanswered"=>$numberOfUnansweredQuestion));
  exit;
}

if($_POST['action']=='get-subject-per-year-level'){
  $subjectID = $_POST["subjectID"];
  $firstYear = retrieveQuestionNumberPerYearLevel($subjectID, "1");
  $secondYear = retrieveQuestionNumberPerYearLevel($subjectID, "2");
  $thirdYear = retrieveQuestionNumberPerYearLevel($subjectID, "3");
  $fourthYear = retrieveQuestionNumberPerYearLevel($subjectID, "4");
  echo json_encode(array("firstYear"=>$firstYear, "secondYear"=>$secondYear , "thirdYear"=>$thirdYear , "fourthYear"=>$fourthYear));
  exit;
}

function isStudentDataExist($connectDB, $studentID){
  $sql = "SELECT * FROM student_information 
  where student_id='$studentID' ";
  $result = $connectDB->query($sql);
  if ($result->num_rows > 0) {
    return true;
  } 
  return false;
}

if($_POST['action'] == 'import-excel-file'){
  $file = $_FILES['excel_file']['tmp_name'];
  $spreadsheet = IOFactory::load($file);
  $worksheet = $spreadsheet->getActiveSheet();
  $highestRow = $worksheet->getHighestRow();
  $hasError = false;
  $connectDB = databaseConnection();
  for ($row = 2; $row <= $highestRow; $row++) {
    $lastName = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
    $firstName = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
    $middleName = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
    $name = $lastName . ", ". $firstName . " " . $middleName;
    $studentID = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
    $email = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
    $specialization = $worksheet->getCellByColumnAndRow(6, $row)->getValue();
    $yearLevel = $worksheet->getCellByColumnAndRow(7, $row)->getValue();
    
    $sql ="";
    if(isStudentDataExist($connectDB, $studentID)){
      $sql = "UPDATE `student_information` SET 
      `email` = '$email', 
      `name` = '$name', 
      `year_level` = '$yearLevel', 
      `specialization` = '$specialization'
      WHERE `student_id` = '$studentID'";
    } else {
      $sql = "INSERT INTO `student_information` 
      (`student_id`, `email`, `name`, `year_level`, `specialization`) VALUES 
      ('$studentID', '$email', '$name', '$yearLevel', '$specialization')"; 
    }

    if (mysqli_query($connectDB, $sql)) {
    } else {
      $hasError = false;
    }
  }
  echo json_encode(array("statusCode"=>200, "hasError"=>$hasError));
}



?>