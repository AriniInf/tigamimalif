<?php

namespace Phalcon\Init\Dashboard\Controllers\Web;

use Phalcon\Mvc\Controller;
use Phalcon\Mvc\Dispatcher;
use Phalcon\Init\Dashboard\Models\Users;
use Phalcon\Init\Dashboard\Models\Jabatan;
use Phalcon\Http\Request;
use Phalcon\Events\Manager as EventsManager;

class UserController extends Controller
{
    public function indexAction(){
        
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
        $user->flag = '0';
        $nama = Users::findFirst("username = '$user->username'");
        if($nama){
            echo "username sudah digunakan";
        }
        else{
            $user->save();
            $this->response->redirect('/');
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
            if($user->flag==0){
                $this->response->redirect('/');
                echo "anda belum diverifikasi";
            }
            else{
                if ($this->security->checkHash($password, $user->password)) {
                    $this->session->set(
                        'auth',
                        [
                            'id' => $user->id,
                            'id_jabatan' => $user->id_jabatan,
                            'username' => $user->username,
                        ]
                    );
                    if($user->id_jabatan==2){
                        $this->response->redirect('/karyawan/dashboard');
                    }
                    else{
                        $this->response->redirect('/admin/dashboard');
                    }
                }
                else{
                    $this->security->hash(rand());
                    var_dump('salah');
                    $this->response->redirect('/');
                }
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

    