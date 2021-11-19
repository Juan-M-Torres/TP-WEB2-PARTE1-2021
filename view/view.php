<?php
    require_once "./libs/smarty/libs/Smarty.class.php";

    
class view{

    function __construct(){
        $this->smarty = new Smarty();     
        if(session_status() !== PHP_SESSION_ACTIVE){
            session_start();
        }
        if(isset($_SESSION['email'])){
            $this->smarty->assign('nombre', $_SESSION['email']);
        }
        if(isset($_SESSION['rol'])){
            if($_SESSION['rol'] == 1){
                $this->smarty->assign('admin', $_SESSION['rol']);
            }
        }                  
    }

    function ShowHome(){        
        $this->smarty->display('templates/home.tpl');
    }

    function showComponentes($data,$datoGabinete){
        $this->smarty->assign('dcomponentes',$data);
        $this->smarty->assign('dgabinete',$datoGabinete);
        $this->smarty->display('templates/componentes.tpl');       
    }

    function showGabinetes($resultado, $paginas){
        $this->smarty->assign('dgabinetes',$resultado);
        $this->smarty->assign('paginas',$paginas);
        $this->smarty->display('templates/gabinetes.tpl');
    }


    function showKitAsociados($data,$cantidad){
        $this->smarty->assign('dcompAsoc',$data);
        $this->smarty->assign('cantidad',$cantidad);
        $this->smarty->display('templates/kitAsociados.tpl');
    }
    
    function showVerMas($data){
        $this->smarty->assign('datos',$data);
        $this->smarty->display('templates/verDetalleComponentes.tpl');
    }

    function verGabineteAEditar($data){
        $this->smarty->assign('edit',$data);
        $this->smarty->display('templates/editarGabinete.tpl');
    }

    function mostrarKitAeditar($dato,$datoGabinete){
        $this->smarty->assign('dcomponente',$dato);
        $this->smarty->assign('marcas',$datoGabinete);
        $this->smarty->display('templates/editarComponente.tpl');
    }

    function mostrarError($mensaje = "" ){
        $this->smarty->assign("mensajeError",$mensaje);
        $this->smarty->display('templates/errorIngresos.tpl');
    }

    function locationKit(){
        header("Location: ".BASE_URL."kit");
    }
    function locationGabinetes(){
        header("Location: ".BASE_URL."gabinetes?pagina=1");
    }
    
    function showLoginLocation(){
        header("Location: ".BASE_URL."login");
    }

    function mostrarComentarios($id){
        $this->smarty->assign("id",$id);
        $this->smarty->display("templates/verComentario.tpl");
    }
}