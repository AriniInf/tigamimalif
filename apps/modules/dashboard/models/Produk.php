<?php

namespace Phalcon\Init\Dashboard\Models;

use Phalcon\Mvc\Model;


class Produk extends Model
{
	public function initialize()
    {
        $this->setSource('Produk');
    }

    public $id;
    public $id_kategori;
    public $nama;
    public $stok;
    
}