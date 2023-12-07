<div class="container">
<form class="row was-validated" action="bbs/write_ok.php" name="write_form" method="post">
    <div class="col-md-6 my-3">
        <div class="row align-items-center">
           <label class="col-2" for="writer">이름</label>
           <div class="col-10">
               <input type="text" name="writer" class="form-control"
               placeholder="이름" id="writer" required />
           </div>    
        </div>       
    </div>
    <div class="col-md-6 row align-items-center my-3">
        <label class="col-2" for="pass">비밀번호</label>
        <div class="col-10">
              <input type="password" name="pass" class="form-control"
               placeholder="비밀번호" id="pass" required />
        </div>       
    </div>
    <div class="col-md-12 row align-items-center my-3">
        <label class="col-md-1" for="title">제목</label>
        <div class="col-md-11">
            <input type="text" name="title" class="form-control"
               placeholder="이름" id="title" required />
        </div>
    </div>
    <div class="col-md-12 row align-items-center my-3">
        <label class="col-md-1" for="title">내용</label>
        <div class="col-md-11">
           <textarea id="content" name="content" class="form-control"></textarea>
        </div>
    </div>      
    <div class="col-md-12 text-center my-3">
        <button type="reset" class="btn btn-danger mr-3"> 취 소 </button>
        <button type="submit" class="btn btn-secondary ml-3"> 전 송 </button>
    </div>  
    <input type="hidden" name="userid" value={{userid}} />
    <input type="hidden" name="imnum" id="imnum" />
</form>
</container>