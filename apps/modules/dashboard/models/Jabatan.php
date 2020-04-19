<?php

namespace Phalcon\Init\Dashboard\Models;

use Phalcon\Mvc\Model;
//use Phalcon\Init\Dashboard\Models\Logs;

class Jabatan extends Model
{
	public function initialize()
    {
        $this->setSource('Jabatan');
    }
    public $id;
    public $jabatan;
}
