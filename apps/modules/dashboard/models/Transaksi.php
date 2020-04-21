<?php

namespace Phalcon\Init\Dashboard\Models;

use Phalcon\Mvc\Model;


class Transaksi extends Model
{
	public function initialize()
    {
        $this->setSource('Transaksi');
    }

    public $id;
    public $id_produk;
    public $flag;
    public $jumlah;
    
}