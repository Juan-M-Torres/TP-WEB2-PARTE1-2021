<?php
    require_once "./libs/smarty/libs/Smarty.class.php";

    class viewAdmins{

        function __construct(){
            $this->smarty = new Smarty();     
            if(session_status() !== PHP_SESSION_ACTIVE){
                session_start();
            }
            if(isset($_SESSION['email'])){
                $this->smarty->assign('nombre', $_SESSION['email']);
            }else if(isset($_SESSION['email_admin'])){
                $this->smarty->assign('Administrador', $_SESSION['email_admin']);
            }                
        }
        
        function showAdministradores($dato){
            $this->smarty->assign('usuarios', $dato); 
            $this->smarty->display('templates/tablaAdministradores.tpl');
        }
    
        function confirmarEliminacion($id_usuario,$dato){
            $this->smarty->assign('administradorABorrar', $dato);
            $this->smarty->assign('administradorABorrar', $id_usuario); 
            $this->smarty->display('templates/tablaAdministradores.tpl');
        }


        function locationAdministrador(){
            header("Location: ".BASE_URL."tablaAdmin");        
        }
    }