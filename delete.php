<?php 
    require_once"app/db.php"; 
    require_once"app/functions.php"; 

    $id = $_GET['id'];
    $sql = "DELETE FROM students WHERE id='$id'";
    $connection -> query($sql);


    header('location:all-student.php');
 
