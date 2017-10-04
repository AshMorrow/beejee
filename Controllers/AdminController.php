<?php

namespace Controllers;
use Lib\Redirect;
use Lib\Request;
use Model\TaskModel;
use Lib\Security;
use Model\TaskFormModel;

class AdminController extends Controller
{

    public function saveTask(){
        if(!Security::check_csrf_token(Request::post('_token'))){
            Redirect::to($_SERVER['REQUEST_URI']);
            die;
        }

        $data = TaskFormModel::editValidate();
        if(!$data){
            Redirect::to($_SERVER['REQUEST_URI']);
            die;
        }

        $result = TaskModel::update($data);

        if($result){
            Redirect::to('/admin');
            die;
        }

        Redirect::to($_SERVER['REQUEST_URI']);


    }

    public function editTask(){
        $id = intval($_GET['id']);
        if($id <= 0) Redirect::to('/admin');

        $task = TaskModel::getById($id);

        $this->view('admin.taskEdit', [
            'title'  => 'Edit task: '. $task['name'],
            'task' => $task
        ]);

    }

    public function taskList(){
        TaskModel::$perPage = P_ADMIN_PER_PAGE;
        $data  = TaskModel::taskList();
        $this->view('admin.taskList',[
            'title' => ' Event list',
            'tasks' => (array)$data['tasks'],
            'pages' => $data['pages'],
            'currentPage' => $data['currentPage']
        ]);
    }

}