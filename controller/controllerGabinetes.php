<?php
   require_once "./view/view.php";
   require_once "./model/modelGabinetes.php";
   require_once "./model/modelComponentes.php";


class controllerGabinetes{

   private $view;
   private $modelGabinetes;
   private $modelComponentes;

   function __construct() {
       $this->view=new view();
       $this->modelGabinetes=new modelGabinetes();
       $this->modelComponentes=new modelComponentes();
   }

    function home(){

      $this->view->ShowHome();
    }
   
   function gabinetes(){
      
       $data = $this->modelGabinetes->getGabinetes();
       $this->view->showGabinetes($data);
      }
 
   function borrarGabinetes($params = null){
 
         $id = $params[':ID'];
         $this->modelGabinetes->deleteGabinetes($id);
         $this->view->locationGabinetes();
 
   } 

      function agregarGabinetes(){
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
                $this->modelGabinetes->agregarGabinete($marcaAgre,$nombreAgre,$gamerAgre);
                $this->view->locationGabinetes();     
            }else{
                var_dump("Faltan datos obligatorios");        
            }
         }
      }

      function verComponentesAsociados($params = null){
         $id = $params[':ID'];
         $data = $this->modelComponentes->VerComponentesAsociadosAgabinete($id);
         $cantidad = count($data);
         $this->view->showComponentesAsociados($data,$cantidad);
        }

}