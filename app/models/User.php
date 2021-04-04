<?php

require '../../database.php';

class User {
    public $username;
    public $password;
    private $db;

    public function __construct() {
        
    }

    public function addUser($username, $password) {
        $username = filter_var($username, FILTER_SANITIZE_STRING);
        $password = password_hash($password, PASSWORD_DEFAULT);

        $db = new DatabaseTranscations();
        $db->insert($username, $password);

         if ($inserted) {
             return "Successfully inserted";
         } else {
             return "Something went wrong";
        }
    }

    public function getUsers() {
        $db = new DatabaseTranscations();
        $result = $db->select();
        if ($result) {
            return $result;
        } else {
            return "No results returned";
        }
    }

    public function getUserById($id) {
        $id = filter_var($id, FILTER_SANITIZE_NUMBER_INT);
        $db = new DatabaseTranscations();
        $result = $db->select($id);
        if ($result) {
            return $result;
        } else {
            return "No results returned";
        }
    }

    public function getUserByUsername($username) {
        $db = new DatabaseTranscations();
        $result = $db->getUserByUsername($username);
        if ($result) {
            return $result;
        } else {
            return null;
        }
    }

    public function editUser($id, $username, $password) {
        $username = filter_var($username, FILTER_SANITIZE_STRING);
        $password = password_hash($password, PASSWORD_DEFAULT);
        $id = filter_var($id, FILTER_SANITIZE_NUMBER_INT);

        $db = new DatabaseTranscations();
        $result = $db->update($username, $password, $id);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function deleteUser($id) {
        $id = filter_var($id, FILTER_SANITIZE_NUMBER_INT);
        $db = new DatabaseTranscations();
        $result = $db->delete($id);
         if ($result) {
             return "deleted";
         } else {
             return "Something happened event not deleted";
        }
    }
}