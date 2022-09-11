<?php 
    $server = "localhost";
    $user = "root";
    $pw = "";
    $db = "news";

    //create connection

    $conn = new mysqli($server, $user, $pw, $db);

    //check connection
    if ($conn->connect_error){
        die("connection failed: " . $conn->connect_error);
    }

    if(isset($_GET['deleteid'])){
        $id = $_GET['deleteid'];


        //echo $id;

        $sql = "DELETE FROM content WHERE id=$id";

        if ($conn->query($sql)==TRUE){
            echo "Delete successfully";
            header('location:adminPanel.php');
        }
        else{
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

    }

    $conn->close();
?>
