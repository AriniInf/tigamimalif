<?php

namespace Phalcon\Init\Dashboard\Controllers\Web;

use Phalcon\Mvc\Controller;
use Phalcon\Mvc\Dispatcher;
use Phalcon\Init\Dashboard\Models\Users;
use Phalcon\Init\Dashboard\Models\Jabatan;
use Phalcon\Http\Request;
use Phalcon\Events\Manager as EventsManager;

class DashboardController extends Controller
{
    
    public function indexAction()
    {
        
        $this->view->pick('dashboard/login');
    }

    

       

    

}   