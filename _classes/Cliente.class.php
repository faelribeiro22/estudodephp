<?php

class Cliente
{
    private $db;
    private $nome;
    private $email;
    private $id;
    
    

    public function __construct($db) {
        $this->db = $db;
    }

    public function listar(){
        
        $query = 'SELECT * FROM clientes';
        $stmt = $this->db->query($query);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
    
    public function inserir(){
        $query = "INSERT INTO clientes(nome,email) VALUES(:nome, :email)";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':nome',  $this->getNome());
        $stmt->bindValue(':email', $this->getEmail());
        
        if($stmt->execute()){
            return true;
        }
        
    }
    
    public function alterar(){
        $query = "UPDATE clientes SET nome=:nome, email=:email WHERE id=:id";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':id', $this->getId());
        $stmt->bindValue(':nome',  $this->getNome());
        $stmt->bindValue(':email', $this->getEmail());
        
        if($stmt->execute()){
            return true;
        }
    }
    
    public function deletar($id){
        $query = "DELETE FROM clientes WHERE id=:idP";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':id', $id);
        
        if($stmt->execute()){
            return true;
        }
    }
    
    public function setNome($nome){
        $this->nome = $nome;
        return $this;
    }

    public function getNome(){
                
        return $this->nome;
    }
    
    public function setEmail($email){
        $this->email = $email;
        return $this;
    }
    
    public function getEmail(){
        return $this->email;
    }
    
    public function setId($id){
        $this->id = $id;
        return $this;
    }
    
    public function getId(){
        return $this->id;
    }
}