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

?>