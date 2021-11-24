<?php
    require_once "./libs/smarty/libs/Smarty.class.php";

    class viewComponentes{

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

    function showComponentes($data,$datoGabinete){
        $this->smarty->assign('dcomponentes',$data);
        $this->smarty->assign('dgabinete',$datoGabinete);
        $this->smarty->display('templates/componentes.tpl');       
    }
    
        
    function showVerMas($data){
        $this->smarty->assign('datos',$data);
        $this->smarty->display('templates/verDetalleComponentes.tpl');
    }
    
    function mostrarKitAeditar($dato,$datoGabinete){
        $this->smarty->assign('dcomponente',$dato);
        $this->smarty->assign('marcas',$datoGabinete);
        $this->smarty->display('templates/editarComponente.tpl');
    }

    function locationKit(){
        header("Location: ".BASE_URL."kit");
    }

        
    function mostrarError($mensaje = "" ){
        $this->smarty->assign("mensajeError",$mensaje);
        $this->smarty->display('templates/errorIngresos.tpl');
    }

    function verComentarios($dato) {      
        $this->smarty->assign('kits', $dato); 
        $this->smarty->display('templates/comentariosKits.tpl');
    }
        
        
        
}