<?php
 
        $connect = mysqli_connect('localhost','root','','bookstore');
        $userid=$_POST['userid'];
 
        //입력받은 데이터를 DB에 저장
        $update = "insert into orders(bookid,userid,title,quantity,amount) select  bookid,userid,title,quantity,amount from cart where userid='$userid'";
        $delete="delete  from cart where userid='$userid'";
        $result = mysqli_query($connect,$update);
        
        
        echo mysqli_error($connect);

 
        if($result) {
            $delete =mysqli_query($connect,$delete);
        ?>      
        <script>
                alert('success');
                location.replace("./index.php");
                </script>
 
<?php   }
        else{
?>              <script>            
                        alert('fail');
                </script>
                
<?php   }

        
    
?>
