<?php
    require_once "./view/view.php";
    require_once "./model/modelComponentes.php";


 class controllerComponentes{
 
    private $view;
    private $modelComponentes;

    function __construct() {
        $this->view=new view();
        $this->modelComponentes=new modelComponentes();
    }

     function home(){

       $this->view->ShowHome();
     }

     function componentes(){

      $data = $this->modelComponentes->getComponentes();
      $this->view->showComponentes($data);
     }

     function borrarComponente($params = null){

        $id = $params[':ID'];
        $this->modelComponentes->deleteComponente($id);
        $this->view->locationComponentes();

     }
     
}