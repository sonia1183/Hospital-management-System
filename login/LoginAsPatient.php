<?php
require "../conn.php";

session_start();

if (isset($_POST['uname'])) {
    $uname=$_POST['uname'];
    $password=$_POST['pass'];

    $sql="select * from patient where uname='".$uname."'AND password='".$password."'limit 1";

    $result=$conn->query($sql);

    if ($result->num_rows==1) {
        $_SESSION["name"] = $uname;
        // $url="../patient_dashboard.php?pname=".$uname;
        // header('location:'.$url);
        header("location:../patient_dashboard.php?pname=".$uname);
    } else {
        echo"<script type='text/javascript'>window.alert('Invalid Username or Password');window.location='login/LoginAsPatient.html';</script>";
    }
}
?>






