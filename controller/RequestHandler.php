<?php

namespace controller;

require_once("LoginController.php");

class RequestHandler {

    private $data;

    public function __construct($postFormData)
    {
        $this->data = $postFormData;
    }

    public function handlePOSTRequest()
    {
        if(isset($this->data['LoginView::Login'])){
            try {
                $lc = new LoginController($this->data);
                $lc->doLogin();
            } catch (\Exception $e) {
                echo $e->getMessage();
            }

        }

        if(isset($this->data['LoginView::Logout'])){
            $lc = new LoginController($this->data);
            $lc->doLogout();
        }
    }
}