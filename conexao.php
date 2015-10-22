<?php
include_once '_classes/Cliente.class.php';
//include_once '_classes/Conexao.class.php';

$dbhost = getenv('OPENSHIFT_MYSQL_DB_HOST');
$dbport = getenv('OPENSHIFT_MYSQL_DB_PORT');
$dbuser = getenv('OPENSHIFT_MYSQL_DB_USERNAME');
$dbpass = getenv('OPENSHIFT_MYSQL_DB_PASSWORD');
$dbname = getenv('OPENSHIFT_GEAR_NAME');
$dsn = 'mysql:dbname='.$dbname.';host='.$dbhost.';port='.$dbport;
try {
    $dsn = 'mysql:dbname='.$dbname.';host='.$dbhost.';port='.$dbport;
    $dbh = new PDO($dsn, $dbuser, $dbpass);
    } catch (Exception $ex) {
        echo 'Erro ao conectar ao banco <br>'.$ex->getMessage();
}
$cliente = new Cliente($dbh);
$cliente->setId(1)
        ->setNome("Rafael Ribeiro")
        ->setEmail("rafael@fael.com");

$cliente->inserir();
foreach ($cliente->listar() as $c){
    echo $c['nome'].'<br>';
}