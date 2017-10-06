<?php

namespace Controllers;

use Lib\Image;
use Lib\Redirect;
use Lib\Request;
use Lib\Security;
use Model\TaskModel;
use Model\TaskFormModel;

class TaskController extends Controller
{
    private function fromValidate(){}

    public function taskDetail(){

        $id = abs(intval(Request::post('postId')));
        $task = TaskModel::getById($id);
        if($task){
            $this->ajax = true;
            $this->view('taskDetails',['title' => ' Task - '. $task['id'], 'task' => $task]);
            return;
        }

        echo 0;
    }

    public function taskCreate(){

        $this->view('taskCreate',['title' => 'Create task']);
    }

    /**
     * Showing task on main page
     */
    public function taskList(){
        $data  = TaskModel::taskList();
        $this->view('taskList',[
            'title' => ' Task list',
            'tasks' => (array)$data['tasks'],
            'pages' => $data['pages'],
            'currentPage' => $data['currentPage']
        ]);
    }

    /**
     * Creating task at /create
     */
    public function taskAdd(){
        if(!Security::check_csrf_token(Request::post('_token'))){
            Redirect::to($_SERVER['REQUEST_URI']);
            die();
        }

        $data = TaskFormModel::createValidate();
        if(!$data){
            Redirect::to($_SERVER['REQUEST_URI']);
            die();
        }


        $lastId = TaskModel::create($data);
        $image = Request::post('image');

        if($lastId && $image){
            Image::create($lastId, $image);
        }

        Redirect::to('/');

    }

}