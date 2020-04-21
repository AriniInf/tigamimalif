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

    

    public function dashboardAction(){
        $db = $this->getDI()->get('db');

        $sql = "Select * from users";

        $result = $db->fetchOne($sql);

        echo var_dump($result);
        // $id = $this->session->get('id');
        $this->view->pick('dashboard/dashboard');
    }   

    public function registerAction()
    {
        
    }
    public function storeAction()
    {
        $user = new Users();
        $user->id_jabatan = '2';
        $user->username = $this->request->getPost('username');
        $user->nama = $this->request->getPost('nama');
        $user->email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        $user->password = $this->security->hash($password);
        $user->usia = $this->request->getPost('usia');
        $user->alamat = $this->request->getPost('alamat');
        $user->notelp = $this->request->getPost('notelp');  
        $user->flag = '0';
        $nama = Users::findFirst("username = '$user->username'");
        if($nama){
            echo "username sudah digunakan";
        }
        else{
            $user->save();
            $this->response->redirect('/login');
        }        
    }
    public function loginAction(){

    }

    public function postloginAction()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        $user = Users::findFirst("username='$username'");

        if ($user) {
            if ($this->security->checkHash($password, $user->password)) {
                $this->session->set(
                    'auth',
                    [
                        'id' => $user->id,
                        'username' => $user->username,
                    ]
                );
                $this->response->redirect('/dashboard');
            }
            else{
                $this->security->hash(rand());
                var_dump('salah');
                $this->response->redirect('/');
            }
        }
        else{
            var_dump('ga ada');
            $this->response->redirect('/');
        }
    }

    public function logoutAction()
    {
        $this->session->destroy();
        // $this->flashSession->success('Anda telah logout');
        print_r('logout berhasil');
        $this->response->redirect('/');
        
    }

}   