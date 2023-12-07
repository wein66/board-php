<?php
   require_once("../config/dbconfig.php");
   include "../sitepath.php";
   include _SITEPATH."/lib/lib.mysqli.php";
   $DB = new db; 

  $writer =  isset($_POST['writer'])?$_POST['writer']:"";
  $pass = isset($_POST['pass'])?$_POST['pass']:"";
  $title = isset($_POST['title'])?$_POST['title']:"";
  $content = isset($_POST['content'])?$_POST['content']:"";

  if($title == "" || $writer == ""|| $pass == ""|| $content == ""){
     echo "<script>
                alert('필수항목이 누락되었습니다.');
                location.href='../index.html';
           </script>";
  }
  $column = array(
     'orNum' => 0,
     'grNum' => 0,
     'writer' => $writer,
     'userpass' => $pass,
     'title' => $title,
     'contents' => $content
  );
  $rs = $DB->insert("ndboard", $column);
  //echo $rs;
  if($rs == 1){
     echo "<script>
               alert('성공적으로 등록했습니다.');
               location.href='../index.html';
           </script>";
  }else{
    echo "<script>
    alert('에러가 발생했습니다.');
    location.href='../index.html';
</script>";
  }
?>