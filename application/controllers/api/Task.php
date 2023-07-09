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
	 * Param: title,description,user_id,due_date
	 * Return: JSON (message)
	 ********************************/
    public function addTask(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $request = array(
                'title' => $_POST['title'],
                'description' =>  $_POST['description'],
                'user_id' =>  $_POST['user_id'],
                'due_date' =>  $_POST['due_date'],
            );

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
	 * Method: GET
	 * Param: user_id
	 * Return: JSON (message,data)
	 ********************************/
    public function getAllTasksByUserId(){
        if($_SERVER["REQUEST_METHOD"] == "GET"){
            $user_id = $_GET['user_id'];
            $status = "all";
            
            $query = $this->task_model->get_entriesByUserId($user_id,$status);

            if(!$query){
                header('HTTP/1.1 400 Bad Request');
                $response = array(
                    'message' => 'ERR: UserId Task not found or Not have Task',
                    'data'=>''
                );
            }
            else{
                $response = array(
                    'message' => 'SUS: Get Task By ID: '.$user_id,
                    'data' => $query
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
    /********************************
	 * Method: GET
	 * Param: user_id
	 * Return: JSON (message,data)
	 ********************************/
    public function getInCompleteTasksByUserId(){
        if($_SERVER["REQUEST_METHOD"] == "GET"){
            $user_id = $_GET['user_id'];
            $status = 'incomplete';

            $query = $this->task_model->get_entriesByUserId($user_id,$status);

            if(!$query){
                header('HTTP/1.1 400 Bad Request');
                $response = array(
                    'message' => 'ERR: UserId Task not found or Not have Task',
                    'data'=>''
                );
            }
            else{
                $response = array(
                    'message' => 'SUS: Get Task By ID: '.$user_id,
                    'data' => $query
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
    /********************************
	 * Method: GET
	 * Param: task_id
	 * Return: JSON (message,data)
	 ********************************/
    public function getTaskById(){
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $task_id = $_GET['task_id'];

            $query = $this->task_model->get_entryById($task_id);

            if(!$query){
                header('HTTP/1.1 404 Not Found');
                $response = array(
                    'message' => 'ERR: Id Task not found',
                    'data' => ''
                );
            }
            else{
                $response = array(
                    'message' => 'SUS: Get Task By ID: '.$task_id,
                    'data' => $query
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
    /********************************
	 * Method: GET
	 * Param: task_id
	 * Return: JSON (message)
	 ********************************/
    public function deleteTaskById(){
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $task_id = $_GET['task_id'];

            $query = $this->task_model->delete_entryById($task_id);

            if(!$query){
                header('HTTP/1.1 404 Not Found');
                $response = array(
                    'message' => 'ERR: Id Task not found',
                );
            }
            else{
                $response = array(
                    'message' => 'SUS: Delete Task By ID: '.$task_id,
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
    /********************************
	 * Method: POST
	 * Param: title,description,task_id
	 * Return: JSON (message)
	 ********************************/
    public function updateTaskById(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $updatedData = array(
                'task_id' => $_POST['task_id'],
                'title' => $_POST['title'],
                'description' => $_POST['description']
            );

            $query = $this->task_model->update_entryById($updatedData);

            if (!$query) {
                header('HTTP/1.1 404 Not Found');
                $response = array(
                    'message' => 'ERR: Task ID not found',
                );
            } else {
                $response = array(
                    'message' => 'SUS: Updated Task By ID: ' . $updatedData['task_id'],
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
        // else {
        
        // $task = $this->task_model->getTaskById($request['task_id']);
        // $this->load->view('update_task_form', array('task' => $task));
        // }
    }

    // $this->form_validation->set_rules('title', 'Title', 'required');
    // $this->form_validation->set_rules('description', 'Description', 'required');
    // if (!$this->form_validation->run())
    // {
    //     $this->session->set_flashdata('errors', validation_errors());
    //     redirect(base_url('....' . $id));
    // }
    // else
    // {
    //    $this->task_model->update($id);
    //    $this->session->set_flashdata('success', "Updated Successfully!");
    //    redirect(base_url('...'));
    // }
    

    public function doneTaskById(){
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            
            $task_id = $_GET['task_id'];

        $query = $this->task_model->done_ById($task_id);

        if(!$query){
            header('HTTP/1.1 404 Not Found');
            $response = array(
                'message' => 'ERR: Id Task not found',
            );
        }
        else{
            $response = array(
                'message' => 'SUS: Done Task By ID: '.$task_id,
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

    /********************************
	 * Method: GET
	 * Param: user_id
	 * Return: JSON (message,data)
	 ********************************/
    public function getDoneTasksByUserId(){
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            
            $user_id = $_GET['user_id'];

        $query = $this->task_model->get_doneTask_ByUserId($user_id);
        if(!$query){
            header('HTTP/1.1 404 Not Found');
            $response = array(
                'message' => 'ERR: UserId Task not found or Not have Done Task',
                'data'=>''
            );
        }
        else{
            $response = array(
                'message' => 'SUS: Get Done Task By ID: '.$user_id,
                'data' => $query
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