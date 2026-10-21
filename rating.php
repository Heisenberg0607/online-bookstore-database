<?php
require_once __DIR__ . '/db_con.php';
 
        $connect = db_connect();
        session_start();
        

        $rating=$_POST['rating'];
        $review=$_POST['review'];
        $userid=$_POST['userid'];
        $bookid=$_POST['bookid'];

        $sql="select count(*) as count from rate where userid='$userid' and bookid='$bookid'";
        $duple=mysqli_query($connect,$sql);
        $duple=mysqli_fetch_assoc($duple);
        echo mysqli_error($connect);

        if($duple['count']==0)
        {
            $add="insert into rate(userid,bookid,rating,review) 
            values('$userid','$bookid','$rating','$review')";
            $result = mysqli_query($connect,$add);
        }
        else
        {
            $update = "update rate set rating='$rating',review='$review' where bookid='$bookid'and userid='$userid'";
        
            $result = mysqli_query($connect,$update);
            
            echo mysqli_error($connect);
    
        }

        

 
        if($result)
        {?>
        <script>
            alert('success')
            history.back();
            </script>
            

            <?php
            }
       
            
            else{?>

            <script>
              
                alert('fail')
                
                </script>
                      <?php
                echo mysqli_error($connect);
                
                ?>
                <?php

        }
        
        mysqli_close($connect); 
?>