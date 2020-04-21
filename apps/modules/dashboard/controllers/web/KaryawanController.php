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
    
    public function listKaryawanAction(){
        $karyawan = Users::find('id_jabatan = 2');
        $this->view->karyawan = $karyawan;

    }
    public function editKaryawanAction(){
        //$idDokter = $this->session->get('dokter')['id'];
        $id = $this->request->getPost('id');
        $karyawan = Users::findFirst("id='$id'");
        $karyawan->nama = $this->request->getPost('nama');
        $karyawan->usia = $this->request->getPost('usia');
        $karyawan->alamat = $this->request->getPost('alamat');
        $karyawan->update();
        $this->response->redirect('/list-karyawan');

    }

    public function updateKaryawanAction($id){
        $karyawan = Users::findFirst("id='$id'");
        $this->view->karyawan = $karyawan;
    }

    public function verifikasiKaryawanAction(){
        $karyawan = Users::findFirst($this->request->getPost('id'));
        $karyawan->flag = 1;
        $karyawan->update();
        $this->response->redirect('/list-karyawan');
    }

    public function deleteKaryawanAction($id){
        $this->db->query("delete from Users where id='".$id."'");
        $this->response->redirect('/list-karyawan');

    }
}