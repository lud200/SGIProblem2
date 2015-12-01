<?php

$link = mysqli_connect("localhost", "root", "", "mysql");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Attempt insert query execution
// $sql = "INSERT INTO player VALUES ('1002', 'Jane', 10, 100, 23)";
// if(mysqli_query($link, $sql)){
//     echo "Records added successfully.";
// } else{
//     echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
// }
 
 $query = "select * from player";
 $result = mysqli_query($link, $query);

 $emptyarray = array();
 while($row =mysqli_fetch_assoc($result))
    {
        $emptyarray[] = $row;
    }
    echo json_encode($emptyarray);
// Close connection
mysqli_close($link);
?>