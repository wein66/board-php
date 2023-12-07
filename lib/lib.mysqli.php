<?php
   /*** db model */
   class db{
      private $_host = MYSQL_HOST;
      private $_user = MYSQL_USER;
      private $_pass = MYSQL_PASS;
      private $_database = MYSQL_DB;
      private $_conn;

      /*** 생성자 함수  mysqli(호스트, 유저, 비밀번호, 디비이름)*/  
      public function __construct(){
         $this->_conn = new mysqli(
                           $this->_host,
                           $this->_user,
                           $this->_pass,
                           $this->_database 
                        );
         $this->_conn -> set_charset("utf8mb4");
         if(mysqli_connect_errno()){
            echo "db 접속 에러 : " . mysqli_connect_errno();
            exit();
         }
      }  //생성자 함수를 통한 db 연결

      //query 메소드
      public function iquery($sql){
         $res = $this ->_conn->query($sql) or die(mysqli_error($this->_result));
         return $res;
      } 

      /** 읽기 
       * select * from 테이블 where = 1 (and a=b and b=c)
       * 
      */
      public function select($tbl, $str, $where=''){
        if($tbl){
           $tbl = " FROM {$tbl} where 1 ";
           $qry = "SELECT {$str} {$tbl} {$where}";
           //echo $qry;
           $rs = $this->iquery($qry);
           $total = $rs->num_rows;  //배열의 갯수를 읽어옴
           $row = array();
           $row[0]['total'] = $total;
           if($total > 0) {
              $i = 0;
              while($rows = $rs->fetch_assoc()){
                  foreach($rows as $key => $val){
                     $row[$i][$key] = $val;
                  }
                $i++;  
              }
           } //end if
           mysqli_free_result($rs);
           return $row;
           $this->_conn->close();
        }
      }//select

      /************************ 입력 **********/
      public function insert($tbl, $str){
         foreach($str as $key => $val){
            $colarr[] = $key;
            $valarr[] = "'".$val."'";
         }
         $cols = implode(", ", $colarr);
         $vals = implode(", ", $valarr);
         $qry = "INSERT INTO {$tbl}";
         $qry .= "({$cols}) VALUES ({$vals})";
         //echo $qry;
         $idx = $this->iquery($qry);
         return $idx;
         $this->_conn->close();
      }

   /***          업데이트   */
      public function update($tbl, $str, $where){
         if(is_array($str)){
            foreach($str as $key => $val){
               $udt[] = "{$key} = '{$val}'";
            }
            $upqry = implode(", " , $udt);
         }else{
            $upqry = $str;
         }
      
         $qry = "UPDATE {$tbl} SET {$upqry} WHERE 1 {$where}";
         echo $qry;
   }
 

   }
?>