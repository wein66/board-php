<?php
   $DB = new db; 
   $num = isset($_GET['num'])?$_GET['num']: print('<script>alert("에러입니다.");location.href="index.html";</script>');
   $rs = $DB->select("ndboard", "*", "and num = {$num}");  
   $row = $rs[0];
   include_once _SITEPATH."/skin/view_header.php";
   include_once _SITEPATH."/skin/view.php";
   include_once _SITEPATH."/skin/view_footer.php";
?>   