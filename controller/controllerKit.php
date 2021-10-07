<?php
    require_once "./view/view.php";
    require_once "./model/modelKit.php";
    require_once "./model/modelGabinete.php";


 class controllerKit{
 
    private $view;
    private $modelKit;
    private $modelGabinete;

    function __construct() {
        $this->view=new view();
        $this->modelKit=new modelKit();
        $this->modelGabinete=new modelGabinete();
    }

     function home(){

       $this->view->ShowHome();
     }

     function kit(){

      $data = $this->modelKit->getKit();
      $datoGabinete = $this->modelGabinete->getGabinetes();
      $this->view->showComponentes($data,$datoGabinete);
     }

     function borrarKit($params = null){
         $id = $params[':ID'];
         $this->modelKit->deleteKit($id);
         $this->view->locationKit();
     }

     function agregarKit(){
      
      if(isset($_POST['micro']) && isset($_POST['mother']) && isset($_POST['ram']) && isset($_POST['gamer']) && isset($_POST['descripcion'])) {
         if(!empty($_POST['micro']) && !empty($_POST['mother']) && !empty($_POST['ram']) && !empty($_POST['gamer']) && !empty($_POST['descripcion'])){
            if(is_numeric($_POST['ram'])){
            $dMicro = $_POST['micro'];
            $dMother = $_POST['mother'];
            $dRam = $_POST['ram'];
            $dGamer = $_POST['gamer'];
            $dDescripcion = $_POST['descripcion'];
            
            $this->modelKit->addKit($dMicro,$dMother,$dRam,$dGamer,$dDescripcion);
            $this->view->locationKit();
         }else{
            $this->view->mostrarError("Ingreso un  caracteres");
         }
         }else{
            $this->view->mostrarError("Faltan caracteres");
         }
      }
     }

     function verMas($params = null){
        $id = $params[':ID'];
        $data = $this->modelKit->obtenerDatosKit($id);
        $this->view->showVerMas($data);
     }

     function editarKit($params = null){
        $id = $params[':ID'];
        $data = $this->modelKit->obtenerDatosDelKit($id);
        $datoGabinete = $this->modelGabinete->getGabinetes();
        $this->view->mostrarKitAeditar($data,$datoGabinete);
     }

     function editKit(){
      if(isset($_POST['id']) && isset($_POST['micro']) && isset($_POST['mother']) && isset($_POST['ram']) && isset($_POST['gamer']) && isset($_POST['descripcion'])) {
         if(!empty($_POST['id']) && !empty($_POST['micro']) && !empty($_POST['mother']) && !empty($_POST['ram']) && !empty($_POST['gamer']) && !empty($_POST['descripcion'])){
            if(is_numeric($_POST['ram'])){
               $editMicro = $_POST['micro'];
               $editMother = $_POST['mother'];
               $editRam = $_POST['ram'];
               $editGamer = $_POST['gamer'];
               $editDescripcion = $_POST['descripcion'];
               $editId = $_POST['id'];
               
               $this->modelKit->editarElKit($editMicro,$editMother,$editRam,$editGamer,$editDescripcion,$editId);
               $this->view->locationKit(); 
            }else{
               $this->view->mostrarError("Ingreso caracteres");
         }
         }else{
            $this->view->mostrarError("Faltan caracteres");
         }
      
      }
   }  
     
}


    
