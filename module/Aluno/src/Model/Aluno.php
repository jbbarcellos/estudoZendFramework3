<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Aluno\Model;

use Zend\Stdlib\ArraySerializableInterface;

class Aluno implements ArraySerializableInterface
{
    /**
    * @var int
    */
    private $idaluno;

    /**
    * @var string
    */
    private $firstname;

    /**
    * @var string
    */
    private $lastname;		

    /**
    * @var string
    */
    private $email;

    /**
    * @var string
    */
    private $password;
    
    public function exchangeArray (array $data){
        $this->idaluno = !empty($data['idaluno']) ? $data['idaluno']:NULL;
        $this->firstname = !empty($data['firstname']) ? $data['firstname']:NULL;
        $this->lastname = !empty($data['lastname']) ? $data['lastname']:NULL;
        $this->email = !empty($data['email']) ? $data['email']:NULL;
        $this->password = !empty($data['password']) ? $data['password']:NULL;
    }

    /**
     * @return int
     */
    public function getIdAluno()
    {
        return $this->idaluno;
    }
    
    /**
     * @param int $idaluno
     *
     * @return self
     */
    public function setIdAluno($idaluno)
    {
        $this->idaluno = $idaluno;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getFirstname()
    {
        return $this->firstname;
    }
    
    /**
     * @param string $firstname
     *
     * @return self
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getLastname()
    {
        return $this->lastname;
    }
    
    /**
     * @param string $lastname
     *
     * @return self
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }
    
    /**
     * @param string $email
     *
     * @return self
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }
    
    /**
     * @param string $password
     *
     * @return self
     */
    public function setPassword($password)
    {
        $this->password = $password;
        return $this;
    }

    public function getArrayCopy() {
        return[
            'idaluno' => $this->idaluno,
            'firstname' => $this->firstname,
            'lastname' => $this->lastname,
            'email' => $this->email,
            'password' => $this->password
        ];
    }

}