<?php

namespace Phalcon\Init\Dashboard\Models;

use Phalcon\Mvc\Model;


class Kategori extends Model
{
	public function initialize()
    {
        $this->setSource('Kategori');
    }

    public $id;
    public $nama;
    public $deskripsi;
    
}