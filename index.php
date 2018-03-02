<?php


require_once("config.php");

//carrega um usuario
//$root = new usuario();
//$root->loadbyID(5);

//echo $root;

//$sql = new Sql();

//$usuarios = $sql->select("select * from tb_usuarios");

//echo json_encode($usuarios);
//carrega vários usuários
//$lista = usuario::getList();

//echo json_encode($lista);
//carrega uma lista de usuarios buscando pelo login

//$search = usuario::search("le");

//echo json_encode($search);


//Carrega um usuário usando login e a senha

$usuario = new usuario();
$usuario->login("Alexandre","12fd3");

echo $usuario;
?>