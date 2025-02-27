<?php
include "model/Task.php";
include "config/Database.php";

class TaskController{
    private $taskModel;

    //Constructor
    public function __construct(){
        $database = new Database();
        $db= $database->connect();
        $this->taskModel = new Task($db);
    }

    //Add Task
    public function addTask($task){
        $jsonData = file_get_contents("php://input");
        $data = json_decode($jsonData, true);
        $this->taskModel->task = $data['task'];        
        $result = $this->taskModel->create(); 

        if($result){
            echo json_encode(["task"=>$data["task"]]);
        }else{
            echo json_encode(["message"=>"Failed to add task"]);
        }
    }

    //Update Task
    public function updateTask($id, $is_completed){
        $jsonData = file_get_contents("php://input");
        $data = json_decode($jsonData, true);
        $this->taskModel->id = $id;
        $result = $this->taskModel->update($data['is_completed']);

        if($result){
            echo json_encode(["message"=>"Task updated"]);
        }else{
            echo json_encode(["message"=>"Failed to update task"]);
        }
        
    }

    //Delete Task
    public function deleteTask($id){
        $this->taskModel->id = $id;
        $result = $this->taskModel->delete();

        if($result){
            echo json_encode(["message"=>"Task deleted"]);
        }else{          
            echo json_encode(["message"=>"Failed to delete task"]);
        }
    }

    //Get all tasks
    public function index(){
        $tasks = $this->taskModel-> read();

        if($tasks->num_rows==0){
            echo json_encode(["message"=>"No tasks found"]);
        }else{
            $data = $tasks -> fetch_all(MYSQLI_ASSOC);
            $jsonData = json_encode($data);
            echo $jsonData;
        }
    }
}