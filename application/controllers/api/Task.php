<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class task extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('task_model');
    }
    public function index(){
    }

    /********************************
	 * Method: POST
	 * Param: title,description,user_id
	 * Return: JSON (message)
	 ********************************/
    public function addTask(){
        $request = array(
            'title' => $this->input->post('title'),
            'description' => $this->input->post('description'),
            'user_id' => $this->input->post('user_id')
        );
        if($request['title']== null && $request['user_id'] == null){
            $json_data = file_get_contents('php://input');
            $data = json_decode($json_data, true);
            $request = $data;
        }

        $query = $this->task_model->insert_entry($request);

        if(!$query){
            $response = array(
                'message' => 'ERR: Request not correct',
            );
        }
        else{
            $response = array(
                'message' => 'SUS: Add Task By ID: '.$request['user_id']
            );
        }
        header('Content-Type:application/json');
        echo json_encode($response);
    }
    /********************************
	 * Method: GET
	 * Param: user_id
	 * Return: JSON (message,data)
	 ********************************/
    public function getTasksByUserId(){
        $request = array(
            'user_id' => $this->input->get('user_id')
        );
        if($request['user_id'] == null){
            $json_data = file_get_contents('php://input');
            $data = json_decode($json_data, true);
            $request = $data;
        }

        $query = $this->task_model->get_entriesByUserId($request['user_id']);

        if(!$query){
            $response = array(
                'message' => 'ERR: UserId Task not found or Not have Task',
                'data'=>''
            );
        }
        else{
            $response = array(
                'message' => 'SUS: Get Task By ID: '.$request['user_id'],
                'data' => $query
            );
        }
        header('Content-Type:application/json');
        echo json_encode($response);
    }
    /********************************
	 * Method: GET
	 * Param: task_id
	 * Return: JSON (message,data)
	 ********************************/
    public function getTaskById(){
        $request = array(
            'task_id' => $this->input->get('task_id')
        );
        if($request['task_id'] == null){
            $json_data = file_get_contents('php://input');
            $data = json_decode($json_data, true);
            $request = $data;
        }

        $query = $this->task_model->get_entryById($request['task_id']);

        if(!$query){
            header('HTTP/1.1 404 Not Found');
            $response = array(
                'message' => 'ERR: Id Task not found',
                'data' => ''
            );
        }
        else{
            $response = array(
                'message' => 'SUS: Get Task By ID: '.$request['task_id'],
                'data' => $query
            );
        }
        header('Content-Type:application/json');
        echo json_encode($response);
    }
    /********************************
	 * Method: GET
	 * Param: task_id
	 * Return: JSON (message)
	 ********************************/
    public function deleteTaskById(){
        $request = array(
            'task_id' => $this->input->get('task_id')
        );
        if($request['task_id'] == null){
            $json_data = file_get_contents('php://input');
            $data = json_decode($json_data, true);
            $request = $data;
        }

        $query = $this->task_model->delete_entryById($request['task_id']);

        if(!$query){
            header('HTTP/1.1 404 Not Found');
            $response = array(
                'message' => 'ERR: Id Task not found',
            );
        }
        else{
            $response = array(
                'message' => 'SUS: Delete Task By ID: '.$request['task_id'],
            );
        }
        header('Content-Type:application/json');
        echo json_encode($response);
    }
    /********************************
	 * Method: POST
	 * Param: title,description,task_id
	 * Return: JSON (message)
	 ********************************/
    public function updateTaskById(){
        $request = array(
            'title' => $this->input->post('title'),
            'description' => $this->input->post('description'),
            'task_id' => $this->input->post("task_id")
        );
        if($request['task_id'] == null){
            $json_data = file_get_contents('php://input');
            $data = json_decode($json_data, true);
            $request = $data;
        }

        $query = $this->task_model->update_entryById($request);
        if(!$query){
            header('HTTP/1.1 404 Not Found');
            $response = array(
                'message' => 'ERR: Id Task not found',
            );
        }
        else{
            $response = array(
                'message' => 'SUS: Update Task By ID: '.$request['task_id'],
            );
        }
        header('Content-Type:application/json');
        echo json_encode($response);
    }

}