<?php
    require_once "./libs/smarty/libs/Smarty.class.php";
    
class viewComponentes{
    private $smarty;

    function __construct(){
        $this->smarty = new Smarty();   
        if(session_status() !== PHP_SESSION_ACTIVE){
            session_start();
        }
        if(isset($_SESSION['email'])){
            $this->smarty->assign('nombre', $_SESSION['email']);
        }       
    }

    function showComponentes($data,$datoGabinete){
        $this->smarty->assign('dcomponentes',$data);
        $this->smarty->assign('dgabinete',$datoGabinete);
        $this->smarty->display('templates/componentes.tpl');
    }

    function showComponentesB($data){
        $this->smarty->assign('dcomponentes',$data);
        $this->smarty->display('templates/componentesB.tpl'); 
    }

    function showVerMas($data){
        $this->smarty->assign('datos',$data);
        $this->smarty->display('templates/verDetalleComponentes.tpl');
    }
    
    function mostrarComponenteAeditar($dato,$datoGabinete){
        $this->smarty->assign('dcomponente',$dato);
        $this->smarty->assign('marcas',$datoGabinete);
        $this->smarty->display('templates/editarComponente.tpl');
    }

    function mostrarError($mensaje = "" ){
        $this->smarty->assign("mensajeError",$mensaje);
        $this->smarty->display('templates/errorIngresos.tpl');
    }

    function locationComponentes(){
        header("Location: ".BASE_URL."componentes");
    }
}