<?php

namespace controller;

require_once("model/Database.php");

class LoginController {

    private $data;

    public function __construct($formData)
    {
        $this->data = $formData;
    }

    public function doLogin()
    {
        $username = $this->data["LoginView::UserName"];
        $password = $this->data["LoginView::Password"];

        if(empty($username)) {
            return "Username is missing";
        } elseif (empty($password)) {
            return "Password is missing";
        } else {
            if($this->authenticateUser($username, $password)){
                $this->setSessionOnLogin($username);
                return "Welcome";
            }
        }
    }

    public function authenticateUser($username, $password)
    {
        try {
            $dbc = new \model\Database();
            return $dbc->authenticateUser($username, $password);
        } catch (\Exception $e) {
            return "Something went wrong, please try again: Error message was " . $e->getMessage();
        }
    }

    public function setSessionOnLogin($username)
    {
        $_SESSION["username"] = $username;
        $_SESSION["loggedIn"] = true;
    }


    public function doLogout()
    {
        //todo: add logout code
    }
}