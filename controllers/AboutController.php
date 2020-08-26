<?php
  class AboutController{
      public function actionIndex(){
        
        require_once(root.'/views/about/index.php');
        return true;
      }
  }

?>