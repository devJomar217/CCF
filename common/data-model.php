<?php

class Account {
  public $userID;
  public $userName;
  public $email;
  public $userType;
  public $status;
  public $studentInfo;
  public $adminInfo;
  public $specialAccountInfo;

  function set_userID($userID) {
    $this->userID = $userID;
  }
  function get_userID() {
    return $this->userID;
  }

  function set_userName($userName) {
    $this->userName = $userName;
  }
  function get_userName() {
    return $this->userName;
  }
  
  function set_email($email) {
    $this->email = $email;
  }
  function get_email() {
    return $this->email;
  }

  function set_userType($userType) {
    $this->userType = $userType;
  }
  function get_userType() {
    return $this->userType;
  }

  function set_status($status) {
    $this->status = $status;
  }
  function get_status() {
    return $this->status;
  }

  function set_studentInfo($studentInfo) {
    $this->studentInfo = $studentInfo;
  }
  function get_studentInfo() {
    return $this->studentInfo;
  }

  function set_adminInfo($adminInfo) {
    $this->adminInfo = $adminInfo;
  }
  function get_adminInfo() {
    return $this->adminInfo;
  }

  function set_specialAccountInfo($specialAccountInfo) {
    $this->specialAccountInfo = $specialAccountInfo;
  }
  function get_specialAccountInfo() {
    return $this->specialAccountInfo;
  }

}

class Student {
  public $studentID;
  public $name;
  public $yearLevel;
  public $specialization;
  public $email;
  public $username;
  public $picture;
  public $status;
  public $ranking;
  public $rating;
  public $creationType;
  public $attachment;

  function set_studentID($studentID) {
    $this->studentID = $studentID;
  }
  function get_studentID() {
    return $this->studentID;
  }

  function set_name($name) {
    $this->name = $name;
  }
  function get_name() {
    return $this->name;
  }

  function set_yearLevel($yearLevel) {
    $this->yearLevel = $yearLevel;
  }
  function get_yearLevel() {
    return $this->yearLevel;
  }

  function set_specialization($specialization) {
    $this->specialization = $specialization;
  }
  function get_specialization() {
    return $this->specialization;
  }

  function set_email($email) {
    $this->email = $email;
  }
  function get_email() {
    return $this->email;
  }

  function set_username($username) {
    $this->username = $username;
  }
  function get_username() {
    return $this->username;
  }

  function set_picture($picture) {
    $this->picture = $picture;
  }
  function get_picture() {
    return $this->picture;
  }

  function set_status($status) {
    $this->status = $status;
  }
  function get_status() {
    return $this->status;
  }

  function set_ranking($ranking) {
    $this->ranking = $ranking;
  }
  function get_ranking() {
    return $this->ranking;
  }

  function set_rating($rating) {
    $this->rating = $rating;
  }
  function get_rating() {
    return $this->rating;
  }

  function set_creationType($creationType) {
    $this->creationType = $creationType;
  }
  function get_creationType() {
    return $this->creationType;
  }

  function set_attachment($attachment) {
    $this->attachment = $attachment;
  }
  function get_attachment() {
    return $this->attachment;
  }
}


class Admin {
  public $adminID;
  public $name;
  public $email;
  public $username;
  public $picture;
  public $status;

  function set_adminID($adminID) {
    $this->adminID = $adminID;
  }
  function get_adminID() {
    return $this->adminID;
  }

  function set_name($name) {
    $this->name = $name;
  }
  function get_name() {
    return $this->name;
  }

  function set_email($email) {
    $this->email = $email;
  }
  function get_email() {
    return $this->email;
  }

  function set_username($username) {
    $this->username = $username;
  }
  function get_username() {
    return $this->username;
  }

  function set_picture($picture) {
    $this->picture = $picture;
  }
  function get_picture() {
    return $this->picture;
  }

  function set_status($status) {
    $this->status = $status;
  }
  function get_status() {
    return $this->status;
  }
}

class SpecialAccount {
  public $accountID;
  public $userName;
  public $name;
  public $job;
  public $ranking;
  public $picture;

  function set_ranking($ranking) {
    $this->ranking = $ranking;
  }
  function get_ranking() {
    return $this->ranking;
  }

  function set_accountID($accountID) {
    $this->accountID = $accountID;
  }
  function get_accountID() {
    return $this->accountID;
  }

  function set_userName($userName) {
    $this->userName = $userName;
  }
  function get_userName() {
    return $this->userName;
  }

  function set_name($name) {
    $this->name = $name;
  }
  function get_name() {
    return $this->name;
  }

  function set_job($job) {
    $this->job = $job;
  }
  function get_job() {
    return $this->job;
  }

  function set_picture($picture) {
    $this->picture = $picture;
  }
  function get_picture() {
    return $this->picture;
  }
}

class Question {
  public $picture;
  public $studentID;
  public $userName;
  public $name;
  public $yearLevel;
  public $specialization;
  public $questionID;
  public $subjectID;
  public $subject;
  public $creationDateTime;
  public $title;
  public $description;
  public $status;
  public $email;
  public $fileName;

  function set_email($email) {
    $this->email = $email;
  }

  function get_email() {
    return $this->email;
  }

  function set_fileName($fileName) {
    $this->fileName = $fileName;
  }

  function get_fileName() {
    return $this->fileName;
  }


  function set_picture($picture) {
    $this->picture = $picture;
  }

  function get_picture() {
    return $this->picture;
  }

  function set_studentID($studentID) {
    $this->studentID = $studentID;
  }

  function get_studentID() {
    return $this->studentID;
  }

  function set_name($name) {
    $this->name = $name;
  }

  function get_name() {
    return $this->name;
  }

  function set_userName($userName) {
    $this->userName = $userName;
  }

  function get_userName() {
    return $this->userName;
  }


  function set_specialization($specialization) {
    $this->specialization = $specialization;
  }

  function get_specialization() {
    return $this->specialization;
  }

  function set_yearLevel($yearLevel) {
    $this->yearLevel = $yearLevel;
  }

  function get_yearLevel() {
    return $this->yearLevel;
  }

  function set_questionID($questionID) {
    $this->questionID = $questionID;
  }
  
  function get_questionID() {
    return $this->questionID;
  }

  function set_subjectID($subjectID) {
    $this->subjectID = $subjectID;
  }
  
  function get_subjectID() {
    return $this->subjectID;
  }

  function set_subject($subject) {
    $this->subject = $subject;
  }
  
  function get_subject() {
    return $this->subject;
  }

  function set_creationDateTime($creationDateTime) {
    $this->creationDateTime = $creationDateTime;
  }
  
  function get_creationDateTime() {
    return $this->creationDateTime;
  }

  function set_title($title) {
    $this->title = $title;
  }
  
  function get_title() {
    return $this->title;
  }

  function set_description($description) {
    $this->description = $description;
  }
  
  function get_description() {
    return $this->description;
  }

  function set_status($status) {
    $this->status = $status;
  }
  
  function get_status() {
    return $this->status;
  }

}

class FAQ {
  public $questionID;
  public $title;

  function set_questionID($questionID) {
    $this->questionID = $questionID;
  }
  
  function get_questionID() {
    return $this->questionID;
  }

  function set_title($title) {
    $this->title = $title;
  }
  
  function get_title() {
    return $this->title;
  }
}

class Reported {
  public $reportedID;
  public $dateTime;
  public $reason;
  public $answerInformation;
  public $questionInformation;
  public $replyInformation;
  public $reporterInformation;
  
  function set_reporterInformation($reporterInformation) {
    $this->reporterInformation = $reporterInformation;
  }

  function get_reporterInformation() {
    return $this->reporterInformation;
  }

  function set_reportedID($reportedID) {
    $this->reportedID = $reportedID;
  }

  function get_reportedID() {
    return $this->reportedID;
  }

  function set_dateTime($dateTime) {
    $this->dateTime = $dateTime;
  }

  function get_dateTime() {
    return $this->dateTime;
  }

  function set_reason($reason) {
    $this->reason = $reason;
  }

  function get_reason() {
    return $this->reason;
  }

  function set_answerInformation($answerInformation) {
    $this->answerInformation = $answerInformation;
  }

  function get_answerInformation() {
    return $this->answerInformation;
  }

  function set_replyInformation($replyInformation) {
    $this->replyInformation = $replyInformation;
  }

  function get_replyInformation() {
    return $this->replyInformation;
  }

  function set_questionInformation($questionInformation) {
    $this->questionInformation = $questionInformation;
  }

  function get_questionInformation() {
    return $this->questionInformation;
  }
}


class Answer {
  public $picture;
  public $studentID;
  public $accountID;
  public $questionID;
  public $questionTitle;
  public $name;
  public $yearLevel;
  public $specialization;
  public $creationDateTime;
  public $answerID;
  public $answer;
  public $rating;
  public $status;
  public $replies;
  public $studentInformation;
  public $questionInformation;

  public $fileName;
  public $correctAnswer;

  public $questionerID;

  function set_questionTitle($questionTitle) {
    $this->questionTitle = $questionTitle;
  }

  function get_questionTitle() {
    return $this->questionTitle;
  }

  function set_fileName($fileName) {
    $this->fileName = $fileName;
  }

  function get_fileName() {
    return $this->fileName;
  }

  function set_correctAnswer($correctAnswer) {
    $this->correctAnswer = $correctAnswer;
  }

  function get_correctAnswer() {
    return $this->correctAnswer;
  }

  function set_questionerID($questionerID) {
    $this->questionerID = $questionerID;
  }

  function get_questionerID() {
    return $this->questionerID;
  }

  function set_picture($picture) {
    $this->picture = $picture;
  }

  function get_picture() {
    return $this->picture;
  }

  function set_studentID($studentID) {
    $this->studentID = $studentID;
  }

  function get_studentID() {
    return $this->studentID;
  }

  function set_accountID($accountID) {
    $this->accountID = $accountID;
  }

  function get_accountID() {
    return $this->accountID;
  }

  function set_name($name) {
    $this->name = $name;
  }

  function get_name() {
    return $this->name;
  }

  function set_yearLevel($yearLevel) {
    $this->yearLevel = $yearLevel;
  }

  function get_yearLevel() {
    return $this->yearLevel;
  }

  function set_specialization($specialization) {
    $this->specialization = $specialization;
  }

  function get_specialization() {
    return $this->specialization;
  }

  function set_creationDateTime($creationDateTime) {
    $this->creationDateTime = $creationDateTime;
  }
  
  function get_creationDateTime() {
    return $this->creationDateTime;
  }

  function set_answerID($answerID) {
    $this->answerID = $answerID;
  }
  
  function get_answerID() {
    return $this->answerID;
  }

  function set_answer($answer) {
    $this->answer = $answer;
  }
  
  function get_answer() {
    return $this->answer;
  }

  function set_questionID($questionID) {
    $this->questionID = $questionID;
  }
  
  function get_questionID() {
    return $this->questionID;
  }

  function set_rating($rating) {
    $this->rating = $rating;
  }
  
  function get_rating() {
    return $this->rating;
  }

  function set_status($status) {
    $this->status = $status;
  }
  
  function get_status() {
    return $this->status;
  }

  function set_replies($replies) {
    $this->replies = $replies;
  }
  
  function get_replies() {
    return $this->replies;
  }

  function set_studentInformation($studentInformation) {
    $this->studentInformation = $studentInformation;
  }
  
  function get_studentInformation() {
    return $this->studentInformation;
  }

  function set_questionInformation($questionInformation) {
    $this->questionInformation = $questionInformation;
  }
  
  function get_questionInformation() {
    return $this->questionInformation;
  }
}


class Reply {
  public $picture;
  public $studentID;
  public $answerID;
  public $name;
  public $yearLevel;
  public $specialization;
  public $creationDateTime;
  public $answer;
  public $reply;
  public $thumbsUp;
  public $thumbsDown;
  public $status;
  public $replyID;
  public $studentInformation;

  public $fileName;

  function set_fileName($fileName) {
    $this->fileName = $fileName;
  }

  function get_fileName() {
    return $this->fileName;
  }

  function set_reply($reply) {
    $this->reply = $reply;
  }

  function get_reply() {
    return $this->reply;
  }

  function set_picture($picture) {
    $this->picture = $picture;
  }

  function get_picture() {
    return $this->picture;
  }

  function set_studentInformation($studentInformation) {
    $this->studentInformation = $studentInformation;
  }

  function get_studentInformation() {
    return $this->studentInformation;
  }

  function set_studentID($studentID) {
    $this->studentID = $studentID;
  }

  function get_studentID() {
    return $this->studentID;
  }

  function set_name($name) {
    $this->name = $name;
  }

  function get_name() {
    return $this->name;
  }

  function set_yearLevel($yearLevel) {
    $this->yearLevel = $yearLevel;
  }

  function get_yearLevel() {
    return $this->yearLevel;
  }

  function set_specialization($specialization) {
    $this->specialization = $specialization;
  }

  function get_specialization() {
    return $this->specialization;
  }

  function set_creationDateTime($creationDateTime) {
    $this->creationDateTime = $creationDateTime;
  }
  
  function get_creationDateTime() {
    return $this->creationDateTime;
  }

  function set_answerID($answerID) {
    $this->answerID = $answerID;
  }
  
  function get_answerID() {
    return $this->answerID;
  }

  function set_answer($answer) {
    $this->answer = $answer;
  }
  
  function get_answer() {
    return $this->answer;
  }

  function set_replyID($replyID) {
    $this->replyID = $replyID;
  }
  
  function get_replyID() {
    return $this->replyID;
  }

  function set_thumbsUp($thumbsUp) {
    $this->thumbsUp = $thumbsUp;
  }
  
  function get_thumbsUp() {
    return $this->thumbsUp;
  }

  function set_thumbsDown($thumbsDown) {
    $this->thumbsDown = $thumbsDown;
  }
  
  function get_thumbsDown() {
    return $this->thumbsDown;
  }

  function set_status($status) {
    $this->status = $status;
  }
  
  function get_status() {
    return $this->status;
  }
}


class Notification {
  public $notificationID;
  public $studentID;
  public $name;
  public $creationDateTime;
  public $detail;
  public $type;
  public $questionID;
  public $status;

  function set_notificationID($notificationID) {
    $this->notificationID = $notificationID;
  }

  function get_notificationID() {
    return $this->notificationID;
  }
  
  function set_studentID($studentID) {
    $this->studentID = $studentID;
  }

  function get_studentID() {
    return $this->studentID;
  }

  function set_name($name) {
    $this->name = $name;
  }

  function get_name() {
    return $this->name;
  }

  function set_creationDateTime($creationDateTime) {
    $this->creationDateTime = $creationDateTime;
  }
  
  function get_creationDateTime() {
    return $this->creationDateTime;
  }

  function set_detail($detail) {
    $this->detail = $detail;
  }
  
  function get_detail() {
    return $this->detail;
  }

  function set_type($type) {
    $this->type = $type;
  }
  
  function get_type() {
    return $this->type;
  }

  function set_questionID($questionID) {
    $this->questionID = $questionID;
  }
  
  function get_questionID() {
    return $this->questionID;
  }

  function set_status($status) {
    $this->status = $status;
  }
  
  function get_status() {
    return $this->status;
  }
}

class Rating {
  public $ratingID;
  public $answerID;
  public $studentID;
  public $rating;

  function set_ratingID($ratingID) {
    $this->ratingID = $ratingID;
  }

  function get_ratingID() {
    return $this->ratingID;
  }

  function set_answerID($answerID) {
    $this->answerID = $answerID;
  }

  function get_answerID() {
    return $this->answerID;
  }

  function set_studentID($studentID) {
    $this->studentID = $studentID;
  }

  function get_studentID() {
    return $this->studentID;
  }

  function set_rating($rating) {
    $this->rating = $rating;
  }

  function get_rating() {
    return $this->rating;
  }
}

class Rank {
  public $studentID;
  public $studentInformation;
  public $professionalInformation;
  public $rating;
  public $rank;

  function set_studentID($studentID) {
    $this->studentID = $studentID;
  }

  function get_studentID() {
    return $this->studentID;
  }

  function set_studentInformation($studentInformation) {
    $this->studentInformation = $studentInformation;
  }

  function get_studentInformation() {
    return $this->studentInformation;
  }

  function set_professionalInformation($professionalInformation) {
    $this->professionalInformation = $professionalInformation;
  }

  function get_professionalInformation() {
    return $this->professionalInformation;
  }

  function set_rating($rating) {
    $this->rating = $rating;
  }

  function get_rating() {
    return $this->rating;
  }

  function set_rank($rank) {
    $this->rank = $rank;
  }

  function get_rank() {
    return $this->rank;
  }
}

  // Add Subject Management

  class Subject {
    public $subjectID;
    public $subject;
    public $status;
    public $questionCount;

    function set_questionCount($questionCount) {
      $this->questionCount = $questionCount;
    }
  
    function get_questionCount() {
      return $this->questionCount;
    }

    function set_subjectID($subjectID) {
      $this->subjectID = $subjectID;
    }
  
    function get_subjectID() {
      return $this->subjectID;
    }

    function set_subject($subject) {
      $this->subject = $subject;
    }
  
    function get_subject() {
      return $this->subject;
    }

    function set_status($status) {
      $this->status = $status;
    }
  
    function get_status() {
      return $this->status;
    }
  }



?>