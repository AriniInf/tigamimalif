<?php


namespace Phalcon\Init\Dashboard\Form;

use Phalcon\Forms\Form;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\Email;
use Phalcon\Forms\Element\Password;
use Phalcon\Forms\Element\Submit;

use Phalcon\Tag;

class SignupForm extends Form {
    public function initialize(){
        $username = new Text ('username',
        [
            "placeholder" => "Enter Username",
            'class' => 'form-control'
        ]);

        $email = new Email ('email',
        [
            "placeholder" => "Enter email address",
            'class' => 'form-control'
        ]);

        $password = new password ('password',
        [
            "placeholder" => "Enter password",
            'class' => 'form-control'
        ]);

        $nama = new Text('nama',
        [
            "placeholder" => 'Enter Name',
            'class' => 'form-control'
        ]);
        $nohp = new Text('nohp',
        [
            "placeholder" => 'Enter Phone number',
            'class' => 'form-control'
        ]);

        $alamat = new Text('alamat',
        [
            "placeholder" => 'Enter Address',
            'class' => 'form-control'
        ]);

        $submit = new Submit ('Register',
    [
        'class' => 'btn btn-primary'
    ]);
        
        $this->setUserOptions([
            'method'=> 'POST',
            'class' => 'signupForm'
        ]);

        $this->add($username);
        $this->add($email);
        $this->add($password);
        $this->add($nama);
        $this->add($nohp);
        $this->add($alamat);

        $this->add($submit);
    }

    public function rendering($nameForm){
        return $this->render($nameForm);
    }

    public function startForm(){
        return Tag::form($this->getUserOptions());
    }

    public function endForm(){
        return Tag::endForm();
    }
}
