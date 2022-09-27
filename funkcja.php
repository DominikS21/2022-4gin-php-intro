
<?php
//$content = file_get_contents('http://loripsum.net/api');
$content = 'Lorem ipsum dolor sit amet consectetur adipiscing elit Curabitur ac porttitor turpis a gravida mi Curabitur id dolor posuere scelerisque nibh a egestas erat Sed in laoreet enim Proin in consectetur nisl Aliquam dapibus orci id posuere malesuada augue nisi dapibus elit fermentum fringilla diam erat ac diam donec ut scelerisque ante Sed nec ex sem Nulla facilisi Cras finibus sagittis sapien sed elementum Integer ut nisi lectus
donec bibendum nisl a orci fermentum, vitae blandit sapien pulvinar Mauris vitae tellus sit amet ligula tristique facilisis non vel eros Nunc aliquet ligula leo Morbi blandit condimentum nibh nec egestas Maecenas';
$array = explode(' ',$content);
natcasesort($array);
function SortSearch($array, $find) {
  if("" == trim($find)){
    print_r($array);
  } else {
    foreach($array as $word){
      if( strpos($word, $find) !== false){
          $result[] = $word;
      }
    }
    natcasesort($array);
    return $result;
}
}
function renderHTMLTable($array, $find, $col_number) {
  $result = SortSearch($array, $find);
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
  $table .= '</table>';
  return $table;
}
//echo renderHTMLTable($array, 'e', 5 );


function renderCSV($array, $col_number, $find) {
  $result = SortSearch($array, $find);
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
  return $table;

}

//echo renderCSV($array, 4, 'a');
function renderMD($array, $col_number, $find) {
  $szerokosc_tabeli = 50;
  $result = SortSearch($array, $find);
  $table = '';
  $y = $col_number;
    foreach(array_slice($result, 0, $col_number) AS $word) {
      $y++;
      $col_to_add = $y % $col_number;
      if (strlen($word)<  $szerokosc_tabeli) { 
        $liczba_do_dodania = $szerokosc_tabeli - strlen($word);
        if($col_to_add == 0) { $table .= '|'.$word.str_repeat(' ', $liczba_do_dodania).'|' ."\n".str_repeat('-', $szerokosc_tabeli * $col_number + $col_number); }
        else {
          $table .= '|'.$word.str_repeat(' ', $liczba_do_dodania); 
        }
      }
      else {
        if($col_to_add == 0) { $table .='|'.$word."\n"; }
        else {
          $table .= '|'.$word; 
        }
      }
    }
    $table .= "\n";
  $i = $col_number;  
  foreach($result AS $k => $word) {
    if ($k < $col_number) continue;
    $liczba_do_dodania = $szerokosc_tabeli - strlen($word);
    $i++;
    $col_to_add = $i % $col_number;
    if (strlen($word)<$szerokosc_tabeli) { 
    if($col_to_add == 0) { 
      $table .= '|'.$word.str_repeat(' ', $liczba_do_dodania ).'|'."\n"; }
      else {
        $table .= '|'.$word.str_repeat(' ', $liczba_do_dodania ); 
      }
    }                       
    else {
      if($col_to_add == 0) {
      $table .= $word."\n"; }
      else {
        $table .= '|'.$word; 
      }
    }
  }
  return $table;
}
echo renderMD($array, 4, 'a');
?>