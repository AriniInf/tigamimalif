<?php

namespace Phalcon\Init\Dashboard\Form;

use Phalcon\Forms\Form;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\Password;
use Phalcon\Forms\Element\Submit;
use Phalcon\Forms\Element\Check;

use Gelarapps\Common\Web\Form\BaseForm;
use Gelarapps\Common\Web\Validator\LoginValidation;

class LoginForm extends BaseForm {
    public function initialize()
    {
        $this->add(
            new Text(
                'username',
                [
                    'placeholder' => 'Username',
                    'class'       => 'zmdi zmdi-account material-icons-name'
                ]
            )
        );


        $this->add(
            new Password(
                'password',
                [
                    'placeholder' => 'Password',
                    'class'       => 'zmdi zmdi-lock'
                ]
            )
        );

        $cek = (
            new Check(
                'remember',
                [
                    'value' => 0,
                ]
            )
        );
        // $cek->setLabel('Ingat saya');
        // $this->add($cek);


        $this->add(
            new Submit (
                'Login',
                [
                    'name' => 'signin',
                    "class" => "form-submit"

                ]
            )
        );
        
        $this->setUserOptions([
            'method'=> 'POST',
            'class' => 'register-form'
        ]);

    //    $this->setValidation(new LoginValidation());
        
    }
}