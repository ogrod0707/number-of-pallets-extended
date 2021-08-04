<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pallet calculator</title>
    
    <link rel="stylesheet" href="style2.css">
</head>
<body>
  <br></br>
   <a href="index.php">Wróć</a>
<div class="container">
    <div class="howmuch">
        <form action="index.php" method="GET">
            <label for="pt-kind">Rodzaje palet: </label>
            <input type="number" name="pt-kind">
            <input type="submit" value="OK">
        </form> <br>
    </div>

     <?php

    if(isset($_GET['pt-kind']))
    {
        
        $pt_kind = $_GET['pt-kind'];
      
    for($i = 1; $i <= $pt_kind; $i++){

echo <<<END

<form action="index.php" method="POST">
<div class='pallet'>
 <label for="pt-number">Ilość palet:</label>
    <input name="pt-number$i" type="number"><br>
   <h3>Wymiary palety $i:</h3>

    <label for="pt-width">Width</label>
    <input name="pt-width$i" type="number"><br>
    <label for="pt-height">Height</label>
    <input name="pt-height$i" type="number"><br>
    <label for="pt-length">Length</label>
    <input name="pt-length$i"type="number"><br>
    


    <label for="double-pallet">Piętrowalne palety? </label>
    <input name="double-pallet$i" type="checkbox" value="true"><br>
   </div>


END;
}       
       
}


?> 

<input type="submit" value="Oblicz" >

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


if(isset($_POST['pt-width3'])){
 
    $pt_length1 = $_POST['pt-length1'];
    $pt_width1 = $_POST['pt-width1'];
    $pt_height1 = $_POST['pt-height1'];
    $pt_number1 = $_POST['pt-number1'];
    $pt_length2 = $_POST['pt-length2'];
    $pt_width2 = $_POST['pt-width2'];
    $pt_height2 = $_POST['pt-height2'];
    $pt_number2 = $_POST['pt-number2'];
    $pt_length3 = $_POST['pt-length3'];
    $pt_width3 = $_POST['pt-width3'];
    $pt_height3 = $_POST['pt-height3'];
    $pt_number3 = $_POST['pt-number3'];
    // $pt_double2 = $_POST['double-pallet2'];
    $x = $pt_number1+$pt_number2+$pt_number3;
    $pt_amount1 =$pt_length1 * $pt_number1;
    $pt_amount2 =$pt_length2 * $pt_number2;
    $pt_amount3 =$pt_length3 * $pt_number3;
    if($pt_width1*2-10 < $container20W){
           
        $pt_amount1 /= 2;
      }

      
      if(isset($_POST['double-pallet1'])){
        $pt_amount1 /= 2;
      }


      if($pt_width2*2-10 < $container20W){
           
        $pt_amount2 /= 2;
      }
      
      if(isset($_POST['double-pallet1'])){
        $pt_amount2 /= 2;
      }

      if($pt_width3*2-10 < $container20W){
           
        $pt_amount3 /= 2;
      }
      
      if(isset($_POST['double-pallet1'])){
        $pt_amount3 /= 2;
      }

    $pt_all = $pt_amount1 + $pt_amount2 + $pt_amount3;
    if($pt_all - 20 <= $container20L) {
            echo"Na kontener 20vd mozna zaladowac: <br>$pt_number1 palet pierwszego rodzaju, $pt_number2 drugiego rodzaju oraz $pt_number3 trzeciego rodzaju.";
        
    }
    else if($pt_all - 20 <= $container40L){
       
      
        echo"Na kontener 40vd mozna zaladowac: $x palet";
    }
    else
    {
        echo"załadunek nie zmiesci sie na jednym kontenerze";
    }
}


else if(isset($_POST['pt-width2'])){
 
    $pt_length1 = $_POST['pt-length1'];
    $pt_width1 = $_POST['pt-width1'];
    $pt_height1 = $_POST['pt-height1'];
    $pt_number1 = $_POST['pt-number1'];
    $pt_length2 = $_POST['pt-length2'];
    $pt_width2 = $_POST['pt-width2'];
    $pt_height2 = $_POST['pt-height2'];
    $pt_number2 = $_POST['pt-number2'];
    // $pt_double2 = $_POST['double-pallet2'];
    $x = $pt_number1+$pt_number2;
    $pt_amount1 =$pt_length1 * $pt_number1;
    $pt_amount2 =$pt_length2 * $pt_number2;
    
   
    if($pt_width1*2-10 < $container20W){
           
        $pt_amount1 /= 2;
      }

      
      if(isset($_POST['double-pallet1'])){
        $pt_amount1 /= 2;
      }


      if($pt_width2*2-10 < $container20W){
           
        $pt_amount2 /= 2;
      }
      
      if(isset($_POST['double-pallet1'])){
        $pt_amount2 /= 2;
      }

      $pt_all = $pt_amount1 + $pt_amount2;
    if($pt_all - 20 <= $container20L) {

            echo"Na kontener 20vd mozna zaladowac: <br>$pt_number1 palet pierwszego rodzaju oraz $pt_number2 drugiego rodzaju.";
        
    }
    else if($pt_all - 20 <= $container40L){
       
      
        echo"Na kontener 40vd mozna zaladowac: $x palet";
    }
    else
    {
        echo"załadunek nie zmiesci sie na jednym kontenerze";
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
          $pt_amount1 /= 2;
        }
       
        if($pt_amount1 - 20 <= $container20L) {
            
                echo"Na kontener 20vd mozna zaladowac: <br>$pt_number1 palet ";
            
        }
        else if($pt_amount1 - 20 <= $container40L){
           
          
            echo"Na kontener 40vd mozna zaladowac: $pt_number1 palet";
        }
        else
        {
            echo"załadunek nie zmiesci sie na jednym kontenerze";
        }
    }





?>
</div>

</div>





</body>
</html>