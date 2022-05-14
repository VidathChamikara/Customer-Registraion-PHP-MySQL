<?php

if (isset($_GET['id'])){
    include "db_conn.php";

    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $id = validate($_GET['id']);

    $sql = "SELECT * FROM users WHERE id=$id";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

    }else{
        header("Location: read.php");
    }

}else if(isset($_POST['update'])){
    include "../db_conn.php";
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $id = validate($_POST['id']);
    $name = validate($_POST['name']);
    $email = validate($_POST['email']);

        if (empty($id)) {
        header("Location: ../update.php?id=$id$error=ID is required&");
    }else if (empty($name)) {
        header("Location: ../update.php?id=$id$error=Name is required&");
    }else if (empty($email)) {
        header("Location: ../update.php?id=$id$error=Email is required&");
    }else {

       $sql = "UPDATE users
               SET id='$id', name='$name', email='$email'
               WHERE id=$id; ";
       $result = mysqli_query($conn, $sql);
       if ($result) {
          header("Location: ../read.php?success=successfully updated");
       }else {
          header("Location: ../update.php?id=$id$error=unknown error occurred&$user_data");
       }
    }

}
else{
    header("Location: read.php");
}