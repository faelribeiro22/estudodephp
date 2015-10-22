<?php
include_once '_classes/Cliente.class.php';
include_once '_classes/Conexao.class.php';

$bd = new Conexao();
$cliente = new Cliente($bd);
$cliente->setId(1)
        ->setNome("Rafael Ribeiro")
        ->setEmail("rafael@fael.com");

//$cliente->inserir();
foreach ($cliente->listar() as $c){
    echo $c['nome'].'<br>';
}