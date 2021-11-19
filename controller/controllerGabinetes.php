<?php
   require_once "./view/view.php";
   require_once "./model/modelGabinete.php";
   require_once "./model/modelKit.php";
   require_once "./helpers/authHelper.php";


class controllerGabinetes{

   private $view;
   private $modelGabinete;
   private $modelKit;
   private $authHelper;

   function __construct() {
      $this->view = new view();
      $this->modelGabinete = new modelGabinete();
      $this->modelKit = new modelKit();
      $this->authHelper = new authHelper();
   }

   
   function home(){
      $this->view->ShowHome();
   }

    function gabinetes(){
      $iniciar = ($_GET['pagina']-1)*2;

      $data = $this->modelGabinete->getGabinetes();
      $resultado = $this->modelGabinete->getLimitGabinetes($iniciar);
      $cantidad = count($data);

      $paginas = $cantidad/2;
      $paginas = ceil($paginas);
     
      $this->view->showGabinetes($resultado, $paginas);
   }
   
 
   function borrarGabinete($params = null){
      $this->authHelper->checkLoggedIn();

      $id = $params[':ID'];
      $this->modelGabinete->deleteGabinete($id);
      $this->view->locationGabinetes(); 
   } 

   function agregarGabinete(){
      $this->authHelper->checkLoggedIn();
      
      $num = $this->modelGabinete->getGabinetes();
      $comentario = count($num);
      if(isset($_POST['nombre']) && isset($_POST['marca']) && isset($_POST['gamer']) && isset($_FILES['imagen'])) {
         if(!empty($_POST['nombre']) && !empty($_POST['marca']) && !empty($_POST['gamer']) && !empty($_FILES['imagen'])){
               $nombreAgre = $_POST['nombre'];
               $marcaAgre = $_POST['marca'];
               $gamerAgre = $_POST['gamer'];
               if($gamerAgre == "si"){
                  $gamerAgre = 1;
               }else{
                  $gamerAgre = 0;
               }
               $imagen = $_FILES['imagen']['tmp_name'];
               $img = base64_encode(file_get_contents($imagen));
               

               $this->modelGabinete->agregarGabinete($marcaAgre,$nombreAgre,$gamerAgre, $img, $comentario);
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
      $this->authHelper->checkLoggedIn();

      $id = $params[':ID'];
      $data = $this->modelGabinete->seleccionarGabinete($id);
      $this->view->verGabineteAEditar($data);
   }
   
   function editGabinete(){
      $this->authHelper->checkLoggedIn();

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

   function verComentarios($params = null){
      $id = $params[':ID'];
      $this->view->mostrarComentarios($id);
   }
   
}