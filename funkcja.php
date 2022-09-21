
<?php
//$content = file_get_contents('http://loripsum.net/api');
$content = 'Lorem ipsum dolor sit amet consectetur adipiscing elit Curabitur ac porttitor turpis a gravida mi Curabitur id dolor posuere scelerisque nibh a egestas erat Sed in laoreet enim Proin in consectetur nisl Aliquam dapibus orci id posuere malesuada augue nisi dapibus elit fermentum fringilla diam erat ac diam Donec ut scelerisque ante Sed nec ex sem Nulla facilisi Cras finibus sagittis sapien sed elementum Integer ut nisi lectus

Donec bibendum nisl a orci fermentum, vitae blandit sapien pulvinar Mauris vitae tellus sit amet ligula tristique facilisis non vel eros Nunc aliquet ligula leo Morbi blandit condimentum nibh nec egestas Maecenas';
$array = explode(' ',$content);
natcasesort($array);

function renderHTMLTable($array, $col_number, $find) {
  if("" == trim($find)){
    print_r($array);
  } else {
    foreach($array as $word){
      if( strpos($word, $find) !== false){
          $result[] = $word;
      }
    }
    natcasesort($array);
  $table = '';
  $table .= '<table>';
  $y = $col_number;
    foreach(array_slice($result, 0, $col_number) AS $word) {
      $table .= '<th>' .$word. '</th>'; 
      $y++;
      if($y == $col_number) { $table .= '<tr></tr>'; }
    }
    $table .= '</tr>';
  $i = $col_number;  
  foreach($result AS $k => $word) {
    if ($k < $col_number) continue;
    $table .= '<td>' .$word. '</td>'; 
    $i++;
    $col_to_add = $i % $col_number;
    if($col_to_add == 0) { $table .= '<tr></tr>'; }
  }
  }
  $table .= '</table>';
  return $table;
}
//echo renderHTMLTable($array, $_POST['liczba'], $_POST['find'] );


function renderCSV($array, $col_number, $find) {
  if("" == trim($find)){
    print_r($array);
  } else {
    foreach($array as $word){
      if( strpos($word, $find) !== false){
          $result[] = $word;
      }
    }
    natcasesort($array);
  $table = '';
  $y = $col_number;
    foreach(array_slice($result, 0, $col_number) AS $word) {
      $y++;
      $col_to_add = $y % $col_number;
      if($col_to_add == 0) { $table .= $word; }
      else {
        $table .= $word. ';'; 
      }
    }
    $table .= "\n";
  $i = $col_number;  
  foreach($result AS $k => $word) {
    if ($k < $col_number) continue;
    $i++;
    $col_to_add = $i % $col_number;
    if($col_to_add == 0) { 
      $table .= $word."\n"; }
      else {
        $table .= $word. ';'; 
      }
      
  }
  }
  return $table;

}
echo renderCSV($array, 2, 'e');
function renderMD($array, $x, $find) {
  if("" == trim($find)){
    print_r($array);
  } else {
    foreach($array as $word){
      if( strpos($word, $find) !== false){
          $result[] = $word;
      }
    }
    natcasesort($array);
}


}
//renderMD($array, $_POST['liczba'], $_POST['find']);
?>