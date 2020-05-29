<?php 
    
    $id = $_POST['id'];
    
    if (isset($id)) {
        
        $conn = new mysqli('localhost', 'root', 'root', 'Hotel2');

        if ($conn -> connect_errno) {

            echo $conn -> connect_errno;
        
        }
         else {

            $result = $conn -> query(
                "
                DELETE 
                FROM paganti
                WHERE id = $id "
            );
         }
    }

    $conn -> close();

?>