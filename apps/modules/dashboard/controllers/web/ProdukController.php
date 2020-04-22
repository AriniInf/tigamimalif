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
       
        $produk = $this->db->query('SELECT Produk.id, produk, kategori, stok FROM Produk join Kategori ON id_kategori = kategori.id')->fetchAll();
        $this->view->setVars([
            'produk' => $produk,
        ]);
    }
    public function formProdukAction()
    {
        $kategori = Kategori::find();
        $this->view->kategori = $kategori;    
    }
    public function addProdukAction(){

        $data = new Produk();
        $data->id_kategori = $this->request->getPost('id_kategori');
        $data->produk = $this->request->getPost('produk');
        $data->stok = $this->request->getPost('stok');
        $data->save();
        $this->response->redirect('/list-produk');
    }

    public function updateProdukAction($id){
        $produk = Produk::findFirst("id='$id'");
        $this->view->produk = $produk;
    }

    public function deleteProdukAction($id){
        $this->db->query("delete from Produk where id='".$id."'");
        $this->response->redirect('/list-produk');

    }
    public function editProdukAction(){
        $id = $this->request->getPost('id');
        $produk = Produk::findFirst("id='$id'");
        $produk->id_kategori = $this->request->getPost('id_kategori');
        $produk->produk = $this->request->getPost('produk');
        $produk->stok = $this->request->getPost('stok');
        $produk->update();
        $this->response->redirect('/list-produk');
    }
}