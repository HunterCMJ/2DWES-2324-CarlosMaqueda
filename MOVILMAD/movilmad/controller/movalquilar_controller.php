<?php
    
    require_once("../db/movdb.php");

    ////////////IMPORTAMOS MODEL

   require_once("../models/movalquilar_model.php");
  
    $coches=select_coches();

	header("Location: ../movalquilar.php?coches=" . urlencode(serialize($coches)));
   
?>