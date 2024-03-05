<<<<<<< HEAD
<?php 
function select_canciones(){

global $conexion;

try {
    //sentencia
    $stmt = $conexion->prepare("SELECT track.TrackId as id,track.Name as track,track.UnitPrice as price,album.Title as album,artist.Name as artist from track INNER JOIN album on track.AlbumId=album.AlbumId INNER join artist on album.ArtistId=artist.ArtistId;"); 

    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $resultado = $stmt->fetchAll();
    
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}


return $resultado;
}

function select_maxInvoice(){

    global $conexion;
    
    try {
        //sentencia
        $stmt = $conexion->prepare("SELECT Max(InvoiceId) as max from invoice"); 
    
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $resultado = $stmt->fetchAll();
        
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    
    
    return $resultado[0];
}
function select_maxInvoiceLine(){

    global $conexion;
    
    try {
        //sentencia
        $stmt = $conexion->prepare("SELECT Max(InvoiceLineId) as max from invoiceline"); 
    
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $resultado = $stmt->fetchAll();
        
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    
    
    return $resultado[0];
}

function insertUpdate($carrito){
    global $conexion;

    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $max=select_maxInvoice();
    $invoiceID=intval($max['max'])+1;
    $Total=0;
    $fecha=date("y-m-d H:i:s");
    foreach ($carrito as $key => $values) {
        $Total+=$values['precio'];
    }
   $Total=intval($Total);
   
  
    
    try {

        $stmt = $conexion->prepare("INSERT into invoice (InvoiceId,CustomerId,InvoiceDate,Total) values (:InvoiceId,:CustomerId,:InvoiceDate,:Total)");

        $stmt->bindParam(":InvoiceId", $invoiceID);
        $stmt->bindParam(":CustomerId", $_SESSION['Id']);
        $stmt->bindParam(":InvoiceDate", $fecha);
        $stmt->bindParam(":Total", $Total);
        
        $stmt->execute();

        foreach ($carrito as $key => $value) {
        $maxInvoice=select_maxInvoiceLine();
        
        $maxInvoice=intval($maxInvoice['max'])+1;

        $stmt1 = $conexion->prepare("INSERT into invoiceline (InvoiceId,InvoiceLineId,TrackId,UnitPrice,Quantity) values (:InvoiceId,:InvoiceLineId,:TrackId,:UnitPrice,:Quantity)");

        $stmt1->bindParam(":InvoiceId", $invoiceID);
        $stmt1->bindParam(":InvoiceLineId", $maxInvoice);
        $stmt1->bindParam(":TrackId", $key);
        
        $stmt1->bindParam(":UnitPrice", $value['precio']);
        $stmt1->bindParam(":Quantity", $value['cantidad']);
        $stmt1->execute();
      
    }
        
        
    } catch (Exception $e) {

       
        echo "Failed: " . $e->getMessage();
    }
}

=======
<?php 
function select_canciones(){

global $conexion;

try {
    //sentencia
    $stmt = $conexion->prepare("SELECT track.TrackId as id,track.Name as track,track.UnitPrice as price,album.Title as album,artist.Name as artist from track INNER JOIN album on track.AlbumId=album.AlbumId INNER join artist on album.ArtistId=artist.ArtistId;"); 

    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $resultado = $stmt->fetchAll();
    
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}


return $resultado;
}

function select_maxInvoice(){

    global $conexion;
    
    try {
        //sentencia
        $stmt = $conexion->prepare("SELECT Max(InvoiceId) as max from invoice"); 
    
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $resultado = $stmt->fetchAll();
        
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    
    
    return $resultado[0];
}
function select_maxInvoiceLine(){

    global $conexion;
    
    try {
        //sentencia
        $stmt = $conexion->prepare("SELECT Max(InvoiceLineId) as max from invoiceline"); 
    
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $resultado = $stmt->fetchAll();
        
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    
    
    return $resultado[0];
}

function insertUpdate($carrito){
    global $conexion;

    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $max=select_maxInvoice();
    $invoiceID=intval($max['max'])+1;
    $Total=0;
    $fecha=date("y-m-d H:i:s");
    foreach ($carrito as $key => $values) {
        $Total+=$values['precio'];
    }
   $Total=intval($Total);
   
  
    
    try {

        $stmt = $conexion->prepare("INSERT into invoice (InvoiceId,CustomerId,InvoiceDate,Total) values (:InvoiceId,:CustomerId,:InvoiceDate,:Total)");

        $stmt->bindParam(":InvoiceId", $invoiceID);
        $stmt->bindParam(":CustomerId", $_SESSION['Id']);
        $stmt->bindParam(":InvoiceDate", $fecha);
        $stmt->bindParam(":Total", $Total);
        
        $stmt->execute();

        foreach ($carrito as $key => $value) {
        $maxInvoice=select_maxInvoiceLine();
        
        $maxInvoice=intval($maxInvoice['max'])+1;

        $stmt1 = $conexion->prepare("INSERT into invoiceline (InvoiceId,InvoiceLineId,TrackId,UnitPrice,Quantity) values (:InvoiceId,:InvoiceLineId,:TrackId,:UnitPrice,:Quantity)");

        $stmt1->bindParam(":InvoiceId", $invoiceID);
        $stmt1->bindParam(":InvoiceLineId", $maxInvoice);
        $stmt1->bindParam(":TrackId", $key);
        
        $stmt1->bindParam(":UnitPrice", $value['precio']);
        $stmt1->bindParam(":Quantity", $value['cantidad']);
        $stmt1->execute();
      
    }
        
        
    } catch (Exception $e) {

       
        echo "Failed: " . $e->getMessage();
    }
}

>>>>>>> 8698404c50d057c578f2f96dc3177ae54fdd1eb2
?>