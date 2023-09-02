<?php


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

class Question {
  public $picture;
  public $studentID;
  public $userName;
  public $name;
  public $yearLevel;
  public $email;
  public $specialization;
  public $questionID;
  public $subjectID;
  public $subject;
  public $creationDateTime;
  public $title;
  public $description;
  public $status;

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

  function set_email($email) {
    $this->email = $email;
  }

  function get_email() {
    return $this->email;
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
  public $questionID;
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
  public $thumbsUp;
  public $thumbsDown;
  public $status;
  public $replyID;

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

class Attachment {
  public $attachmentID;
  public $contentID;
  public $attachment;
  public $type;
  public $status;

  function set_studentID($studentID) {
    $this->studentID = $studentID;
  }

  function get_studentID() {
    return $this->studentID;
  }

  function set_questionID($questionID) {
    $this->questionID = $questionID;
  }
  
  function get_questionID() {
    return $this->questionID;
  }

  function set_answerID($answerID) {
    $this->answerID = $answerID;
  }
  
  function get_answerID() {
    return $this->answerID;
  }

  function set_creationDateTime($creationDateTime) {
    $this->creationDateTime = $creationDateTime;
  }
  
  function get_creationDateTime() {
    return $this->creationDateTime;
  }

  function set_comment($comment) {
    $this->comment = $comment;
  }
  
  function get_comment() {
    return $this->comment;
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