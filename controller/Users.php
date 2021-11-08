<?php 

class Users extends Controller {
    public function __construct()
    {
        $this->userModel = $this->model('User');
    }

    public function login() {
        $this->view('login');
    }
}