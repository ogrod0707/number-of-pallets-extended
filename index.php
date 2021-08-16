<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pallet calculator</title>
    
    <link rel="stylesheet" href="style.css">
</head>
<body>

  <div class="back">
  <a href="index.php">Reset</a>
  <a href="contenerinfo.php">Wymiary kontenerów</a>
  </div>
  
<div class="container">
    <div class="howmuch">
        <form action="index.php" method="GET">
            <label for="pt-kind"> Rodzaje palet: </label>
            <input type="number" name="pt-kind">
            <input type="submit" value="OK">
        </form> <br>
    </div>
<div class="boxes">
     <?php

    if(isset($_GET['pt-kind']))
    {
        
        $pt_kind = $_GET['pt-kind'];
      
    for($i = 1; $i <= $pt_kind; $i++){

echo <<<END

<form action="index.php" method="POST">
<div class='pallet'>
 <label for="pt-number$i">Ilość palet:</label>
    <input id="pt-number$i" name="pt-number$i"  type="number"><br>
   <h3>Wymiary palety $i:</h3>

    <label for="pt-width$i">Width&nbsp;</label>
    <input id="pt-width$i"  name="pt-width$i" type="number"><br>
    
    <label for="pt-length$i">Length</label>
    <input id="pt-length$i" name="pt-length$i" type="number"><br>
    <label for="pt-height$i">Height</label>
    <input id="pt-height$i" name="pt-height$i" type="number"><br>


    <label for="double-pallet$i">Piętrowalne palety? </label>
    <input id="double-pallet$i" name="double-pallet$i" type="checkbox" value="true"><br>
   </div>


END;
}       
       
}


?> 
</div>
<input type="submit" value="Oblicz" class="oblicz">

    <br></br>
    </form>

<div class="result">

<?php

 $palletResult = 0;
$container20L = 591.9;
$container20W = 234;
$container20H = 238;
$container40L = 1204.5;
$container40W = 230.9;
$container40H = 237.9;


if(isset($_POST['pt-width2'])){
 
  $pt_length1 = $_POST['pt-length1'];
  $pt_width1 = $_POST['pt-width1'];
  $pt_height1 = $_POST['pt-height1'];
  $pt_number1 = $_POST['pt-number1'];
  $pt_length2 = $_POST['pt-length2'];
  $pt_width2 = $_POST['pt-width2'];
  $pt_height2 = $_POST['pt-height2'];
  $pt_number2 = $_POST['pt-number2'];
  $pt_double2 = false;
  $additionalSpace = 0;
  // $pt_double2 = $_POST['double-pallet2'];
  $x = $pt_number1+$pt_number2;
  $pt_amount1 =$pt_length1 * $pt_number1;
  $pt_amount2 =$pt_length2 * $pt_number2;
  
  var_dump($pt_amount1);
  if($pt_width1*2-10 < $container20W){ // sprawdza czy mozna ustawic dwa rzędy
         
      $pt_amount1 /= 2;
      echo"Mozna ustawic 2 rzędy 1 rodzaju palety<br>";
    }
    else{
      $additionalSpace += $pt_amount1;
    }

    
    if(isset($_POST['double-pallet1'])){ // sprawdza czy uzytkownik chce pietrowalne palety i czy mozna
   
      if($pt_height1 * 2  - 15 < $container20H) {
        $pt_amount1 /= 2;
      }
      else{
        echo"Nie mozna piętrować palety 1 rodzaju<br>";
      }
     
      
    }


    if($pt_width2*2-10 < $container20W){ // sprawdza czy mozna ustawic dwa rzędy
         
      $pt_amount2 /= 2;
      echo"Mozna ustawic 2 rzędy 2 rodzaju palety<br>";
    }
    
    if(isset($_POST['double-pallet2']) ){// sprawdza czy uzytkownik chce pietrowalne palety i czy mozna
      
      if($pt_height2 * 2  - 15 < $container20H) {
        $pt_amount2 /= 2;
        $pt_double2 = true;
      }
      else{
        echo"Nie mozna piętrować palety 2 rodzaju<br>";
      }

    }

    if(!($pt_width2*2-10 < $container20W)){
      $additionalSpace += $pt_amount2;
    }
    var_dump($additionalSpace);
    var_dump($pt_amount1);
    if($pt_width1 - 10 < ($container20W - $pt_width2)){

      if($pt_double2)
      {
        $pt_amount1 -= $additionalSpace*2;
        var_dump("HERE");
      }
      else{
        $pt_amount1 -= $additionalSpace;
        var_dump("or here");
      }
      var_dump($pt_amount1);
    
    }

    $pt_all = $pt_amount1 + $pt_amount2;
  if($pt_all - 20 <= $container20L) {

    echo"Na kontener 20vd mozna zaladowac: $x palet";
      
  }
  else if($pt_all - 20 <= $container40L){
     
    
      echo"Na kontener 40vd mozna zaladowac: $x palet";
  }
  else if($pt_all - 20 <= ($container20L+$container20L))
      {
        echo"Na dwa kontenery 20vd mozna zaladowac: <br>$x palet ";
      }
      else if($pt_all- 20 <= ($container20L + $container40L))
      {
        echo"Potrzeba kontenera 20vd oraz 40vd żeby zaladowac: $x palet";
      }
  else
  {
      echo"Sprawdź wymiary lub oblicz samodzielnie :)";
  }
}


else if(isset($_POST['pt-width1'])){

      $pt_length1 = $_POST['pt-length1'];
      $pt_width1 = $_POST['pt-width1'];
      $pt_height1 = $_POST['pt-height1'];
      $pt_number1 = $_POST['pt-number1'];
      $pt_amount1 =$pt_length1 * $pt_number1; // ile palety zajmą długości kontenera
      
      if($pt_width1*2-10 < $container20W){
         
        $pt_amount1 /= 2;
      }
      
      if(isset($_POST['double-pallet1'])){

        if($pt_height1 * 2  - 15 < $container20H) {
          $pt_amount1 /= 2;
        }
        else{
          echo"Nie mozna piętrować palet<br>";
        }


      }
     
      if($pt_amount1 - 20 <= $container20L) {
          
              echo"Na kontener 20vd mozna zaladowac: <br>$pt_number1 palet ";
          
      }
      else if($pt_amount1 - 20 <= $container40L){
         
        
          echo"Na kontener 40vd mozna zaladowac: $pt_number1 palet";
      }
      else if($pt_amount1 - 20 <= ($container20L+$container20L))
      {
        echo"Na dwa kontenery 20vd mozna zaladowac: <br>$pt_number1 palet ";
      }
      else if($pt_amount1 - 20 <= ($container20L + $container40L))
      {
        echo"Potrzeba kontenera 20vd oraz 40vd żeby zaladowac: $pt_number1 palet";
      }
      else
      {
          echo"Sprawdź wymiary lub oblicz samodzielnie :)";
      }
  }






?>
</div>

</div>





</body>
</html>