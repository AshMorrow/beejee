<?php
namespace Model;
use Lib\DB;

abstract class TaskModel
{
    public static $perPage = 0;

    public static function getById($id){
        $task = DB::pdo()->prepare('SELECT * FROM tasks WHERE id = :id');
        $task->execute(['id' => $id]);
        return $task->rowCount()? $task->fetch(): false;

    }

    public static function taskList(){

        $perPage = self::$perPage? self::$perPage: P_PER_PAGE;
        $curPage = 1;
        $orderBy = 'id';

        if (isset($_GET['page']) && $_GET['page'] > 0)
        {
            $curPage = $_GET['page'];
        }

        if (isset($_GET['orderBy'])
            && $_GET['orderBy'] == 'id' || $_GET['orderBy'] == 'email'|| $_GET['orderBy'] == 'status'){
            $orderBy = "`".str_replace("`","``",$_GET['orderBy'])."`";
        }

        $start = ($curPage - 1) * $perPage;

        $tasks = DB::pdo()->prepare("SELECT * FROM tasks ORDER BY $orderBy DESC LIMIT :startPage, :perPage");
        $tasks->execute([
            ':startPage' => $start,
            ':perPage' => $perPage
        ]);

        if($tasks->rowCount()){
            $totalTask = DB::pdo()->query("SELECT COUNT(*) AS total FROM tasks")->fetch()['total'];
            $pages = ceil($totalTask / $perPage);
            $data = ['tasks' => $tasks->fetchAll(), 'pages' => $pages, 'currentPage' => $curPage];
            return $data;
        }

        return false;

    }

    public static function create($data){
        $query = DB::pdo()
            ->prepare('INSERT INTO tasks(`name`, `email`, `text`, `status`, `create_date`, `update_date`)
                                 VALUES (:name, :email, :text, 0, NOW(), NOW())');
        $query->execute($data);

        return DB::pdo()->lastInsertId();
    }

    public static function update($data){
        $query = DB::pdo()->prepare('UPDATE tasks SET text=:text, status=:status, update_date = NOW() WHERE id = :id');
        return $query->execute([
            ':id' => $data['id'],
            ':text' => $data['text'],
            ':status' => $data['status']
        ]);
    }
}