
function calc(){

    let palletW = document.querySelector('input[name="pt-width"]').value;
    let palletH = document.querySelector('input[name="pt-height"]').value;
    let palletL = document.querySelector('input[name="pt-length"').value;
    let doublePallet = document.querySelector('input[name="double-pallet"]').checked;
    let palletN = document.querySelector('input[name="pt-number"]').value;
    let palletResult20 = 0;
    let palletResult40 = 0;
    let palletAdditional = 0;
  
    const container20 = {

    containerL: 591.9,
    containerW: 234,
    containerH: 238

    };

    const container40 = {
        containerL: 1204.5,
        containerW: 230.9,
        containerH: 237.9
    };

    while(true){
        container20.containerL -= palletL;
        palletResult20++
        
        if(container20.containerL-20 <= palletL) // sprawdza czy mozna wlozyc jeszcze jedna palete (zapas 20cm)
        {
            break;
        }
       
    }
    if(container20.containerW > palletW*2){
        palletResult20 *= 2; // sprawdza czy mozna zrobic drugi rzad palet
    }
    if(doublePallet && container20.containerH > palletH*2+20){
        palletResult20 *= 2; // sprawdza czy jest mozliwosc pietrowania oraz czy uzytkownik chce je pietrowac
    }

    
    palletAdditional = palletResult20 - palletN; // ile jeszcze miejsca zostanie na palety
    if(palletN <= palletResult20){
        document.querySelector(".result").innerHTML = "Można załadować "+palletN+" palet na kontener 20vd. Zostanie miejsca jeszcze na: "+palletAdditional;
    }
    else{ // jezeli podana ilosc palet nie zmiesci sie na kontener 20ton to sprawdzamy ile wejdzie na 40ton

        while(true){
            container40.containerL -= palletL;
            palletResult40++
            
            if(container40.containerL-20 <= palletL)
            {
                break;
            }
           
        }
        if(container40.containerW > palletW*2){
            palletResult40 *= 2;
        }
        if(doublePallet && container40.containerH > palletH*2+20){
            palletResult40 *= 2;
        }
    
     
        palletAdditional = palletResult40 - palletN;





        document.querySelector(".result").innerHTML = "Na kontener 20vd zmieści się tylko: "+palletResult20+'<br>'+" Na kontener 40vd można załadować "+palletN+" palet. Zostanie miejsca jeszcze na: "+palletAdditional;
    }


}
