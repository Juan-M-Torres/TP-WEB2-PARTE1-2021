<?php
    require_once "./libs/smarty/libs/Smarty.class.php";

    
class view{

    function __construct(){
        $this->smarty = new Smarty();      
    }



    function ShowHome(){
        
        $this->smarty->display('templates/home.tpl');
    }

    function showComponentes($data,$datoGabinete){

        $this->smarty->assign('dcomponentes',$data);
        $this->smarty->assign('dgabinete',$datoGabinete);
        $this->smarty->display('templates/componentes.tpl');
       
    }

    function showGabinetes($data){
        $this->smarty->assign('dgabinetes',$data);
        $this->smarty->display('templates/gabinetes.tpl');
    }


    function showComponentesAsociados($data,$cantidad){
        $this->smarty->assign('dcompAsoc',$data);
        $this->smarty->assign('cantidad',$cantidad);
        $this->smarty->display('templates/componentesAsociados.tpl');
    }
    
    function showVerMas($data){
        $this->smarty->assign('datos',$data);
        $this->smarty->display('templates/verDetalleComponentes.tpl');
    }

    function verGabineteAEditar($data){
        $this->smarty->assign('edit',$data);
        $this->smarty->display('templates/editarGabinete.tpl');
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
    function locationGabinetes(){
        header("Location: ".BASE_URL."gabinetes");
    }
}