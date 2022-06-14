<?php   

    include "config.php";
    $input = file_get_contents('php://input');
    $decode = json_decode($input,true);
    $Pname = mysqli_real_escape_string($con, $decode["productName"]);
    $Pcategory = mysqli_real_escape_string($con, $decode["productCategory"]);
    $Pstatus = mysqli_real_escape_string($con, $decode["productStatus"]);
    $Pid = mysqli_real_escape_string($con, $decode["statusId"]);
    $sql = "UPDATE producttable SET pname ='{$Pname}', category='{$Pcategory}',status='{$Pstatus}' WHERE id = {$Pid}"; 
    if(mysqli_query($con,$sql))
    {
        echo json_encode(array("status"=>true));
    }
    else
    {
        echo json_encode(array("status"=>false,"value"=>"unable to update data"));

    }


?>