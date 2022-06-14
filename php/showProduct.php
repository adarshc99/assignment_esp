<?php   

    include "config.php";
    $input = file_get_contents('php://input');
    $decode = json_decode($input,true);
    $Pid = mysqli_real_escape_string($con, $decode["getid"]);
    $sql = "SELECT * FROM producttable WHERE id = {$Pid}";
    $result = mysqli_query($con,$sql) or die("Qusery failed at 8");
    if($result)
    {
        $row = mysqli_fetch_assoc($result);
        echo json_encode(array("status"=>true,"value"=>$row));
    }
    else
    {
        echo json_encode(array("status"=>false,"value"=>"Unable To get Product"));
    }
    


?>