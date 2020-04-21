<?php

namespace Phalcon\Init\Dashboard\Controllers\Web;

use Phalcon\Mvc\Controller;
use Phalcon\Mvc\Dispatcher;
use Phalcon\Init\Dashboard\Models\Produk;
use Phalcon\Init\Dashboard\Models\Kategori;
use Phalcon\Http\Request;
use Phalcon\Events\Manager as EventsManager;


class ProdukController extends Controller
{

    public function listProdukAction(){
       
        $produks = Produk::find();
      
        $this->view->produks = $produks;
       // $this->view->pick('dashboard/listKategori');
    }
    public function formProdukAction()
    {
        $kategori = Kategori::findFirst();
        $this->view->kategori = $kategori;
        //$this->view->pick('dashboard/formKategori') ;       
    }
    public function addProdukAction(){

        $data = new Produk();
        $kategori = $this->request->getPost('kategori');
        $data->id_kategori = $kategori->id_kategori;
        $data->produk = $this->request->getPost('produk');
        $data->stok = $this->request->getPost('stok');
        $data->save();
        $this->response->redirect('/');
    }

    public function editKategoti(){

    }
}