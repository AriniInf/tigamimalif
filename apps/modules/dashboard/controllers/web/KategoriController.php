<?php

namespace Phalcon\Init\Dashboard\Controllers\Web;

use Phalcon\Mvc\Controller;
use Phalcon\Mvc\Dispatcher;
use Phalcon\Init\Dashboard\Models\Kategori;
use Phalcon\Http\Request;
use Phalcon\Events\Manager as EventsManager;


class KategoriController extends Controller
{

    public function listKategoriAction(){
       
        $kategoris = Kategori::find();
      
        $this->view->kategoris = $kategoris;
       // $this->view->pick('dashboard/listKategori');
    }
    public function formKategoriAction()
    {
        //$this->view->pick('dashboard/formKategori') ;       
    }
    public function addKategoriAction(){

        $data = new Kategori();
        $data->kategori = $this->request->getPost('kategori');
        $data->deskripsi = $this->request->getPost('deskripsi');
        $data->save();
        $this->response->redirect('/');
    }

    public function editKategoti(){

    }
}