<?php
    $conn=mysqli_connect('localhost','root','','bookstore');
    $sql="select * from book";
    $query="select * from user";

   

    $userinfo=mysqli_query($conn,$query);
    session_start();
    $total=0;
    if($_SESSION)
    {
        $userid=$_SESSION['userid'];
        $cartquery="select quantity from cart where userid='$userid'";
        
        $cart = mysqli_query($conn, $cartquery);
        
        if (mysqli_num_rows($cart) > 0) {
        while($row = mysqli_fetch_assoc($cart)) 
        {
            $total=$total+$row["quantity"];
        }
        } 
    }
    $total_quantity=0;
    $total_amount=0;

 ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>OUR BOOK STORE</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <style>
        table{
                border-top: 1px solid #444444;
                border-collapse: collapse;
        }
        tr{
                border-bottom: 1px solid #444444;
                padding: 10px;
        }
        td{
                border-bottom: 1px solid #efefef;
                padding: 10px;
        }
        table .even{
                background: #efefef;
        }
        .text{
                text-align:center;
                padding-top:20px;
                color:#000000
        }
        .text:hover{
                text-decoration: underline;
        }
        a:link {color : #57A0EE; text-decoration:none;}
        a:hover { text-decoration : underline;}
</style>


    <body>
        <!-- Responsive navbar-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="#">OUR BOOK STORE</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="./index.php">Home</a></li>
                        <?php
                        if(isset($_SESSION['userid']))
                        {?>
                            <li class="nav-item"><a class="nav-link active" aria-current="page"><?php echo $_SESSION['userid'];?></a></li>
                            <li class="nav-item"><a class="nav-link active" aria-current="page" href="./logout.php">LogOut</a></li>
                            <form class="d-flex">
                            
                        <button class="btn btn-outline-light" type="button" onclick="location.href='./cart.php'">
                         
                            <i class="bi-cart-fill me-1"></i>
                            Cart
                            <span class="badge bg-dark text-white ms-1 rounded-pill"><?php echo $total;?></span>
                            
                        </button>
                        
                    </form>
                        <?php
                        }
                        else {?>
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="./login.php">LogIn</a></li>
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="./signin.php">SignIn</a></li>
                        <?php
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Page content-->
        <div class="container">
            <div class="text-center mt-5">
                <div id="board_area"> 
                <table class="list-table">
                    <thead>
                        <tr>
                            <th width="300">title</th>
                            <th width="300">date</th>
                            <th width="300">quantity</th>
                            <th width="300">total</th>

                        </tr>
                    </thead>
                    <?php
                    if($_SESSION)
                    {
                        $userid=$_SESSION['userid'];
                        $cartquery="select * from cart where userid='$userid'";
                        
                        $cart = mysqli_query($conn, $cartquery);
                        
                        if (mysqli_num_rows($cart) > 0) {
                        while($row = $cart->fetch_array()) 
                        {?>
                        <tbody>
                            <tr>
                        <td width="300",align="center"><?php echo $row['title']; ?></td>
                        <td width="300",align="center"><?php echo $row['date']?></td>
                        <td width="300",align="center"><?php echo $row['quantity']; ?></td>
                        <td width="300",align="center"><?php echo $row['amount']?></td>
                        <?php $total_quantity=$total_quantity+$row['quantity'];
                        $total_amount=$total_amount+$row['amount'];
                        ?>
                        
                        </tr>
                        </tbody>
                        
                        <?php }
                        
                        }
                        
                    }?>
                    <tr>
                <td width="300",align="center">&nbsp;</td>
                        <td width="300",align="center">&nbsp;</td>
                        <td width="300",align="center"><?php echo $total_quantity;?></td>
                        <td width="300",align="center"><?php echo $total_amount;?></td>
		    </tr>
                </table>
                </div>
            </div>
        </div>
                </br>
        <form method = "post" action = "order.php" enctype="multipart/form-data">
        <table  style="padding-top:50px" align = center width=700 border=0 cellpadding=2 >
                <tr>
                <td height=20 align= center bgcolor=#ccc><font color=white>PURCHASE</font></td>
                </tr>
                <tr>
                <td bgcolor=white>
                <table class = "table2">
                <input type = hidden name ="userid" size=83 value="<?php echo $userid?>"></td>

                        <tr>
                        <td>ADDRESS</td>
                        <td><input type = text name ="isbn" size=83 required="required"></td>
                        </tr>

                        <tr>
                        <td>NAME</td>
                        <td><input type = text name = title size=83 required="required"></td>
                        </tr>
                        
                        <tr>
                        <td>CARD NUMBER</td>
                        <td><input type = text name = "author" size=83 required="required"></td>
                        </tr>

                        <tr>
                        <td>CARD ID</td>
                        <td><input type = text  name = "price" size=83 required="required"></td>
                        </tr>

                        <tr>
                        <td>EXPIRY DATE</td>
                        <td><input type = text  name = "publisher" size=83 required="required"></td>
                        </tr>
                        </table>
                        <center>
                        <input type = "submit" class="btn btn-outline-dark" name="order" value="ORDER BOOKS">
                        </center>
                </td>
                </tr>
        </table>
        </form>
        <footer class="py-5 bg-dark">
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Your Website 2021</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>