<?php
    
    
    require_once("./functions.php");
    require_once("../db/movdb.php");
   
    if ($_SERVER['REQUEST_ METHOD']="POST") {
        
        $email=limpiar_campo($_POST["email"]);
        $psswd_user=limpiar_campo($_POST["password"]);
        
        //model
        require_once("../models/movlogin_model.php");

    

        if(select_login($email,$psswd_user)){
            header("location: ../movwelcome");
        }else{
            header("location: ../movlogin");
        }
        
        
        
    }

	
?>