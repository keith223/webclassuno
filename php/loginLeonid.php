<?php
    include("dbconnectZorinbanan.php");
    $resultArray = array();
    $tempArray = array();
    $login = (trim($_POST['log']));
    $password = (trim($_POST['password']));
    
    $sql = "SELECT userstatus FROM loginData WHERE userName='$login' AND userPass='$password'";

    if ($result = mysqli_query($dbconnect, $sql)){
        while($row = $result->fetch_object()){
            $tempArray = $row;
            array_push($resultArray, $tempArray);
        }
    } else {
        $json["failed"] = 'Login failed. Invalid login and/or password';
        echo json_encode($json, JSON_UNESCAPED_UNICODE);
        mysqli_close($dbconnect);
    }
    echo json_encode($resultArray, JSON_UNESCAPED_UNICODE);
    mysqli_close($dbconnect);
?>