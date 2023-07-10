<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Auth extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('user_model');
    }
    public function index(){
    }
    /********************************
	 * Method: POST
	 * Param: username,password
	 * Return: JSON (message)
	 ********************************/
    public function login(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $request = array(
                'username' => $_POST['username'],
                'password' =>  $_POST['password'],
            );

            $query = $this->user_model->get_entry($request['username']);

        if(!$query){
            header('HTTP/1.1 404 Not Found');
            $response = array(
                'message' => 'ERR: username not found',
            );
        }
        else{
            if($request['password'] == $query->password){
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
        else{
            header('HTTP/1.1 400 Bad Request');
            $response = array(
                'message' => 'ERR: Method not correct',
            );
            header('Content-Type:application/json');
            echo json_encode($response);
        }
    }
    
    /********************************
	 * Method: POST
	 * Param: username,password
	 * Return: JSON (message)
	 ********************************/
    public function register(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $request = array(
                'username' => $_POST['username'],
                'password' =>  $_POST['password'],
            );

            $query = $this->user_model->insert_entry($request);

            if(!$query){
                header('HTTP/1.1 400 Bad Request');
                $response = array(
                    'message' => 'ERR: register',
                );
            }
            else{
                $response = array(
                    'message' => 'SUS: register complete'
                );
            }
            header('Content-Type:application/json');
            echo json_encode($response);
        }
        else{
            header('HTTP/1.1 400 Bad Request');
            $response = array(
                'message' => 'ERR: Method not correct',
            );
            header('Content-Type:application/json');
            echo json_encode($response);
        }
        
    }

}