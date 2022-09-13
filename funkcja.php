<?php
//$content = file_get_contents('http://loripsum.net/api');
$content = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur ac porttitor turpis, a gravida mi. Curabitur id dolor posuere, scelerisque nibh a, egestas erat. Sed in laoreet enim. Proin in consectetur nisl. Aliquam dapibus, orci id posuere malesuada, augue nisi dapibus elit, fermentum fringilla diam erat ac diam. Donec ut scelerisque ante. Sed nec ex sem. Nulla facilisi. Cras finibus sagittis sapien sed elementum. Integer ut nisi lectus.

Donec bibendum nisl a orci fermentum, vitae blandit sapien pulvinar. Mauris vitae tellus sit amet ligula tristique facilisis non vel eros. Nunc aliquet ligula leo. Morbi blandit condimentum nibh nec egestas. Maecenas.';
$array = explode(' ',$content);
$find = $_POST['find'];
natcasesort($array);
if("" == trim($_POST['find'])){
  print_r($array);
} else {
  foreach($array as $word){
    if( strpos($word, $find) !== false){
        $result[] = $word;
    }
  }
natcasesort($array);
print_r($result);
}     

?>