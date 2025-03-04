<?php

session_start();
include("connect.php");

$mobile = $_POST['mobile'];
$password = $_POST['password'];
$role = $_POST['role'];

$check = mysqli_query($connect," SELECT * FROM user WHERE mobile ='$mobile' AND password='$password' AND role='$role' ");

if(mysqli_num_rows($check)>0){
    $userdata=mysqli_fetch_array($check);
    $_SESSION['userdata'] = $userdata;
    $groups=mysqli_query($connect,"SELECT * from user WHERE role=2");
    $groupsdata=mysqli_fetch_all($groups,MYSQLI_ASSOC);
    $_SESSION['groupsdata'] = $groupsdata;
    header("Location: dashboard.php"); 
}
else{
    echo'
    <script>
    alert("No such user exist!");
    window.location="../";
    </script>
    ';
}

?>