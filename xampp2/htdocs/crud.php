<!DOCTYPE html>
<html>
<head>
<style>
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
th, td {
  padding: 15px;

}
.x{
    text-align:center;
     
}


label {
color: GREEN;
font-weight: bold;
display: block;
width: 150px;
float: center;
}
</style>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<?php






  

$host="remotemysql.com";
$dbname="jYX1nRpODt";
$user="jYX1nRpODt";
$pass="2NXrRAgEnH";
try{
    $DHB= new PDO("mysql:host=$host;dbname=$dbname",$user,$pass);
}
catch(PDOException $e){
    echo $e->getMessage();
}
$exista=0;
if(isset($_POST['inserare']))
{
    $stmt = $DHB->query('SELECT * FROM Soldat');
    while ($row = $stmt->fetch())
    {
        $aux=$row['idSoldat'];
        if($_POST['id_soldat']==$aux)
        $exista=1;
    }

if($exista==0)
{
   $statement="INSERT INTO Soldat (idSoldat,Nume,Prenume,id_regiment,id_disponibilate,id_cazarma) values (?,?,?,?,?,?)";
   $stmt = $DHB->prepare($statement);
$stmt->execute([$_POST['id_soldat'],$_POST['Nume'],$_POST['Prenume'],$_POST['id_regiment'],$_POST['id_disponibilitate'], $_POST['cazarma']]);   


}
else
 {
    // $statement="UPDATE Soldat  SET idSoldat=$_POST[id_soldat],Nume=$_POST[Nume],Prenume=$_POST[Prenume],id_regiment=$_POST[id_regiment],id_disponibilate=$_POST[id_disponibilitate],id_cazarma=$_POST[cazarma]
    //  WHERE idSoldat=$_POST[id_soldat]";
    // $stmt = $DHB->prepare($statement);

    $sql = "UPDATE Soldat SET  Nume = :Nume, Prenume=:Prenume, id_regiment=:id_regiment, id_disponibilate=:id_disponibilate,id_cazarma=:id_cazarma WHERE idSoldat= :idSoldat";
$query = $DHB->prepare($sql);
$result = $query->execute(array(':Nume' => $_POST['Nume'],
 ':Prenume' => $_POST['Prenume'], 
 ':id_regiment'=>$_POST['id_regiment'],
 ':id_disponibilate'=>$_POST['id_disponibilitate'],
 ':id_cazarma'=>$_POST['cazarma'], ':idSoldat'=>$_POST['id_soldat'] ));

 }
 
}

for($i=0;$i<9999;$i++)
if(isset($_POST[$i]))
 if($_POST[$i]=='Stergere')

   {
        $sql="DELETE FROM Soldat WHERE idSoldat=$i"; 
    $q = $DHB->prepare($sql);
         $q->execute(['idSoldat' => $i]);
      
   }



$stmt = $DHB->query('SELECT * FROM Soldat');

echo "<table class='table table-hover' style='width:60%; margin-right: auto;

margin-left: auto; '>";
echo "<tr>";
echo  " <th> id_Soldat     </th>";
echo  "<th> Nume    </th>";
echo   "<th> Prenume      </th>";
echo  "<th> id_regiment   </th>";
echo  "<th> id_disponibilitate</th>";
echo   "<th> id_cazarma     </th>";
echo   "<th> STERGERE    </th>";
echo   "<th> MODIFICARE    </th>"."</tr>";

while ($row = $stmt->fetch())
{ echo "<tr>";
    $aux=$row['idSoldat'];
    echo "<td>".$row['idSoldat']."</td>" ;
    echo "<td>".$row['Nume']."</td>";
    echo "<td>".$row['Prenume']."</td>";
    echo "<td>".$row['id_regiment']."</td>";
    echo "<td>".$row['id_disponibilate']."</td>";
    echo "<td>".$row['id_cazarma']."</td>";
    echo "<td>"."<form method='post'><input type='submit' name=$aux class='btn btn-danger' value='Stergere'"."</tr>";
    echo "<td>"."<form method='post'><input type='submit' name=$aux class='btn btn-info' value='Modificare'"."</tr>";

}

?>
</table>
<br><br><br>
<div class="x">
    
<form method="post"> 
        <label> id_Soldat </label>
        <input type="text" name="id_soldat">
        <br>
        <label> Nume </label>
        <input type="text" name="Nume">
        <br>
        <label> Prenume </label>
        <input type="text" name="Prenume">
        <br>
        <label> id_regiment</label>
        <input type="text" name="id_regiment">
        <br>
        <label> id_disponibilitate </label>
        <input type="text" name="id_disponibilitate">
        <br>
        <label> id_cazarma </label>
        <input type="text" name="cazarma">

 <br><br>
        <input type="submit" name="inserare"
        class="btn btn-success" value="inserare" /> 
    </form>
</div>



