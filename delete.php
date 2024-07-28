<?php
    session_start();
    require "private/conn.php";

    if(!isset($_SESSION['admin'])){
        header("Location: login.php");
        exit();
    }

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $query = "DELETE FROM simerah_ambon WHERE id = '$id'";

        $result = mysqli_query($conn, $query);

        header("Location: index.php");
    }

    
?>