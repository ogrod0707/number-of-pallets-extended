<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
   
<div class="container">
    <div class="howmuch">
        <form action="index.php" method="GET">
            <label for="pt-kind">Rodzaje palet: </label>
            <input type="number" name="pt-kind">
            <input type="submit">
        </form> <br>
    </div>

     <?php

    if(isset($_GET['pt-kind']))
    {
        $pt_kind = $_GET['pt-kind'];
        var_dump($pt_kind);
    for($i = 1; $i <= $pt_kind; $i++){

echo <<<END

<form action="index.php" method="POST">
 <label for="pt-number">Ilość palet:</label>
    <input name="pt-number" type="number"><br>
   <h3>Wymiary palety $i:</h3>
<div class='pallet'>
    <label for="pt-width">Width</label>
    <input name="pt-width$i" type="number"><br>
    <label for="pt-height">Height</label>
    <input name="pt-height" type="number"><br>
    <label for="pt-length">Length</label>
    <input name="pt-length"type="number"><br>
    


    <label for="double-pallet">Piętrowalne palety? </label>
    <input name="double-pallet"type="checkbox"><br>
   


END;
} }
   


function calc($palletL, $palletW, $palletH, $palletN){

    $palletResult = 0;
    $container20L = 591.9;
    $container20W = 234;
    $container20H = 238;
    $container40L = 1204.5;
    $container40W = 230.9;
    $container40H = 237.9;


    for($i = 1; $i <= $palletN; $i++){
        $container20L -= $palletL;
        $palletResult++;
        if($container20L-20 <= $palletL){
            echo"Palety nie zmieszcza sie na jeden kontener";
            break;
        }
        if($palletN == $palletResult){
            echo"$palletN zmiesci sie na kontenerze 20vd";
            break;
        }
        
    }
    
}


if(isset($_GET['pt-kind'])){
    $pt_kind = $_GET['pt-kind'];
    switch($pt_kind){
        case 1:
            if(isset($_GET['pt-length'])){
                echo calc(25,12,12,5);
               
            }
            break;
        case 2:
            echo"dwie pal";
            break;
    }
    
}




?> 
<input type="submit" value="OK" ">
</div>
    <br></br>
    </form>


<?php

echo calc(122,112,122,6);

?>
</div>







</body>
</html>