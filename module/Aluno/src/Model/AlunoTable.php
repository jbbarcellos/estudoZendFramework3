<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Aluno\Model;

use Zend\Db\TableGateway\TableGatewayInterface;
use RuntimeException;

class AlunoTable {
    
    private $tableGateway;
    
    public function __construct(TableGatewayInterface $tableGateway){
        $this->tableGateway = $tableGateway;
    }
    
    public function getAll(){
        return $this->tableGateway->select();
    }
    
    public function getAluno($idaluno){
        $idaluno = (int) $idaluno;
        $rowset = $this->tableGateway->select(['idaluno' => $idaluno]);
        $row = $rowset->current();
        if(!$row){
            throw new RuntimeException(sprintf('Não foi encontrado o id %d,$idaluno'));
        }
        return $row;
    }
    
    public function saveAluno(Aluno $aluno){
        $data = [
            'idaluno' => $aluno->getIdAluno(),
            'firstname' => $aluno->getFirstname(),
            'lastname' => $aluno->getLastname(),
            'email' => $aluno->getEmail(),
            'password' => $aluno->getPassword(),
        ];
        
        $idaluno = (int) $aluno->getIdAluno();
        if ($idaluno === 0){
            $this->tableGateway->insert($data);
            return;
        }
        $this->tableGateway->update($data,['idaluno'=>$idaluno]);
    }
    
    public function deleteAluno($idaluno){
        $this->tableGateway->delete(['idaluno'=> (int) $idaluno]);
    }
    
}