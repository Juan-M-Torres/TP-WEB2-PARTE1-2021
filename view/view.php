<?php
    require_once "./libs/smarty/libs/Smarty.class.php";

    
class view{

    function __construct(){
        $this->smarty = new Smarty();      
    }



    function ShowHome(){
        
        $this->smarty->display('templates/home.tpl');
    }

    function showComponentes($data){

        $this->smarty->assign('dcomponentes',$data);
        $this->smarty->display('templates/componentes.tpl');
       
    }

    function showGabinetes($data){
        $this->smarty->assign('dgabinetes',$data);
        $this->smarty->display('templates/gabinetes.tpl');
    }

    function locationComponentes(){
        header("Location: ".BASE_URL."componentes");
    }
    function locationGabinetes(){
        header("Location: ".BASE_URL."gabinetes");
    }

}