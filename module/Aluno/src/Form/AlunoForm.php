<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Aluno\Form;

use Zend\Form\Form;
use Zend\Form\Element\Hidden;
use Zend\Form\Element\Text;
use Zend\Form\Element\Email;
use Zend\Form\Element\Submit;

class AlunoForm extends Form {
    
    public function __construct() {
        parent::__construct('aluno', []);
        
        $this->add(new Hidden('idaluno'));
        $this->add(new Text('firstname', ['label'=>'Nome']));
        $this->add(new Text('lastname', ['label'=>'Sobrenome']));
        $this->add(new Text('password', ['label'=>'Senha']));
        $this->add(new Email('email', ['label'=>'email']));
        
        $submit = new Submit('submit');
        $submit->setAttributes(['value'=>'Salvar','id'=>'submitbutton']);
        $this->add($submit);
        
        
    }
    
}
