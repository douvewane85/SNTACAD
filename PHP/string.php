<?php
$GLOBALS['minuscules']=bbw_get_caracteres('a','z');
$GLOBALS['majuscules']=bbw_get_caracteres();
define("UPPER",true);
define("LOWER",false);


function bbw_strlen($string){
     $cpt=0;
     while(isset($string[$cpt])){
         $cpt++;
     }
     return $cpt;
}

function bbw_is_tolower($char){
   return $char>='a' && $char<='z';   
}
function bbw_is_toupper($char){
    return $char>='A' && $char<='Z';   
    
}

function bbw_is_alphabetique($string){
    $i=0;
    $taille=bbw_strlen($string);

    while($i<$taille){
        $char=$string[$i];
       if(!bbw_is_tolower($char) and !bbw_is_toupper($char)){
           return false;
       }   
        $i++;
    }
    return true; 
}


function bbw_change_case_char($char,$case=UPPER){
       if($case){
              $search_key="minuscules" ;
              $return_key="majuscules" ;
       }else{
           $search_key="majuscules" ;
           $return_key="minuscules" ;
       }
       $i=0;
        while($i<=26 ){
            if($GLOBALS[$search_key][$i]==$char){
                return $GLOBALS[$return_key][$i] ;
            }
            $i++;
            
        }
         return $char;
    
}

function bbw_change_case($string,$case=UPPER){
    $i=0;
    $result="";
    $taille=bbw_strlen($string);
    while($i<$taille){
        $result.= bbw_change_case_char($string[$i],$case);
        $i++;

    }
    return $result;
   
 
}

function bbw_get_caracteres($debut='A',$fin='Z'){
    $cpt=0;
    $caracteres="";
    for($i=$debut,$cpt=0;$i<=$fin,$cpt<=26;$i++,$cpt++){
       if($cpt==26) break;
       $caracteres.=$i;
    }
       return $caracteres;
}





function bbw_count_char_in_string($char,$string){
    $i=0;
    $taille=bbw_strlen($string);
    $char=bbw_change_case_char($char);
    $string=bbw_change_case($string);
    $cpt=0;
     while($i<$taille ){
        if($string[$i]==$char) $cpt++;
         $i++; 
     }
     return $cpt;

}
?>