<?php
require_once __DIR__ . '/db_con.php';
 
        $connect = db_connect();
        $userid=$_GET['userid'];
        $bookid=$_GET['bookid'];
        $price=$_GET['price'];

        $quantity=$_GET['cart_quantity'];
        $amount=$quantity*$price;
        
        echo $bookid;

               //입력받은 데이터를 DB에 저장
        $update = "update cart set quantity='$quantity',amount='$amount' where bookid='$bookid' and userid='$userid'";
        
        $result = mysqli_query($connect,$update);
        
        echo mysqli_error($connect);

 
        if($result) {
        ?>      
        <script>
                alert('success');
                history.back();
                </script>
 
<?php   }
        else{
?>              <script>            
                        alert('fail');
                        
                </script>
                
<?php   }

        

        

        mysqli_close($connect); 
?>
