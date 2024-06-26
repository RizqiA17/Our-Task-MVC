<?php

class Complited extends Controller{
    public function index(){
        $this->IsSessionExist();
        
        if(!isset($_SESSION['status'])){
            header("Location:".BASEURL."Login");
        }
        $data['title'] = 'Task Complited';
        $data['task_solo'] = $this->model('Task_solo_distribution_model')->getAllTask();
        $data['tugas_group'] = $this->model('Task_group_distribution_model')->getAllTask();
        $data['group_member'] = $this->model('Task_group_distribution_model')->getMemberInGroup();
        // $data['tugas_group'] = $this->model('Tugas_group_model')->getAllTugas();

        $this->view("templates/header", $data);
        $this->view("Complited/index", $data);
        $this->view("templates/footer");
    }
}