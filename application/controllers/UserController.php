<?php
class UserController extends CI_Controller{
    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model('user');
    }
    
    function register()
    {
        $fname=$this->input->post('first_name');
        $lname=$this->input->post('last_name');
        $telno=$this->input->post('telephone_number');
        $email=$this->input->post('email');
        $pw=$this->input->post('password');
        $imageurl=$this->input->post('image_url');
        
        $hashpw=  sha1($pw);
        $result=$this->user->add($fname,$lname,$telno,$email,$hashpw,$imageurl);
//        if($result == "1"){
//            $this->load->view('libraries');
//         //print_r($data);
//         $this->load->view('login');
//        }
        print_r($result);
    }
    
    function login()
    {
        $email=$this->input->post('email');
        $pw=$this->input->post('password');
        $login=$this->user->login($email);
        if($login == true)
        {
            $result=$this->user->get($email);
            foreach ($result as $r) {
                $password = $r->password;
                $userid = $r->user_id;
                $email = $r->email;
            }
           // print_r($password);
            $hashpw=  sha1($pw);
            // print_r('Hash ::: ' . $hashpw);
            if ($password == $hashpw) {
                print_r('1');
            }
            else
            {
                print_r('Password Incorrect!');
            }
        }
        else
        {
            print_r('No email found!');
        }
    }
}
