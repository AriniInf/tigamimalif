<?php

namespace Phalcon\Init\Dashboard\Controllers\Web;

use Phalcon\Mvc\Controller;
use Phalcon\Mvc\Dispatcher;
use Phalcon\Init\Dashboard\Models\Users;
use Phalcon\Init\Dashboard\Models\Produk;
use Phalcon\Init\Dashboard\Models\Kategori;
use Phalcon\Init\Dashboard\Models\Transaksi;
use Phalcon\Http\Request;
use Phalcon\Events\Manager as EventsManager;
use Phalcon\Mvc\Model\Query;


class AdminController extends Controller
{
    public function initialize()
    {
        $auth = $this->session->has('auth');

        if (! $auth) {
            $this->response->redirect('/');
        }
        
    }

    public function dashboardAction(){
        $id = $this->session->get('id');
        $karyawan = $this->db->query(" SELECT COUNT(id) as karyawan from Users where id_jabatan = 2 and flag = 1")->fetchAll();
        $produk = $this->db->query("SELECT COUNT(id) as produk from Produk")->fetchAll();
        $banyak = $this->db->query("SELECT TOP 1 produk, count(id_produk) as jual, sum(jumlah) as jumlah from Transaksi join Produk ON produk.id = id_produk  where flag=1 group by produk order by jumlah DESC")->fetchAll();
        $this->view->setVars([
            'karyawan' => $karyawan,
            'produk' => $produk,
            'banyak' => $banyak,
        ]); 

    }       // $this->view->disable();

    public function profilAction(){
        $id = $this->session->get('auth')['id'];
        $admin = $this->db->query("SELECT * FROM Users WHERE id='$id'")->fetchAll();
        $this->view->setVars([
            'admin' => $admin,
        ]); 
    }

    public function editProfileAction(){
        $id = $this->session->get('auth')['id'];
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
        $admin->note = $this->request->getPost('note');
        $admin->skill = $this->request->getPost('skill');
        if($admin->update()){
            $this->flashSession->success("Profile telah berhasil diupdate"); 
            $this->response->redirect('/admin/lihat-profil'); 
        }       
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
        $karyawan->skill = $this->request->getPost('skill');
        $karyawan->note = $this->request->getPost('note');
        if($karyawan->update()){
            $this->flashSession->success("Data karyawan telah berhasil diedit");  
            $this->response->redirect('/admin/list-karyawan');
        }
    }

    public function updateKaryawanAction($id){
        $karyawan = Users::findFirst("id='$id'");
        $this->view->karyawan = $karyawan;
    }

    public function verifikasiKaryawanAction(){
        $karyawan = Users::findFirst($this->request->getPost('id'));
        $karyawan->flag = 1;
        $karyawan->update();
        $this->flashSession->success('karyawan berhasil diverifikasi');
        $this->response->redirect('/admin/list-karyawan');
    }

    public function deleteKaryawanAction($id){
        $this->db->query("delete from Users where id='".$id."'");
        $this->flashSession->success('Karyawan berhasil dihapus');
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
        $produk = Produk::findFirst("produk = '$data->produk'");
        if($produk){
            $this->flashSession->error("produk sudah tersedia");
            return $this->response->redirect('/admin/list-produk');
        }
        else{
            if($data->save()){
                $this->flashSession->success('Produk berhasil ditambahkan');
                $this->response->redirect('/admin/list-produk');
            }
            else{
                $this->flashSession->error('Produk gagal ditambahkan');
                $this->response->redirect('/admin/list-produk');
            }
        }
    }
        
    public function updateProdukAction($id){
        $produk = Produk::findFirst("id='$id'");
        $this->view->produk = $produk;
    }

    public function deleteProdukAction($id){
        $this->db->query("delete from Produk where id='".$id."'");
        $this->flashSession->success('Produk berhasil dihapus');
        $this->response->redirect('/admin/list-produk');

    }
    public function editProdukAction(){
        $id = $this->request->getPost('id');
        $produk = Produk::findFirst("id='$id'");
        $produk->id_kategori = $this->request->getPost('id_kategori');
        $produk->produk = $this->request->getPost('produk');
        $produk->stok = $this->request->getPost('stok');
    
        if($produk->update()){
            $this->flashSession->success("Produk berhasil diedit"); 
            $this->response->redirect('/admin/list-produk');
        } 
        else{
            $this->flashSession->error('Produk gagal ditambahkan');
            $this->response->redirect('/admin/list-produk');
        }
        
            
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
        $kategori = Kategori::findFirst("kategori = '$data->kategori'");
        if($kategori){
            $this->flashSession->error("Kategori gagal ditambahkan, data sudah tersedia");
            return $this->response->redirect('/admin/list-kategori');
        }
        else{
            if($data->save()){
                $this->flashSession->success("Kategori berhasil ditambahkan");  
                $this->response->redirect('/admin/list-kategori');
            } 
            else{
                $this->flashSession->error('Kategori gagal ditambahkan');
                $this->response->redirect('/admin/list-kategori');
            }
        }   
    }

    public function listPembelianAction(){
        $produk = Produk::find();
        $this->view->produk = $produk;
        $pembelian = $this->db->query('SELECT Transaksi.id, id_produk, produk, jumlah, tanggal FROM Produk join Transaksi ON id_produk = Produk.id where flag = 0')->fetchAll();
        $this->view->setVars([
            'pembelian' => $pembelian,
        ]);
    }

    public function listPenjualanAction(){
        $produk = Produk::find();
        $this->view->produk = $produk;
        $penjualan = $this->db->query('SELECT Transaksi.id, id_produk, produk, jumlah, tanggal FROM Produk join Transaksi ON id_produk = Produk.id where flag = 1')->fetchAll();
        $this->view->setVars([
            'penjualan' => $penjualan,
        ]);
    }

    public function addPembelianAction(){
        $pembelian = new Transaksi();
        $pembelian->id_produk = $this->request->getPost('id_produk');
        $pembelian->jumlah = $this->request->getPost('jumlah');
        $pembelian->tanggal = $this->request->getPost('tanggal');
        $pembelian->flag = 0;
        if($pembelian->save()){
            $id = $pembelian->id_produk;
            $produk = Produk::findFirst("id='$id'");
            $produk->stok = $produk->stok +$pembelian->jumlah;
            
            $produk->update();  
            $this->flashSession->success("Pembelian berhasil ditambahkan");          
            $this->response->redirect('/admin/list-pembelian');
        }
        else{
            $this->response->redirect('/admin/list-pembelian');
        }
    }

    public function editPembelianAction(){
        $id = $this->request->getPost('id');
        $beli = Transaksi::findFirst("id='$id'");
        $stoksblm = $beli->jumlah;
        $beli->id_produk = $this->request->getPost('id_produk');
        $beli->jumlah = $this->request->getPost('jumlah');
        $beli->tanggal = $this->request->getPost('tanggal');
        if($beli->update()){
            $idpro = $beli->id_produk;
            $produk = Produk::findFirst("id='$idpro'");
            $produk->stok = $beli->jumlah - $stoksblm + $produk->stok;
            var_dump($produk->stok);
            $produk->update();
            $this->flashSession->success("Pembelian berhasil diedit"); 
            $this->response->redirect('/admin/list-pembelian');
        }
        else{
            $this->response->redirect('/admin/list-pembelian');
        }
    }

    public function addPenjualanAction(){
        $penjualan = new Transaksi();
        $penjualan->id_produk = $this->request->getPost('id_produk');
        $penjualan->jumlah = $this->request->getPost('jumlah');
        $penjualan->tanggal = $this->request->getPost('tanggal');
        $penjualan->flag = 1;
        $beli = Produk::findFirst("id='$penjualan->id_produk'");
        if($beli->stok - $penjualan->jumlah < 0 ){
            $this->flashSession->success("Stok Produk habis"); 
            $this->response->redirect('/admin/list-penjualan');
        }
        else{
            if($penjualan->save()){
                $beli->stok = $beli->stok - $penjualan->jumlah;
                $beli->update();
                $this->flashSession->success("Penjualan berhasil ditambahkan"); 
                $this->response->redirect('/admin/list-penjualan');
            }
            else{
                $this->response->redirect('/admin/list-pembelian');
            }
        }
    }

    public function editPenjualanAction(){
        $id = $this->request->getPost('id');
        $penjualan = Transaksi::findFirst("id='$id'");
        $stoksblm = $penjualan->jumlah;
        $penjualan->id_produk = $this->request->getPost('id_produk');
        $penjualan->jumlah = $this->request->getPost('jumlah');
        $penjualan->tanggal = $this->request->getPost('tanggal');
        $idpro = $penjualan->id_produk;
        $produk = Produk::findFirst("id='$idpro'");
        $produk->stok = $stoksblm + $produk->stok - $penjualan->jumlah;
        if($produk->stok < 0){
            $this->flashSession->success("Stok Produk habis"); 
            $this->response->redirect('/admin/list-penjualan');
        }
        else{
            if($penjualan->update()){
                $produk->update();
                $this->flashSession->success("Penjualan berhasil diedit"); 
                $this->response->redirect('/admin/list-penjualan');
            }
            else{
                $this->response->redirect('/admin/list-penjualan');
            }
        }
    }
}