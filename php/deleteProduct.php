<?php   

    include "config.php";
    $input = file_get_contents('php://input');
    $decode = json_decode($input,true);
    $Pid = mysqli_real_escape_string($con, $decode["getid"]);
    $sql = "DELETE FROM producttable WHERE id = {$Pid}";
    if(mysqli_query($con,$sql))
    {
        echo json_encode(array("status"=>true));
    }
    else
    {
        echo json_encode(array("status"=>false,"value"=>"Unable To delete Product"));
    }
    


?>