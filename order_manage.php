<?php
require_once __DIR__ . '/db_con.php';
 
        $connect = db_connect();
        $userid=$_GET['userid'];
        $status=$_GET['status'];
        $orderid=$_GET['orderid'];
 
        
        
        if($status=="delete")
        {
        $delete="delete from orders where orderid='$orderid'";
        $result = mysqli_query($connect,$delete);

        if($result) {
                ?>      <script>
                        alert('success');
                        location.replace("./order.php");
                        </script>
         
        <?php   }
                else{
        ?>              <script>            
                                alert("fail");
                                history.back();
                        </script>
        <?php   }
        }


        mysqli_close($connect); 
?>
