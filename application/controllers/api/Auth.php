<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Auth extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('user_model');
    }
    public function viewRegister()
	{
		$this->load->view('register_view');
	}
    public function index(){
    }

    public function login(){
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        if($username== null && $password == null){

            $json_data = file_get_contents('php://input');
            $data = json_decode($json_data, true);

            $username = $data['username'];
            $password = $data['password'];
        }
        $query = $this->user_model->get_entry($username);

        if(!$query){
            header('HTTP/1.1 404 Not Found');
            $response = array(
                'message' => 'ERR: username not found',
            );
        }
        else{
            if($password == $query->password){
                $response = array(
                'message' => 'Login Complete',
            );
            }
            else{
                header('HTTP/1.1 401 Unauthorized');
                $response = array(
                'message' => 'ERR: Password not correct',
            );
            }
        }
        header('Content-Type:application/json');
        echo json_encode($response);
    }

    public function register(){
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        if($username== null && $password == null){

            $json_data = file_get_contents('php://input');
            $data = json_decode($json_data, true);

            $username = $data['username'];
            $password = $data['password'];
        }

        $data = array(
            'username' => $username,
            'password' => $password,
        );
        
        $status = $this->user_model->insert_entry($data);
        
        if($status){
            $response = array(
                'message' => 'register complete',
            );
        }else{
            header('HTTP/1.1 400 Bad Request');
            $response = array(
                'message' => 'ERR: register',
            );
        }

        header('Content-Type:application/json');
        echo json_encode($response);
    }
}