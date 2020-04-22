<?php

namespace Phalcon\Init\Dashboard\Controllers\Web;

use Phalcon\Mvc\Controller;
use Phalcon\Mvc\Dispatcher;
use Phalcon\Init\Dashboard\Models\Users;
use Phalcon\Init\Dashboard\Models\Produk;
use Phalcon\Init\Dashboard\Models\Kategori;
use Phalcon\Http\Request;
use Phalcon\Events\Manager as EventsManager;
use Phalcon\Mvc\Model\Query;


class AdminController extends Controller
{
    public function dashboardAction(){

        $id = $this->session->get('id');
    }

    public function editProfileAction($id){
        $admin = $this->db->query("SELECT * FROM Users WHERE id='$id'")->fetchAll();
        $this->view->setVars([
            'admin' => $admin,
        ]); 
    }

    public function updateProfileAction(){
        $id = $this->request->getPost('id');
        $admin = Users::findFirst("id='$id'");
        $admin->nama = $this->request->getPost('nama');
        $admin->usia = $this->request->getPost('usia');
        $admin->alamat = $this->request->getPost('alamat');
        $admin->email = $this->request->getPost('email');
        $admin->update();
    }

    public function listKaryawanAction(){
        $karyawan = Users::find([
            'conditions'=> 'id_jabatan = 2 AND flag = 1']
        );
        $this->view->karyawan = $karyawan;
    }

    public function listBelumKaryawanAction(){
        $karyawan = Users::find([
            'conditions'=> 'id_jabatan = 2 AND flag = 0']
        );
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
        $this->response->redirect('/admin/list-karyawan');

    }

    public function updateKaryawanAction($id){
        $karyawan = Users::findFirst("id='$id'");
        $this->view->karyawan = $karyawan;
    }

    public function verifikasiKaryawanAction(){
        $karyawan = Users::findFirst($this->request->getPost('id'));
        $karyawan->flag = 1;
        $karyawan->update();
        $this->response->redirect('/admin/list-karyawan');
    }

    public function deleteKaryawanAction($id){
        $this->db->query("delete from Users where id='".$id."'");
        $this->response->redirect('/admin/list-karyawan');

    }

    public function listProdukAction(){
       
        $kategoris = Kategori::find();
        $produk = $this->db->query('SELECT Produk.id, id_kategori, produk, kategori, stok FROM Produk join Kategori ON id_kategori = kategori.id')->fetchAll();
        $this->view->setVars([
            'produk' => $produk,
        ]);
        $this->view->kategoris = $kategoris;
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
        if($data->save()){
            $this->flash->success("Produk berhasil ditambahkan");
            $this->response->redirect('/admin/list-produk');
        }
    }
        

    public function updateProdukAction($id){
        $produk = Produk::findFirst("id='$id'");
        $this->view->produk = $produk;
    }

    public function deleteProdukAction($id){
        $this->db->query("delete from Produk where id='".$id."'");
        $this->response->redirect('/admin/list-produk');

    }
    public function editProdukAction(){
        $id = $this->request->getPost('id');
        $produk = Produk::findFirst("id='$id'");
        $produk->id_kategori = $this->request->getPost('id_kategori');
        $produk->produk = $this->request->getPost('produk');
        $produk->stok = $this->request->getPost('stok');
        $produk->update();
        $this->response->redirect('/admin/list-produk');
    }

    public function listKategoriAction(){
       
        $kategoris = Kategori::find();
      
        $this->view->kategoris = $kategoris;
    }
    public function formKategoriAction()
    {

    }
    public function addKategoriAction(){

        $data = new Kategori();
        $data->kategori = $this->request->getPost('kategori');
        $data->deskripsi = $this->request->getPost('deskripsi');
        $data->save();
        $this->response->redirect('/admin/list-kategori');
    }
}