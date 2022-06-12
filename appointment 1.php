<?php
    session_start();
    if(isset($_SESSION["name"]))
    {
        echo "<script>window.location='patient_dashboard.php';</script>";
    }
    else
    {
        echo "<script>window.location='login/login_as_patient.html';</script>";
    }
?>
