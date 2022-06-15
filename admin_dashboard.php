<?php
        session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>RRV Hospitals</title>
    <meta name="keywords" content="RRV Hospitals">
    <meta name="description" content="Developed By Rishi Raj G">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
    .upload {
        margin-top: 50px;
        padding: 40px;
        background-color: rgba(0, 0, 0, 0.194);
        -webkit-border-radius: 5px;
        -o-border-radius: 5px;
        -moz-border-radius: 5px;
    }

    .upload input[type="text"] {
        width: 300px;
        border: 1px solid grey;
        border-radius: 5px;
    }


    .main {
        padding: 30px;
        color: black;
        border: 2px solid black;
        -webkit-border-radius: 15px;
        -o-border-radius: 15px;
        -moz-border-radius: 15px;
    }

    h1 {
        font-size: xx-large;
    }

    /* h4 {
        padding-left:20px;
    } */

    .upload h1 {
        color: black;
        font-size: xx-large;
        margin-bottom: 30px;
    }

    .container {
        margin-bottom: 30px;
    }
    </style>
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <script>
    $(document).ready(function() {
        $("#nav-placeholder").load("nav.html");
    });
    </script>

</head>

<body>
    <div id="nav-placeholder"></div>

    <?php
        if (!isset($_SESSION["name"])) {
            echo "<script>window.location='login/LoginAsDoctor.html'</script>";
        }
        ?>
    <div class="container-fluid" style="padding: 30px 20px 0px 40px;">
        <div class="row">
            <div class="col-md-10">
                <?php
                    echo "<h3>Welcome  ";
                    echo $_SESSION["name"];
                    ?>
            </div>
            <div class="col-md-2">

                <form method="POST"><button value="Log Out" name="logout" class="btn btn-danger">Log
                        Out</button></form>
                <?php
                        if (isset($_POST['logout'])) {
                            session_destroy();
                            echo "<script>window.location='index.html'</script>";
                        }
                    ?>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="main">
                    <h1>Today's Appointments:</h1>
                    <ol>
                    <?php
                                        
                        require "conn.php";
                        $today=date("Y-m-d");
                        $doctor=$_SESSION["name"];
                        $sql="select * from appointment where doctorname='$doctor' and date='$today' ";
                        $result=$conn->query($sql);
                        
                        if ($result->num_rows>0) {
                            while ($row=$result->fetch_assoc()) {
                                echo"<li><b><i>Patient Details : </i></b>
                                <ul>
                                <li><strong>Name : </strong>".$row["username"]."</li>
                                <li><strong>Time Slot : </strong>".$row["time"]."</li>
                                <li><strong>Date : </strong>".$row["date"]."</li>
                                </ul>
                                </li>";
                            }
                        } else {
                            echo"<h4>There Are No Appointments Today!</h4>";
                        }
                     ?>
                     </ol>
                </div>



                <div class="main">
                    <h2 style="color:green;">Mild Problem Patients</h2>
                    <ol>
                    <?php

                       $today=date("Y-m-d");
                       $doctor=$_SESSION["name"];
                       
                       $sql="select * from appointment where doctorname= '$doctor' and disease='mild' and date='$today' ";
                       $result=$conn->query($sql);
                       if ($result->num_rows>0) {
                           while ($row=$result->fetch_assoc()) {
                               echo"<li><strong>Name : </strong>".$row["username"];
                               "</li>";
                           }
                       } else {
                           echo"<h4>There Are No Mild Problem Patients Today</h4>";
                       }
                     ?>
                     </ol>
                    <h1 style="color:orange;">Serious Problem Patients</h1>
                    <ol>
                    <?php

                        $today=date("Y-m-d");
                        $doctor=$_SESSION["name"];
                       
                        $sql="select * from appointment where doctorname= '$doctor' and disease='serious' and date='$today' ";
                        $result=$conn->query($sql);
                        if ($result->num_rows>0) {
                            while ($row=$result->fetch_assoc()) {
                                echo"<li><strong>Name : </strong>".$row["username"];
                               "</li>";
                            }
                        } else {
                            echo"<h4>There Are No Serious Problem Patients Today</h4>";
                        }
                     ?>
                     </ol>
                    <h1 style="color:red;">Emergency Problem Patients **</h1>
                    <ol>
                    <?php

                        $today=date("Y-m-d");
                        $doctor=$_SESSION["name"];
                        
                        $sql="select * from appointment where doctorname= '$doctor' and disease='emergency' and date='$today' ";
                        $result=$conn->query($sql);
                        if ($result->num_rows>0) {
                            while ($row=$result->fetch_assoc()) {
                                echo"<li><strong>Name : </strong>".$row["username"];
                                "</li>";
                            }
                        } else {
                            echo"<h4>There Are No Emergency Problem Patients Today</h4>";
                        
                        session_destroy();}
                     ?>
                     </ol>
                </div>
            </div>
            <div class="upload col-md-4">
                <h1>Upload Prescription:</h1>
                <form method="post" action="prescription.php" enctype="multipart/form-data">
                    <P style="font-size:x-large;">
                        Username: &nbsp;
                        <input type="text" name="username" placeholder="Enter"><br><br>
                        Prescription:
                    </p>
                    <input type="file" name="prescription" value="Upload Prescription"><br><br>

                    <center><input type="submit" value="Upload" name="upload" style="background-color:green;color:white;"></center>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>

</html>