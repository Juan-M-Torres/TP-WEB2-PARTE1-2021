<?php

    require_once "./helpers/authHelper.php";
    require_once "./view/viewGabinetes.php";
    require_once "./model/modelGabinete.php";
    require_once "./model/modelKit.php";

class controllerGabinetes{

    private $view;
    private $modelGabinete;
    private $modelKit;
    private $authHelper; 
 
    function __construct() {
        $this->view = new viewGabinetes();
        $this->modelGabinete = new modelGabinete();
        $this->modelKit = new modelKit();
        $this->authHelper = new AuthHelper();
    }
 
    
    function home(){
       $this->view->ShowHome();
    }
    
 
    function gabinetes(){
        $data = $this->modelGabinete->getGabinetes(); 
        $this->view->showGabinetes($data);
    } 

    function borrarGabinete($params = null){
        $this->authHelper->checkLoggedIn();
        $id = $params[':ID'];
        $this->modelGabinete->deleteGabinete($id);
        $this->view->locationGabinetes(); 
    } 

    function agregarGabinete(){
        $this->authHelper->checkLoggedIn();
        if(isset($_POST['nombre']) && isset($_POST['marca']) && isset($_POST['gamer'])) {
           if(!empty($_POST['nombre']) && !empty($_POST['marca']) && !empty($_POST['gamer'])){

                $nombreAgre = $_POST['nombre'];
                 $marcaAgre = $_POST['marca'];
                 $gamerAgre = $_POST['gamer'];
                 if($gamerAgre == "si"){
                    $gamerAgre = 1;
                 }else{
                    $gamerAgre = 0;
                 }
                 
                 
  
                 $this->modelGabinete->agregarGabinete($marcaAgre,$nombreAgre,$gamerAgre);
                 $this->view->locationGabinetes();           
           }else{
            $this->view->mostrarError("Faltan datos obligatorios");        
           }
        }
        
     }

    

    function verKitsAsociados($params = null){
        $id = $params[':ID'];
        $data = $this->modelKit->VerKitAsociadosAgabinete($id);
        $cantidad = count($data);
        $this->view->showKitAsociados($data,$cantidad);
    }

    function editarGabinete($params = null){
        $this->authHelper->checkLoggedIn();
        $id = $params[':ID'];
        $data = $this->modelGabinete->seleccionarGabinete($id);
        $this->view->verGabineteAEditar($data);
    }

    function editGabinete(){
        $this->authHelper->checkLoggedIn();
        if(isset($_POST['id']) && isset($_POST['nombre']) && isset($_POST['marca'])) {
           if(!empty($_POST['id']) && !empty($_POST['nombre']) && !empty($_POST['marca'])){
               $nombreEdit = $_POST['nombre'];
               $marcaEdit = $_POST['marca'];
               $gamerEdit = $_POST['gamer'];
               $idEdit = $_POST['id'];
               if($gamerEdit == "si"){
                 $gamerEdit = 1;
               }else{
                  $gamerEdit = 0;
               }


                
            
              $this->modelGabinete->editarElgabinete($marcaEdit,$nombreEdit,$gamerEdit,$idEdit);
               
               $this->view->locationGabinetes(); 
           }else{
               $this->view->mostrarError("Faltan caracteres");       
           }
        }
    }

    function mostrarComentarios($params = null){
        $id = $params[':ID'];
        $data = $this->modelGabinete->seleccionarGabinete($id);
        $this->view->mostrarComentarios($id,$data);
    }

    
}

