<?php
    include "config.php";
    $input = file_get_contents('php://input');
    $decode = json_decode($input,true);
    $User_name = mysqli_real_escape_string($con, $decode["signName"]);
    $Email_name = mysqli_real_escape_string($con, $decode["signEmail"]);
    $User_Phone = mysqli_real_escape_string($con,$decode["signPhone"]);
    $Password_pwd = mysqli_real_escape_string($con, md5($decode["signPassword"]));
    $sql = "SELECT * FROM sign WHERE email = '{$Email_name}'";
    $result = mysqli_query($con,$sql);
    if(mysqli_num_rows($result)>0)
    {
        echo json_encode(array("status"=>false,"value"=>"User Already Exsist"));
        die();
    }
$sql_insert = "INSERT INTO sign (name,email,phone,password) VALUES('{$User_name}','{$Email_name}','{$User_Phone}','{$Password_pwd}')";
    $resultInsert = mysqli_query($con,$sql_insert);
    if($resultInsert)
    {
        $sqlGetId = "SELECT id FROM sign WHERE email = '{$Email_name}'";
        $getRowId = mysqli_query($con,$sqlGetId) or die("Query failed at 21");
        $row = mysqli_fetch_assoc($getRowId);
        session_start();
        $_SESSION["userid"] = $row['id'];
        // header('Location: http://localhost/ESP_Assignment/php/productList_addProduct.php');
        // header("location: http://localhost/productList_addProduct.php");

        echo json_encode(array("status"=>true));
    }
    else
    {
        echo json_encode(array("status"=>false));
    }




?>