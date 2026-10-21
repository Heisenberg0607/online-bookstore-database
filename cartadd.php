<?php
require_once __DIR__ . '/db_con.php';
 
        $connect = db_connect();
 
        
        $userid=$_GET['userid'];



        


        if($_GET['status']=="add"){
                $bookid=$_GET['bookid'];


                $sql="select count(*) as count from cart where userid='$userid' and bookid='$bookid'";
                $duple=mysqli_query($connect,$sql);
                $duple=mysqli_fetch_assoc($duple);
                echo mysqli_error($connect);


               if($duple["count"]!=0)
               {
                $sql="select * from cart where userid='$userid' and bookid='$bookid'";
                $duple=mysqli_query($connect,$sql);
                
                $info=mysqli_fetch_assoc($duple);
                $quantity=$info["quantity"]+1;
                $amount=$info["price"]*$quantity;

                $update = "update cart set quantity='$quantity',amount='$amount' where bookid='$bookid' and userid='$userid'";
        
                $result = mysqli_query($connect,$update);

               }
               else{
                
                $price=$_GET['price'];
                $title=$_GET['title'];
                
                $quantity=1;
                
                $date = date('Y-m-d H:i:s');
                        $insertquery="insert into cart (userid, bookid, date, amount,quantity,title,price) values ('$userid', '$bookid', '$date', '$price','$quantity','$title','$price')";
                        $result = mysqli_query($connect,$insertquery);

               }

        
                
                        
        //echo mysqli_error($connect);
        }
        else
        {
        $delete="delete from cart where userid='$userid'";
        $result = mysqli_query($connect,$delete);
        //echo mysqli_error($connect);
        
        
        }

        //입력받은 데이터를 DB에 저장

                
        
        
       
            
        if($result)
        {
            ?><script>
                alert('success');
                location.replace("index.php");
                </script><?php
        }
        else{
            ?><script>
                alert("fail");
                history.back();
                </script><?php
        }
 

 
        

        mysqli_close($connect);
?>
