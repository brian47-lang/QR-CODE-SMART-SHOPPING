<?php
$server = "localhost";
$usernmae = "root";
$password = "";
$dbname = "test";

$conn = new mysqli($server,$usernmae,$password,$dbname);

if($conn->connect_error){
    die("cennection failed" .$conn->connect_error);
}
if(isset($_POST['text'])){
    $items = $_POST['text'];
    $alert = "<script>alert('purchase registered !!');</script>";
    $sql = "INSERT INTO items4(productsBought,timin) VALUES('$items',NOW())";
    if($conn->query($sql)===TRUE){
        echo $alert;
    }else{
        echo "error : " .sql . "<br>" . $conn->error;
    }

    header("location: payment.php");
}

?>