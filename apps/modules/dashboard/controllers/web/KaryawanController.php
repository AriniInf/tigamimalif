<?php

namespace Phalcon\Init\Dashboard\Controllers\Web;

use Phalcon\Mvc\Controller;
use Phalcon\Mvc\Dispatcher;
use Phalcon\Init\Dashboard\Models\Users;
use Phalcon\Http\Request;
use Phalcon\Events\Manager as EventsManager;
use Phalcon\Mvc\Model\Query;


class KaryawanController extends Controller
{
    public function dashboardAction(){
        // $db = $this->getDI()->get('db');

        // $sql = "Select * from Users";

        // $result = $db->fetchOne($sql);

        // echo var_dump($result);
        $id = $this->session->get('id');
        //$this->view->pick('dashboard/dashboard');
    }
    
    
}