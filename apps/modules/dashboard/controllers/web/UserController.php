<?php

namespace Phalcon\Init\Dashboard\Controllers\Web;

use Phalcon\Mvc\Controller;
use Phalcon\Mvc\Dispatcher;
use Phalcon\Init\Dashboard\Models\Users;
use Phalcon\Init\Dashboard\Models\Jabatan;
use Phalcon\Http\Request;
use Phalcon\Events\Manager as EventsManager;
use Phalcon\Validation;
use Phalcon\Security;
use Phalcon\Validation\Validator\PresenceOf;
use Phalcon\Validation\Validator\Email;
use Phalcon\Validation\Validator\Url;
use Phalcon\Validation\Validator\Regex as RegexValidation;
use Phalcon\Mvc\Model\MessageInterface;
use Phalcon\Init\Dashboard\Form\LoginForm;

class UserController extends Controller
{
    public $validator;
        public function initialize(){
        $this->users = new Users();
        $this->security = new Security();
        
        $this->validator = new Validation();
        $this->validator->add('username',
        new PresenceOf([
            'message'=> 'username required'
        ])
        );

        $this->validator->add('password', new RegexValidation([
            'message' => 'Password paling sedikit terdiri dari 8 karakter dan harus memiliki kombinasi huruf dan angka',

             'pattern' => '/^\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$/',
        
        ]));
        $this->validator->add('email',
        new PresenceOf([
            'message'=> 'email required'
        ])
        );
        $this->validator->add('email',
        new Email([
            'message' => 'Email tidak valid'
        ])
        );

       
    }
    
    public function indexAction(){
        $form = new LoginForm();
        $this->view->setVar('form', $form);
    }
    public function registerAction()
    {
        $this->view->setVars([

            "message"   => $this->request->getQuery('alamat'),
            ]);
    }
    public function storeAction()
    {
        $user = new Users();
        $user->id_jabatan = '2';
        // $keluaran = "<br>";
        $user->username = $this->request->getPost('username');
        $user->nama = $this->request->getPost('nama');
        $user->email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        $user->password = $this->security->hash($password);
        $user->usia = $this->request->getPost('usia');
        $user->alamat = $this->request->getPost('alamat'); 
        $user->note = $this->request->getPost('note'); 
        $user->skill = $this->request->getPost('skill'); 
        $user->flag = '0';
        $nama = Users::findFirst("username = '$user->username'");
        if($nama){
            $this->flashSession->error("username sudah digunakan");
            return $this->response->redirect('/register');
        }
        else{
            
            if(count($this->validator->validate($_POST))){
                foreach ($this->validator->validate($_POST) as $message)
                    $keluaran = $keluaran.$message. ' , ';
                    //$this->view->message = $keluaran;
                    $alamat = "/register/?alamat=".$keluaran;
                    return $this->response->redirect($alamat);
            }
            else{
            
                $user->save();
                $this->flashSession->error("Anda telah berhasil mendaftar tunggu verifikasi dari admin");
                $this->response->redirect('/');
            }
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

    