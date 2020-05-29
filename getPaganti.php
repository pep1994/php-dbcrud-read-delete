<?php 
    
    header('Content-Type: application/json');
    

    $conn = new mysqli('localhost', 'root', 'root', 'Hotel2');

    if ($conn -> connect_errno) {
        echo json_encode('errore ' . $conn -> connect_errno);
        return;
     } else {

         $result = $conn -> query(
             "
             SELECT id, name, lastname, address
             FROM paganti
             "
         );
     
         if ($result -> num_rows < 1) {
             echo json_encode('risultato non trovato');
             return;
         } else {
             $res = [];
     
             while ($row = $result -> fetch_assoc() ) {
                $res [] = $row;
             }
     
             echo json_encode($res);
         }
     }
     
     $conn -> close();
?>