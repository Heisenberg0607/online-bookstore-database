<?php
 
        session_start();
 
        $connect = mysqli_connect('localhost','root','','bookstore');
 

        $userid=$_POST['userid'];
        $pw=$_POST['password'];
 

        $query = "select * from user where userid='$userid'";
        $result = $connect->query($query);
 

        if(mysqli_num_rows($result)==1) {
                $row=mysqli_fetch_assoc($result);
 
                //비밀번호가 맞다면 세션 생성
                if($row['password']==$pw){
                        $_SESSION['userid']=$userid;
                        if(isset($_SESSION['userid'])){
                        ?>      <script>
                                        alert("로그인 되었습니다.");
                                        location.replace("./index.php");
                                </script>
<?php
                        }
                        else{
                                echo "session fail";
                        }
                }
 
                else {
        ?>              <script>
                                alert("아이디 혹은 비밀번호가 잘못되었습니다.");
                                history.back();
                        </script>
        <?php
                }
 
        }
 
                else{
?>              <script>
                        alert("아이디 혹은 비밀번호가 잘못되었습니다.");
                        history.back();
                </script>
<?php
        }
 
 
?>
<?php mysqli_close($connect);?>
