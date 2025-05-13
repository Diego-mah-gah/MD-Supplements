<?php
class index {
    public $name;
    public $age;
    private $cpf;
    private $email;
    private $phone;

    public function getName(){
        return $this->name;
    }
    public function setName($name){
    $this->name = $name;
    }
    public function setAge($age){
        $this->age = $age;
    }
    public function setcpf($cpf){
        $this->cpf = $cpf;
    }
    public function setEmail($email){
        $this->email = $email;
    }
    public function setPhone($phone){
        $this->phone = $phone;
    }
    public function __construct($name, $age, $cpf, $email, $phone){
        $this->name = $name;
        $this->age = $age;
        $this->cpf = $cpf;
        $this->email = $email;
        $this->phone = "";
    }
    
    
}
