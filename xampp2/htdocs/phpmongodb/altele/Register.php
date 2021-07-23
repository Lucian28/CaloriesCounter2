<?php
require_once('.\MongodbDatabase.php');
$db=new MongodbDatabase;
?>

<!DOCTYPE html>
<html lang="en">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<head>
<meta charset="UTF-8">
<title> Inregistrare </title>

</head>

<body>


<?php 
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


</form>
<br>
      <div class="panel-heading">
       <b>  Inregistrare utilizator </b> <br>
       </div>
       <br>
       <div class="panel-body">
        <form action="Register.php" method="POST">

          <div class="form-group">
           <input type="text" name="nume" id="" class="form-control" placeholder="nume" required>
           </div>
           <div class="form-group">
           <input type="text" name="prenume" id="" class="form-control" placeholder="prenume" required>
           </div>
           <div class="radio-group" required>
	
           
<!-- Group of default radios - option 1 -->
<div class="custom-control custom-radio">
  <input type="radio" class="custom-control-input" id="defaultGroupExample1" name="groupOfDefaultRadios" checked>
  <label class="custom-control-label" for="defaultGroupExample1">Male</label>
</div>

<!-- Group of default radios - option 2 -->
<div class="custom-control custom-radio">
  <input type="radio" class="custom-control-input" id="defaultGroupExample2" name="groupOfDefaultRadios" >
  <label class="custom-control-label" for="defaultGroupExample2">Female</label>
</div>	

           <div class="form-group">
           <input type="text" name="email" id="" class="form-control" placeholder="adresa de e-mail"required>
           </div>
           <div class="form-group">
           <input type="password" name="parola" id="" class="form-control" placeholder="parola"required>
           </div>
           <div class="form-group">
           <input type="password" name="parola2" id="" class="form-control" placeholder="confirmare parola"required>
           </div>
           <div class="form-group">
           <input type="text" name="varsta" id="" class="form-control" placeholder="varsta"required>
           </div>
           <div class="form-group">
           <input type="text" name="greutate" id="" class="form-control" placeholder="greutate (kg)"required>
           </div>
           <div class="form-group">
           <input type="text" name="inaltime" id="" class="form-control" placeholder="inaltime (cm)"required>
           </div>
           <div class="form-group">
                           
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



           <div class="form-group">
           <input type="submit" class="btn btn-danger"  name="Inregistrare" value="Inregistrare">
           </div>
 </form>
 </div>
</div>
</div>
</div>
<script>
  var password = document.getElementById("parola"),
  confirm_password = document.getElementById("parola2");

  function validatePassword(){
    if(password.value != confirm_password.value){
      confirm_password.setCustomValidity("Parolele nu coincid");
    }
    else{
      confirm_password.setCustomValidity('');
    }
  }
  password.onchange = validatePassword;
  confirm_password.onkeyup = validatePassword;


</script>
</body>
</html>