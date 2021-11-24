<?php
    require_once "./libs/smarty/libs/Smarty.class.php";

    class viewGabinetes{

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

        function showGabinetes($resultado){
            $this->smarty->assign('dgabinetes',$resultado);
            $this->smarty->display('templates/gabinetes.tpl');
        }
        
        
        function showKitAsociados($data,$cantidad){
            $this->smarty->assign('dcompAsoc',$data);
            $this->smarty->assign('cantidad',$cantidad);
            $this->smarty->display('templates/kitAsociados.tpl');
        }
    
        function verGabineteAEditar($data){
            $this->smarty->assign('edit',$data);
            $this->smarty->display('templates/editarGabinete.tpl');
        }
        
        function ShowHome(){        
            $this->smarty->display('templates/home.tpl');
        }

        function locationGabinetes(){
            header("Location: ".BASE_URL."gabinetes");
        }
        
        
        function mostrarError($mensaje = "" ){
            $this->smarty->assign("mensajeError",$mensaje);
            $this->smarty->display('templates/errorIngresos.tpl');
        }

        function mostrarComentarios($id,$data){
            $this->smarty->assign("id",$id);
            $this->smarty->assign("gabinete",$data);
            $this->smarty->display("templates/verComentarios.tpl");
        }

        
    }
    