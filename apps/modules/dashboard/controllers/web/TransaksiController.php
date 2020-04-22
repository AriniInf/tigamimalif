<?php

namespace Phalcon\Init\Dashboard\Controllers\Web;

use Phalcon\Mvc\Controller;
use Phalcon\Mvc\Dispatcher;
use Phalcon\Init\Dashboard\Models\Produk;
use Phalcon\Init\Dashboard\Models\Transaksi;
use Phalcon\Http\Request;
use Phalcon\Events\Manager as EventsManager;


class TransaksiController extends Controller
{
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
            $this->response->redirect('/admin/list-pembelian');
        }
        else{
            $this->response->redirect('/admin/list-pembelian');
        }
    }

    public function deletePembelianAction($id){
        $this->db->query("DELETE Transaksi Where id='$id'");
        $this->response->redirect('/admin/list-pembelian');

    }

    public function addPenjualanAction(){
        $penjualan = new Transaksi();
        $penjualan->id_produk = $this->request->getPost('id_produk');
        $penjualan->jumlah = $this->request->getPost('jumlah');
        $penjualan->tanggal = $this->request->getPost('tanggal');
        $penjualan->flag = 1;
        $beli = Produk::findFirst("id='$penjualan->id_produk'");
        if($beli->stok - $penjualan->jumlah < 0 ){
            echo "Stok habis";
        }
        else{
            if($penjualan->save()){
                $beli->stok = $beli->stok - $penjualan->jumlah;
                $beli->update();
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
            echo "Stok habis";
        }
        else{
            if($penjualan->update()){
                $produk->update();
                $this->response->redirect('/admin/list-penjualan');
            }
            else{
                $this->response->redirect('/admin/list-penjualan');
            }
        }
    }

}


