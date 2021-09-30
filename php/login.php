<?php
$host = "localhost";
$dbusername = "root";
$dbpassword = "Suchithsj@1537";
$dbname = "p2";
// Create connection
$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);
if (mysqli_connect_error()){
die('Connect Error ('. mysqli_connect_errno() .') '
. mysqli_connect_error());
}
else{
    $mail=$_POST["mail"];
    $password=$_POST["password"];

    $fetch="SELECT user_id,password FROM user WHERE mail='".$mail."'";
    $result1=$conn->query($fetch) or die($conn->error);
    if(mysqli_num_rows($result1)>0){
    $row1=$result1->fetch_assoc();
    $id=$row1["user_id"];
    $pass=$row1["password"];
    session_start();
    $_SESSION['cust_id']=$id;
    if($pass==$password){
        header("Location:../html/index.html");
    }
    else{
        echo "Wrong password";
    }
    }
    else{
        header("Location:../html/signup.html");
        exit();
    }



}
?>
