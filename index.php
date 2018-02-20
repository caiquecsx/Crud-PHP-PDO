<?php 
    
    define('ROOT_PATH', dirname(__FILE__));
    require_once './DAO/UsuarioDAO.php';
    require_once './Model/Usuario.php';

    $usuarioDAO = UsuarioDAO::getInstance();

    //$usuarioDAO->Inserir(new Usuario());
    //$usuarioDAO->Delete(new Usuario());
    //$usuarioDAO->Update('Caique',2);
    //$usuarioDAO->Select();
?>
