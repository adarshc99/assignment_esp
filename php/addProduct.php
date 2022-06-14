<?php
    include "config.php";
    $input = file_get_contents('php://input');
    $decode = json_decode($input,true);
    $pname = mysqli_real_escape_string($con, $decode["productName"]);
    $pcategory = mysqli_real_escape_string($con, $decode["productCategory"]);
    $pstatus = mysqli_real_escape_string($con, $decode["productStatus"]);
    $sql = "INSERT INTO producttable (pname,category,status) VALUES ('{$pname}','{$pcategory}','{$pstatus}')";
    if(mysqli_query($con,$sql))
    {
        echo json_encode(array("status"=>true));
    }
    else
    {
        echo json_encode(array("status"=>false,"value"=>"can not insert"));
    }
?>