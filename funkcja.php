<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
  tr, th, td {
  border: 1px solid;
}</style>
</head>
</html>
<?php
//$content = file_get_contents('http://loripsum.net/api');
$content = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur ac porttitor turpis, a gravida mi. Curabitur id dolor posuere, scelerisque nibh a, egestas erat. Sed in laoreet enim. Proin in consectetur nisl. Aliquam dapibus, orci id posuere malesuada, augue nisi dapibus elit, fermentum fringilla diam erat ac diam. Donec ut scelerisque ante. Sed nec ex sem. Nulla facilisi. Cras finibus sagittis sapien sed elementum. Integer ut nisi lectus.

Donec bibendum nisl a orci fermentum, vitae blandit sapien pulvinar. Mauris vitae tellus sit amet ligula tristique facilisis non vel eros. Nunc aliquet ligula leo. Morbi blandit condimentum nibh nec egestas. Maecenas.';
$array = explode(' ',$content);
natcasesort($array);
function renderHTMLTABLE($array) {
  $find = $_POST['find'];
  if("" == trim($_POST['find'])){
    print_r($array);
  } else {
    foreach($array as $word){
      if( strpos($word, $find) !== false){
          $result[] = $word;
      }
    }
    natcasesort($array);
  $x = $_POST['liczba'];
  echo '<table>';
  $y = $x;
    foreach(array_slice($result, 0, $x) AS $word) {
      echo '<th>' .$word. '</th>'; 
      $y++;
      if($y == $x) { echo '<tr></tr>'; }
    }
  $i = $x;  
  foreach($result AS $k => $word) {
    if ($k < $x) continue;
    echo '<td>' .$word. '</td>'; 
    $i++;
    $col_to_add = $i % $x;
    if($col_to_add == 1) { echo '<tr></tr>'; }
  }
  }
  echo '</table>';
}
echo renderHTMLTABLE($array);
?>