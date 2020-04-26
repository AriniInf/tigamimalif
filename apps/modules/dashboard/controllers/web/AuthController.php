<?php

namespace Phalcon\Init\Dashboard\Controllers\Web;

use Phalcon\Mvc\Controller;
use Phalcon\Mvc\Dispatcher;
use Phalcon\Init\Dashboard\Models\Users;
use Phalcon\Http\Request;
use Phalcon\Events\Manager as EventsManager;
use Phalcon\Mvc\Model\Query;


class AuthController extends Controller
{
    public function route404Action(){
        
    }

    // public function dataTablesAction(){
    //     $karyawan = Users::find([
    //         'conditions'=> 'id_jabatan = 2 AND flag = 1']
    //     );
    //     $this->view->karyawan = $karyawan;

    // }
}
