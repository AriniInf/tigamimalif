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
            $this->flashSession->error("username sudah digunakan");
        }
        else{
            $user->save();
            $this->flashSession->error("Anda telah berhasil mendaftar tunggu verifikasi dari admin");
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
                $this->flashSession->error("Akun anda belum diverifikasi oleh admin");
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
                    $this->response->redirect('/');
                    $this->flashSession->error("Silahkan cek Username dan Password anda apakah sudah benar");   
                }
            }
        }
        else{
            $this->flashSession->error("Akun tidak ada"); 
            $this->response->redirect('/');
        }
    }

    public function logoutAction()
    {
        $this->session->destroy();
        $this->response->redirect('/');
    }
}

    