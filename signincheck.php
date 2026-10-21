<?php
 
        $connect = mysqli_connect('localhost','root','','bookstore');
 
        
        $userid=$_GET['userid'];
        $pw=$_GET['password'];
        $date = date('Y-m-d H:i:s');
 
        //입력받은 데이터를 DB에 저장
        $query = "insert into user (userid, password, date, permission) values ('$userid', '$pw', '$date', 'user')";
 
 
        $result = mysqli_query($connect,$query);
 
        //저장이 됬다면 (result = true) 가입 완료
        if($result) {
        ?>      <script>
                alert('success');
                location.replace("./login.php");
                </script>
 
<?php   }
        else{
?>              <script>            
                        alert("<?php echo mysqli_error($connect);?>");
                        
                </script>
<?php   }
 
        mysqli_close($connect);
?>
