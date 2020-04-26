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
        // $this->view->disable();
        
    }
    
    
}