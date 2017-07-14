<?php

$get_rut = $_GET['rut'];

if (!preg_match('/^\d{1,2}\.\d{3}\.\d{3}[-][0-9kK]{1}$/i',$get_rut)){
   echo "Asegúrate de ingresar el Rut en este formato XX.XXX.XXX-X";
   exit();
}

function validaRut($rut){
    if(strpos($rut,"-")==false){
        $RUT[0] = substr($rut, 0, -1);
        $RUT[1] = substr($rut, -1);
    }else{
        $RUT = explode("-", trim($rut));
    }
    $elRut = str_replace(".", "", trim($RUT[0]));
    $factor = 2;
    for($i = strlen($elRut)-1; $i >= 0; $i--):
        $factor = $factor > 7 ? 2 : $factor;
        $suma += $elRut{$i}*$factor++;
    endfor;
    $resto = $suma % 11;
    $dv = 11 - $resto;
    if($dv == 11){
        $dv=0;
    }else if($dv == 10){
        $dv="k";
    }else{
        $dv=$dv;
    }
   if($dv == trim(strtolower($RUT[1]))){
       return true;
   }else{
       return false;
   }
}

if($get_rut){
    if(validaRut($get_rut)==true){
        echo "El rut es válido";
    }else{
         echo "El Rut ingresado es invalido";
    }
}
