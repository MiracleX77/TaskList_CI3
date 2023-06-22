<?php
class Task_model extends CI_Model{



    public function insert_entry($request){
        $data = array(
            'title' => $request['title'],
            'description' => $request['description'],
            'user_id' => $request['user_id'],
            'status' => 'incomplete'
        );
        $query = $this->db->insert('tbl_task',$data);
        if($query){
            return true;
        }
        else{
            return false;
        }
    }
    public function get_entriesByUserId($id){

        $this->db->where('user_id', $id);
        $this->db->where('status', 'incomplete');
        $query = $this->db->get('tbl_task');
        if(!empty($query)){
            return $query->result();
        }
        else{
            return false;
        }
    }
    public function get_entryById($id){
    $query =$this->db->get_where('tbl_task', array('id'=>$id));
    if(!empty($query)){
        return $query->row();
        }
    else{
        return false;
        }
    }

    public function delete_entryById($id){
        $this->db->where('id', $id);
        $query =$this->db->update('tbl_task', array('status'=>'removed'));
        if($query){
            return true;
        }
        else{
            return false;
        }
    }
    public function update_entryById($request){
        date_default_timezone_set('Asia/Bangkok');
        $data = array(
            'title' => $request['title'],
            'description' => $request['description'],
            'updated_at' => date('Y-m-d H:i:s')
        );
        $this->db->where('id', $request['task_id']);
        $query =$this->db->update('tbl_task', $data);
        if($query){
            return true;
        }
        else{
            return false;
        }
    }


}