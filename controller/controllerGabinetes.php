<?php
   require_once "./view/viewGabinetes.php";
   require_once "./model/modelGabinete.php";
   require_once "./model/modelKit.php";


class controllerGabinetes{

   private $view;
   private $modelGabinete;
   private $modelKit;

   function __construct() {
       $this->view = new viewGabinetes();
       $this->modelGabinete = new modelGabinete();
       $this->modelKit = new modelKit();
   }
   
    function home(){
      $this->view->ShowHome();
    }
   

   function gabinetes(){
      $data = $this->modelGabinete->getGabinetes();
       $this->view->showGabinetes($data);
      }
   
 
   function borrarGabinete($params = null){
         $id = $params[':ID'];
         $this->modelGabinete->deleteGabinete($id);
         $this->view->locationGabinetes();
 
   } 

      function agregarGabinete(){
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
                var_dump("Faltan datos obligatorios");        
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
         $id = $params[':ID'];
         $data = $this->modelGabinete->seleccionarGabinete($id);
         $this->view->verGabineteAEditar($data);
      }
      
      function editGabinete(){
         if(isset($_POST['id']) && isset($_POST['nombre']) && isset($_POST['marca']) && isset($_POST['gamer'])) {
            if(!empty($_POST['id']) && !empty($_POST['nombre']) && !empty($_POST['marca']) && !empty($_POST['gamer'])){
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
}