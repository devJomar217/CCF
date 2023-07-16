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
  public $studentID;
  public $questionID;
  public $subjectID;
  public $creationDateTime;
  public $question;
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

  function set_subjectID($subjectID) {
    $this->subjectID = $subjectID;
  }
  
  function get_subjectID() {
    return $this->subjectID;
  }

  function set_creationDateTime($creationDateTime) {
    $this->creationDateTime = $creationDateTime;
  }
  
  function get_creationDateTime() {
    return $this->creationDateTime;
  }

  function set_question($question) {
    $this->question = $question;
  }
  
  function get_question() {
    return $this->question;
  }

  function set_status($status) {
    $this->status = $status;
  }
  
  function get_status() {
    return $this->status;
  }
}


class Answer {
  public $studentID;
  public $questionID;
  public $answerID;
  public $creationDateTime;
  public $answer;
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

  function set_answer($answer) {
    $this->answer = $answer;
  }
  
  function get_answer() {
    return $this->answer;
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

  // Add Subject Management

  class Subject {
    public $subjectID;
    public $subject;

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
  }



?>