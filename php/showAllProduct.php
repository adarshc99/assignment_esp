<?php
    include "config.php";
    $sql = "SELECT * FROM producttable";
    $pArray = array();
    $result = mysqli_query($con,$sql) or die("Qusery failed at 4");
    if(mysqli_num_rows($result)>0)
    {
        
        while($row = mysqli_fetch_assoc($result))
        {
            // echo "<pre>";
            // print_r($row);
            // echo "</pre>";
            array_push($pArray,$row);
        }
            echo json_encode(array("status"=>true,"ProductArray"=>$pArray));
    }
    else
    {
        echo json_encode(array("status"=>false,"value"=>"No Data Found"));
    }
    
?>