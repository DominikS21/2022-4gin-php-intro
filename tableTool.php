<?php
require_once "tableTool.interface.php";
class tableTool implements tableToolInterface{
    var $table_data;
    public function __construct($data)
    {
        $this->table_data=$data;
    }
    public function SortSearch($filterString) {
        if("" == trim($filterString)){
          sort($this->table_data, SORT_NATURAL | SORT_FLAG_CASE);
          foreach($this->table_data as $word){
                $result[] = $word;
          }
          return $result;
        } else {
          foreach($this->table_data as $word){
            sort($this->table_data, SORT_NATURAL | SORT_FLAG_CASE);
            if( strpos($word, $filterString) !== false){
                $result[] = $word;
            }
          }
          return $result;
      }
      }
    public function renderHTML($cols, $filterString = '') {
        $result = $this->SortSearch($filterString);
        $table = '';
        $table .= '<table>';
        $y = $cols;
          foreach(array_slice($result, 0, $cols) AS $word) {
            $table .= '<th>' .$word. '</th>'; 
            $y++;
            if($y == $cols) { $table .= '<tr></tr>'; }
          }
          $table .= '</tr>';
        $i = $cols;  
        foreach($result AS $k => $word) {
          if ($k < $cols) continue;
          $table .= '<td>' .$word. '</td>'; 
          $i++;
          $col_to_add = $i % $cols;
          if($col_to_add == 0) { $table .= '<tr></tr>'; }
        }
        $table .= '</table>';
        return $table;
      }
      public function renderCSV($cols, $filterString='') {
        $result = $this->SortSearch($filterString);
        $table = '';
        $y = $cols;
          foreach(array_slice($result, 0, $cols) AS $word) {
            $y++;
            $col_to_add = $y % $cols;
            if($col_to_add == 0) { $table .= $word; }
            else {
              $table .= $word. ';'; 
            }
          }
          $table .= "\n";
        $i = $cols;  
        foreach($result AS $k => $word) {
          if ($k < $cols) continue;
          $i++;
          $col_to_add = $i % $cols;
          if($col_to_add == 0) { 
            $table .= $word."\n"; }
            else {
              $table .= $word. ';'; 
            }
            
        }
        return $table;
      
      }
      
      public function renderMD($cols, $filterString='') {
        $szerokosc_tabeli = 20;
        $result = $this->SortSearch($filterString);
        $table = '';
        $y = $cols;
          foreach(array_slice($result, 0, $cols) AS $word) {
            $y++;
            $col_to_add = $y % $cols;
            if (strlen($word)<  $szerokosc_tabeli) { 
              $liczba_do_dodania = $szerokosc_tabeli - strlen($word);
              if($col_to_add == 0) { $table .= '|'.$word.str_repeat(' ', $liczba_do_dodania).'|' ."\n".str_repeat('-', $szerokosc_tabeli * $cols + $cols); }
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
        $i = $cols;  
        foreach($result AS $k => $word) {
          if ($k < $cols) continue;
          $liczba_do_dodania = $szerokosc_tabeli - strlen($word);
          $i++;
          $col_to_add = $i % $cols;
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
}

// NIE DOTYKAĆ KODU PONIŻEJ TEJ LINIJKI

$array = explode(' ', file_get_contents('lorem.txt'));

$table = new tableTool($array);

// Tests
echo $table->renderHTML(3);
echo $table->renderHTML(10);
echo $table->renderHTML(5,'id');
echo $table->renderCSV(3);
echo $table->renderCSV(10);
echo $table->renderCSV(5,'id');
echo $table->renderMD(3);
echo $table->renderMD(10);
echo $table->renderMD(5,'id');