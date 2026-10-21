<?php
require_once __DIR__ . '/db_con.php';
    $connect=db_connect();
    
    $name=$_POST["name"];
    $address=$_POST["address"];
    $contact=$_POST["contact"];
    $sex=$_POST["sex"];
    $age=$_POST["age"];
    $userid=$_POST["userid"];
    
    $update = "update user set name='$name',address='$address',contact='$contact',sex='$sex',age='$age' where userid='$userid'";
    $result = mysqli_query($connect,$update);
    if($result) {
        ?>      
        <script>
                alert('success');
                location.replace("./index.php");
                </script>
 
<?php   }
        else{
?>              <script>            
                        alert('fail');
                        history.back();
                </script>
                
<?php   }
    ?>