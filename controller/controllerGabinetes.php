<?php
   require_once "./view/view.php";
   require_once "./model/modelGabinetes.php";


class controllerGabinetes{

   private $view;
   private $modelGabinetes;

   function __construct() {
       $this->view=new view();
       $this->modelGabinetes=new modelGabinetes();
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
         $this->modelComponentes->deleteGabinetes($id);
         $this->view->locationGabinetes();
 
      } 
}