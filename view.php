<?php
   require_once("./config/dbconfig.php");
   include "./lib/lib.mysqli.php";
   $DB = new db; 
   $num = isset($_GET['num'])?$_GET['num']:'';
   $row = $DB->select("ndboard", "*", "and num = {$num}");    
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>게시판</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
   <div class="container">
   <div class="row flex-column view">
    <div class="title py-3 pl-2">
           <?=$row[0]['title']?> 
    </div>
</div>
<div class="row view_info py-3">
    <div class="col-8 d-flex">  
         <div class="date pr-5">2023.09.22</div>
         <div class="write pr-5"><?=$row[0]['writer']?></div>
         <div class="hit">hit: <?=$row[0]['hit']?></div>
    </div>
    <div class="col-4 sns text-right">
         <a href="#" class="mr-3"><i class="ri-instagram-line"></i></a>
         <a href="#" class="mr-3"><i class="ri-facebook-circle-line"></i></a>
         <a href="#" class="mr-3"><i class="ri-kakao-talk-line"></i></a>
         <a href="#"><i class="ri-youtube-line"></i></a>
    </div>   
</div>
<div class="content py-5">
    <?=$row[0]['contents'] ?>
</div>
<div class="row justify-content-end mb-5">
    <a href="/rewrite/<?=$row[0]['num']?>" class="btn btn-dark text-white px-3 mr-3">답변</a>
    <a href="/edit/<?=$row[0]['num']?>" class="btn btn-dark text-white px-3 mr-3">수정</a>
    <button type="button" 
            class="btn btn-dark text-white px-3 mr-3"
            data-target="#delModal" data-toggle="modal"
            data-char="main" data-delnum="<?=$row[0]['num']?>"
    >삭제</button>
    <a href="index.html" class="btn btn-dark text-white px-3">목록</a>
</div>

<div class="modal fade" role="dialog" 
     id="delModal" tabindex="-1" 
     aria-labelledby="delModalLabel"
     aria-hidden="true"
>
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-danger">삭제</h5>
                <button type="button" class="close"
                        data-dismiss="modal" arial-label="close">
                    <i class="ri-close-line"></i>     
                </button>
            </div>
        <form>    
            <div class="modal-body">
                <p>삭제 하시려면 비밀번호를 입력하세요</p>
                    <input type="password" class="form-control" 
                           id="password_del"
                           placeholder="비밀번호" />
                    <input type="hidden" id="delnum" value="<?=$row[0].num?>" />  
                    <input type="hidden" id="comment_delnum" />   
                    <input type="hidden" id="char" />
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">취소</button>
                <button type="button" class="btn btn-danger" id="del">삭제하기</button>
            </div>
        </form>
        </div>
    </div>
</div>
   </div>

   <script src="js/jquery.min.js"></script>
   <script src="js/popper.min.js"></script>
   <script src="js/bootstrap.min.js"></script>
   <script src="js/custom.js"></script>
</body>
</html>