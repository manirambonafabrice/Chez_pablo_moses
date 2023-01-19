<?php
	
function cript($pwd,$key ){

$pwd1= strlen($pwd);
$key1 = strlen($key);

if($key1>$pwd1){

$key = substr($key,0,$pwd1);

}elseif ($key1<$pwd1){

$key = str_pad($key,$pwd1,$key,STR_PAD_RIGHT);
}
return $pwd^$key;
}

 ?>