<?php

namespace controller;

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
            try {
                $this->authenticateUser($username, $password);
            } catch (\Exception $e) {
                return "Something went wrong, please try again: Error message was " . $e->getMessage();
            }
        }

    }

    public function doLogout()
    {
        //todo: add logout code
    }

    public function authenticateUser($username, $password)
    {
        //todo: add code that validates username and pwd if form OK
    }
}