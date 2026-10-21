<!DOCTYPE>
<?php
    $conn=mysqli_connect('localhost','root','','bookstore');
    $bookid=$_GET['bookid'];
    session_start();
    $sql="select * from book where bookid=$bookid";
    $result=mysqli_query($conn,$sql);
    $info=mysqli_fetch_assoc($result);


    

    
    $total=0;
    if($_SESSION)
    {
        $userid=$_SESSION['userid'];
        $countquery="select * from cart where userid='$userid'";
        
        $cartcount = mysqli_query($conn, $countquery);
        
        if (mysqli_num_rows($cartcount) > 0) {
        while($row = mysqli_fetch_assoc($cartcount)) 
        {
            $total=$total+$row["quantity"];
        }
        }
    }
?>
<html>
<head>
        <meta charset = 'utf-8'>
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
        table.table2{
                border-collapse: separate;
                border-spacing: 1px;
                text-align: left;
                line-height: 1.5;
                border-top: 1px solid #ccc;
                margin : 20px 10px;
        }
        table.table2 tr {
                 width: 50px;
                 padding: 10px;
                font-weight: bold;
                vertical-align: top;
                border-bottom: 1px solid #ccc;
        }
        table.table2 td {
                 width: 100px;
                 padding: 10px;
                 vertical-align: top;
                 border-bottom: 1px solid #ccc;
        }
 
</style>
<body>
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
        <form method = "post" action = "updatebook.php" enctype="multipart/form-data">
        <table  style="padding-top:50px" align = center width=700 border=0 cellpadding=2 >
                <tr>
                <td height=20 align= center bgcolor=#ccc><font color=white> EDIT</font></td>
                </tr>
                <tr>
                <td bgcolor=white>
                <table class = "table2">
                <input type = hidden name ="bookid" size=83 value="<?php echo $info['bookid'];?>"></td>

                        <tr>
                        <td>ISBN</td>
                        <td><input type = text name ="isbn" size=83 value="<?php echo $info['isbn'];?>"></td>
                        </tr>

                        <tr>
                        <td>TITLE</td>
                        <td><input type = text name = title size=83 value="<?php echo $info['title'];?>"></td>
                        </tr>
                        
                        <tr>
                        <td>AUTHOR</td>
                        <td><input type = text name = "author" size=83 value="<?php echo $info['author'];?>"></td>
                        </tr>

                        <tr>
                        <td>PRICE</td>
                        <td><input type = number step="0.01" name = "price" size=83 value="<?php echo $info['price'];?>"></td>
                        </tr>

                        <tr>
                        <td>PUBLISHER</td>
                        <td><input type = text  name = "publisher" size=83 value="<?php echo $info['publisher'];?>"></td>
                        </tr>

                        <tr>
                        <td>PAGE</td>
                        <td><input type = number  name = "page" size=83 value="<?php echo $info['page'];?>"></td>
                        </tr>

                        <tr>
                        <td>LANGAUGE</td>
                        <td><input type = text  name = "language" size=83 value="<?php echo $info['language'];?>"></td>
                        </tr>

                        <tr>
                        <td>GENRE</td>
                        <td><input type = text  name = "genre" size=83 value="<?php echo $info['genre'];?>"></td>
                        </tr>

                        <tr>
                        <td>PUBLISHED DATE</td>
                        <td><input type = date  name = "published_date" size=83 value="<?php echo $info['published_date'];?>"></td>
                        </tr>

                        <tr>
                        <td>DESCRIPTION</td>
                        <td><textarea name = "description" cols=85 rows=5 ><?php echo $info['description'];?></textarea></td>
                        </tr>
 
                        <tr>
                        <td>BOOKIMAGE</td>
                        <td><input type = file name = "bookimage" size=83>
                        <input type = hidden name = "bookimage" size=83 value="<?php echo $info['bookimage'];?>"></td></td>
                        </tr>
                        </table>
 
                        <center>
                        <input type = "submit" class="btn btn-outline-dark" name="edit" value="EDIT">
                        <input type = "submit" class="btn btn-outline-dark" name="edit" value="DELETE">
                        </center>
                </td>
                </tr>
        </table>
        </form>
</body>
</html>


