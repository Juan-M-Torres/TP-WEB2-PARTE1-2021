<?php
    require_once "./view/view.php";
    require_once "./model/modelComponentes.php";
    require_once "./model/modelGabinetes.php";


 class controllerComponentes{
 
    private $view;
    private $modelComponentes;
    private $modelGabinetes;

    function __construct() {
        $this->view=new view();
        $this->modelComponentes=new modelComponentes();
        $this->modelGabinetes=new modelGabinetes();
    }

     function home(){

       $this->view->ShowHome();
     }

     function componentes(){

      $data = $this->modelComponentes->getComponentes();
      $datoGabinete = $this->modelGabinetes->getGabinetes();
      $this->view->showComponentes($data,$datoGabinete);
     }

     function borrarComponente($params = null){

        $id = $params[':ID'];
        $this->modelComponentes->deleteComponente($id);
        $this->view->locationComponentes();

     }

     function agregarComponentes(){
      
      if(isset($_POST['micro']) && isset($_POST['mother']) && isset($_POST['ram']) && isset($_POST['gamer']) && isset($_POST['descripcion'])) {
         if(!empty($_POST['micro']) && !empty($_POST['mother']) && !empty($_POST['ram']) && !empty($_POST['gamer']) && !empty($_POST['descripcion'])){
            if(is_numeric($_POST['ram'])){
            $dMicro = $_POST['micro'];
            $dMother = $_POST['mother'];
            $dRam = $_POST['ram'];
            $dGamer = $_POST['gamer'];
            $dDescripcion = $_POST['descripcion'];
            
            $this->modelComponentes->addComponente($dMicro,$dMother,$dRam,$dGamer,$dDescripcion);
            $this->view->locationComponentes();
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
        $data = $this->modelComponentes->obtenerDatosComponentes($id);
        $this->view->showVerMas($data);
     }

     function editarComponente($params = null){
        $id = $params[':ID'];
        $data = $this->modelComponentes->obtenerDatosDelComponente($id);
        $datoGabinete = $this->modelGabinetes->getGabinetes();
        $this->view->mostrarComponenteAeditar($data,$datoGabinete);
     }

     function editComponente(){
      if(isset($_POST['id']) && isset($_POST['micro']) && isset($_POST['mother']) && isset($_POST['ram']) && isset($_POST['gamer']) && isset($_POST['descripcion'])) {
         if(!empty($_POST['id']) && !empty($_POST['micro']) && !empty($_POST['mother']) && !empty($_POST['ram']) && !empty($_POST['gamer']) && !empty($_POST['descripcion'])){
            if(is_numeric($_POST['ram'])){
               $editMicro = $_POST['micro'];
               $editMother = $_POST['mother'];
               $editRam = $_POST['ram'];
               $editGamer = $_POST['gamer'];
               $editDescripcion = $_POST['descripcion'];
               $editId = $_POST['id'];
               
               $this->modelComponentes->editarElComponente($editMicro,$editMother,$editRam,$editGamer,$editDescripcion,$editId);
               $this->view->locationComponentes(); 
            }else{
               $this->view->mostrarError("Ingreso caracteres");
         }
         }else{
            $this->view->mostrarError("Faltan caracteres");
         }
      
      }
   }  
     
}


    
