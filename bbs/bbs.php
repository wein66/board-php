<?php
   $list = $DB->select("ndboard", "*", "order by num desc limit 0, 10");    
   $title = "게시판";
   require_once (_SITEPATH."/skin/list_header.php");

   foreach($list as $key => $row) {  
        $file = _SITEPATH."/skin/list.php";
        $body = file($file);
        $fsize = count($body);
        $bodys = []; 
      
        for($i=0; $i<$fsize; $i++){
            $wdate = date('Y-m-d', strtotime($row['wdate']));
            $bodys[$i] = str_replace('{{num}}', $row['num'], $body[$i]);
            $bodys[$i] = str_replace('{{title}}', $row['title'], $bodys[$i]);
            $bodys[$i] = str_replace('{{writer}}', $row['writer'], $bodys[$i]);
            $bodys[$i] = str_replace('{{wdate}}', $wdate, $bodys[$i]);
            $bodys[$i] = str_replace('{{hit}}', $row['hit'], $bodys[$i]);
       
            if($row['grLayer'] == 0) {
               $grLayer = "";
            }else{
               $grLayer = '<img src="images/blank.png" height="20" width="'.$row['grLayer'].'" />
               <i class="ri-corner-down-right-line"></i>';
            }
            $bodys[$i] = str_replace('{{grLayer}}', $grLayer, $bodys[$i]);
  
            if($row['memoCount'] > 0){
               $memoCount = "(".$row['memoCount'].")";
            }else{
               $memoCount = ""; 
            }    
            $bodys[$i] = str_replace('{{memoCount}}', $memoCount, $bodys[$i]);
            print $bodys[$i];
        }
   }

   include _SITEPATH."/skin/list_footer.php"
?>      