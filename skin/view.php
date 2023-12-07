<div class="container">
   <div class="row flex-column view">
    <div class="title py-3 pl-2">
           <?=$row['title']?> 
    </div>
</div>
<div class="row view_info py-3">
    <div class="col-8 d-flex">  
         <div class="date pr-5">2023.09.22</div>
         <div class="write pr-5"><?=$row['writer']?></div>
         <div class="hit">hit: <?=$row['hit']?></div>
    </div>
    <div class="col-4 sns text-right">
         <a href="#" class="mr-3"><i class="ri-instagram-line"></i></a>
         <a href="#" class="mr-3"><i class="ri-facebook-circle-line"></i></a>
         <a href="#" class="mr-3"><i class="ri-kakao-talk-line"></i></a>
         <a href="#"><i class="ri-youtube-line"></i></a>
    </div>   
</div>
<div class="content py-5">
    <?=$row['contents'] ?>
</div>
<div class="row justify-content-end mb-5">
    <a href="/rewrite/<?=$row['num']?>" class="btn btn-dark text-white px-3 mr-3">답변</a>
    <a href="?mode=update&num=<?=$row['num']?>" class="btn btn-dark text-white px-3 mr-3">수정</a>
    <button type="button" 
            class="btn btn-dark text-white px-3 mr-3"
            data-target="#delModal" data-toggle="modal"
            data-char="main" data-delnum="<?=$row['num']?>"
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
                    <input type="hidden" id="delnum" value="<?=$row['num']?>" />  
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