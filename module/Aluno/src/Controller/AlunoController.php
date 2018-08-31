<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Aluno\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Aluno\Form\AlunoForm;
use Aluno\Model\Aluno;

class AlunoController extends AbstractActionController
{
    private $table;
    
    public function __construct($table) {
        $this->table = $table;
    }

    public function indexAction()
    {
        return new ViewModel(['alunos' => $this->table->getAll()]);
    }
    
    public function addAction()
    {
        $form = new AlunoForm();
        
        $request = $this->getRequest();
        if(!$request->isPost()){
            return new ViewModel(['form'=>$form]);
        }
        
        $aluno = new Aluno();
        $form->setData($request->getPost());
        
        if(!$form->isValid()){
            return new ViewModel(['form'=>$form]);
        }
        
        $aluno->exchangeArray($form->getData());
        $this->table->saveAluno($aluno);

        return $this->redirect()->toRoute('aluno');
    }
    
    public function editAction()
    {
        $idAluno= (int) $this->params()->fromRoute('id',0);
        //print_r($idAluno);
        //die;
        if(0 === $idAluno){
            return $this->redirect()->toRoute('aluno', ['action'=>'add']);
        }
        
        try {
            $aluno = $this->table->getAluno($idAluno);
        } catch (Exception $ex) {
            return $this->redirect()->toRoute('aluno', ['action'=>'index']);
        }
        
        $form = new AlunoForm();
        $form->bind($aluno);
        $form->get('submit')->setAttribute('value', 'salvar');
        $request = $this->getRequest();
        $viewData = ['id'=>$idAluno, 'form'=>$form];
        if(!$request->isPost()){
            return new ViewModel($viewData);
        }
        
        $form->setData($request->getPost());
        
        if(!$form->isValid()){
            return new ViewModel($viewData);
        }
        //$aluno->exchangeArray($form->getData());
        $this->table->saveAluno($form->getData());

        return $this->redirect()->toRoute('aluno');
    }
    
    public function deleteAction()
    {
        $idAluno = (int) $this->params()->fromRoute('id',0);
        //print_r($idAluno);
        //die;
        if(0 === $idAluno){
            return $this->redirect()->toRoute('aluno');
        }
        
        $request = $this->getRequest();
        
        if($request->isPost()){
            //print_r($request);
            //die;
            $del = $request->getPost('del','Não');
            if($del == 'Sim'){
                $idAluno = $request->getPost();
                //print_r($idAluno['id']);
                //die;
                $this->table->deleteAluno($idAluno['id']);
            }
            return $this->redirect()->toRoute('aluno');
        }
        
        return new ViewModel(['id'=>$idAluno, 'aluno'=> $this->table->getAluno($idAluno)]);
        
        
        
        
        
    }
    
}
