<?php

require_once('.\MongodbDatabase.php');
$db=new MongodbDatabase;



// check if we have data to insert information about videos to mongodb databasse

if(isset ($_POST['Inregistrare']))
if( isset ( $_POST['nume'])){
    if( ! empty($_POST['nume'])) {
       $insertable = $db->insertNewItem([
    'nume' => $_POST['nume'],
    'prenume'  => $_POST['prenume'],
    'sex' =>  $_POST['sex'],
    'email' =>  $_POST['email'],
    'parola' =>  $_POST['parola'],
    'varsta' =>  $_POST['varsta'],
    'greutate' =>  $_POST['greutate'],
    'inaltime' =>  $_POST['inaltime'],
    'nivelActivitate' =>  $_POST['nivelActivitate']
          ]);
          if($insertable){
              ?>
<div class="container">
 <div class="panel">
    <h3> Ai fost inregistrat cu succes </h3>
  </div>
 </div>
              <?php
          }
       }
    }
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title> Inregistrare</title>

    <!-- Icons font CSS-->
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/main.css" rel="stylesheet" media="all">
</head>

<body>
    <div class="page-wrapper bg-red p-t-180 p-b-100 font-robo">
        <div class="wrapper wrapper--w960">
            <div class="card card-2">
                <div class="card-heading"></div>
                <div class="card-body">
                    <h2 class="title">Registration Info</h2>
                    <form method="POST">
                        <div class="input-group">
                            <input class="input--style-2" type="text" placeholder="Nume" name="nume" required>
                        </div>
						  <div class="input-group">
                            <input class="input--style-2" type="text" placeholder="Prenume" name="prenume" required>
                        </div>
						  <div class="input-group">
                            <input class="input--style-2" type="text" placeholder="Email" name="email" required>
                        </div>
						 <div class="input-group">
                            <input class="input--style-2" type="password" placeholder="Parola" name="parola" required>
                        </div>
						 <div class="input-group">
                            <input class="input--style-2" type="password" placeholder="Repetare parola" name="repetareparola" required>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <input class="input--style-2 js-datepicker" type="text" placeholder="Birthdate" name="birthday">
                                    <i class="zmdi zmdi-calendar-note input-icon js-btn-calendar"></i>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <select name="gender">
                                            <option disabled="disabled" selected="selected">Gender</option>
                                            <option>Male</option>
                                            <option>Female</option>
                                            
                                        </select>
                                        <div class="select-dropdown"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="input-group">
                            <div class="rs-select2 js-select-simple select--no-search">
                                <select name="class">
                                    <option disabled="disabled" selected="selected">Nivel de activitate</option>
                                    <option value="1">    Desk job with little exercise</option>
                                    <option value="2"> 1-3 hrs/week of strenuous cardio</option>
                                    <option value="3"> 3-5 hrs/week of strenuous cardio</option>
									<option value="4"> 5-6 hrs/week of strenuous cardio</option>
									<option value="5">7-21 hrs/week of strenuous cardio</option>
                                </select>
                                <div class="select-dropdown"></div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <input class="input--style-2" type="text" placeholder="Greutate (kg)" name="greutate (kg)">
                                </div>
                            </div>
                        </div>
						<div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <input class="input--style-2" type="text" placeholder="Inaltime (cm)" name="inaltime">
                                </div>
                            </div>
                        </div>
                        <div class="p-t-30">
                            <button class="btn btn--radius btn--green" type="submit" name="finalizare">Finalizare</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="js/global.js"></script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->