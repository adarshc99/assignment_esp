<?php
    include "config.php";
    $input = file_get_contents('php://input');
    $decode = json_decode($input,true);
    $Uemail = mysqli_real_escape_string($con, $decode["loginEmail"]);
    $Upwd = mysqli_real_escape_string($con, md5($decode["loginPwd"]));
    $sql = "SELECT * FROM sign WHERE email = '{$Uemail}'";
    $result = mysqli_query($con,$sql);
    if(mysqli_num_rows($result)>0)
    {
       $row = mysqli_fetch_assoc($result);
       if($row["password"] == $Upwd)
       {
        $sqlGetId = "SELECT id FROM sign WHERE email = '{$Uemail}'";
        $getRowId = mysqli_query($con,$sqlGetId) or die("Query failed at 15");
        $row = mysqli_fetch_assoc($getRowId);
        session_start();
        $_SESSION["userid"] = $row['id'];
        echo json_encode(array("status"=>true));
       }
       else
       {
        echo json_encode(array("status"=>false,"value"=>"Email or Password not mathched"));
       }
    }
    else
    {
        echo json_encode(array("status"=>false,"value"=>"Email or Password not mathched"));
    }



?>