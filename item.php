<?php
require_once __DIR__ . '/db_con.php';
    $conn=db_connect();
    $bookid=$_GET['bookid'];
    session_start();
    $sql="select * from book where bookid=$bookid";
    $result=mysqli_query($conn,$sql);
    echo mysqli_error($conn);
    $info=mysqli_fetch_assoc($result);

    //STAR AVERAGE
    $sql="select avg(rating)as average from rate where bookid='$bookid'";
    $avg=mysqli_query($conn,$sql);
    $avg=mysqli_fetch_assoc($avg);
    $avg=$avg["average"];
    $star=$avg/5*100;




    $title=$info['title'];
    $query="select * from user";
    $userinfo=mysqli_query($conn,$query);


    
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
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css?after" rel="stylesheet" />
        <link href="css/rating.css?after" rel="stylesheet"/>

    </head>
    <!--게시판형식css시작-->
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
<!--게시판형식css끝-->
    <body>
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="#!">OUR BOOK STORE</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="./index.php">Home</a></li>
                        <?php
                        if(isset($_SESSION['userid']))
                        {?>
                            <li class="nav-item"><a class="nav-link active" aria-current="page"><?php echo $_SESSION['userid'];?></a></li>
                            <li class="nav-item"><a class="nav-link active" aria-current="page" href="./logout.php">LogOut</a></li>
                        <?php
                        }
                        else {?>
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="./login.php">LogIn</a></li>
                        
                        <?php
                        }
                        ?>
                        
                        
                        <!--<li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Shop</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#!">All Products</a></li>
                                <li><hr class="dropdown-divider" /></li>
                                <li><a class="dropdown-item" href="#!">Popular Items</a></li>
                                <li><a class="dropdown-item" href="#!">New Arrivals</a></li>
                            </ul>
                        </li>-->
                    </ul>
                    <form class="d-flex">
                    <button class="btn btn-outline-dark" type="button" onclick="location.href='./cart.php'">
                            <i class="bi-cart-fill me-1"></i>
                            Cart
                            <span class="badge bg-dark text-white ms-1 rounded-pill"><?php echo $total;?></span>
                        </button>
                    </form>
                </div>
            </div>
        </nav>
        <!-- Product section-->
        <section class="py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="row gx-4 gx-lg-5 align-items-center">
                    <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0" src="./image/<?php echo $info['bookimage']; ?>" alt="..." /></div>
                    <div class="col-md-6">
                        <div class="small mb-1">ISBN:<?php echo $info['isbn']?></div>
                        
                        <div class="star-ratings">
                            <div class="star-ratings-fill space-x-2 text-lg" style="width:<?php echo $star?>%">
                                <span>★</span><span>★</span><span>★</span><span>★</span><span>★</span>
                            </div>
                            <div class="star-ratings-base space-x-2 text-lg">
                                <span>★</span><span>★</span><span>★</span><span>★</span><span>★</span>
                            </div>
                        </div>
                        
                        <h1 class="display-5 fw-bolder"><?php echo $title?></h1>
                        <div class="fs-5 mb-5">

                            <span><?php echo $info['price']?>$</span>
                            <details>
                        <summary>SUMMARY</summary>
                        <p class="lead"><?php echo $info['description']?></p>
                        </details>
                            
                        </div>
                        
                        <form method="get" action="cartadd.php">
                            
                        <div class="d-flex">
                            
                                <!--<input class="form-control text-center me-3" name="quantity" type="num" value="1" style="max-width: 3rem" />-->
                                <input type=hidden name=title value="<?php echo $title;?>">
                                <input type=hidden name="userid" value="<?php echo $_SESSION["userid"];?>" >
                                <input type=hidden name="price" value="<?php echo $info["price"];?>">
                                <input type=hidden name="status" value="add">
                                <button class="btn btn-outline-dark flex-shrink-0" type="submit" name="bookid" value=<?php echo $info['bookid'];?>>
                                    <i class="bi-cart-fill me-1" ></i>
                                    Add to cart
                                </button>
                        </div>
                        <br/><br/>
                    </form>
                    <form method="post" action="rating.php">
                    <h5 class="display-10 fw-bolder">REVIEW&RATING</h5>
                        <div class="star-rating ">
                            <input type="radio" id="5-stars" name="rating" value="5" />
                            <label for="5-stars" class="star">&#9733;</label>
                            <input type="radio" id="4-stars" name="rating" value="4" />
                            <label for="4-stars" class="star">&#9733;</label>
                            <input type="radio" id="3-stars" name="rating" value="3" />
                            <label for="3-stars" class="star">&#9733;</label>
                            <input type="radio" id="2-stars" name="rating" value="2" />
                            <label for="2-stars" class="star">&#9733;</label>
                            <input type="radio" id="1-star" name="rating" value="1" />
                            <label for="1-star" class="star">&#9733;</label>
                        </div>
                        
                        <br/>
                        <tr>
                        
                        <td><textarea name = "review" cols=85 rows=5 ></textarea></td>
                        </tr>
                        <input type="hidden" name="userid" value="<?php echo $_SESSION['userid'];?>">
                        <input type="hidden" name="bookid" value="<?php echo $bookid;?>">
                        <input type="submit" class="btn btn-outline-dark" value="SUBMIT"/>
                    </form>
          


                    </div>
                    
                </div>
            <!--review시작-->
            
            <div class="container"  >
            <div class="text-center mt-5" >
                
                <div id="board_area" > 
                <table class="list-table" >
                    <thead > 
                        <tr>
                            <th width="100" >USER NAME</th>
                            <th width="100">RATING</th>
                            <th width="1000">REVIEW</th>



                        </tr>
                    </thead>
                    <?php
                    
                        $sql="select * from rate where bookid='$bookid' order by rating desc ";
                        
                        $result=mysqli_query($conn,$sql);

                        while($board = $result->fetch_array())
                        {
                            //title변수에 DB에서 가져온 title을 선택
                            $rating=$board["rating"];
                    ?>
                    <tbody>
                    <tr>
                    
                
                        <td width="100",align="center" ><?php echo $board['userid'];?></td>
                        <td width="100",align="center" >
                        <div class="star-ratings">
                            <?php
                            $rating=$board["rating"]/5*100;
                            ?>
                            <div class="star-ratings-fill space-x-2 text-lg" style="width:<?php echo $rating;?>%">
                                <span>★</span><span>★</span><span>★</span><span>★</span><span>★</span>
                            </div>
                            <div class="star-ratings-base space-x-2 text-lg">
                                <span>★</span><span>★</span><span>★</span><span>★</span><span>★</span>
                            </div>
                        </div>
                        </td>
                        <td width="1000",align="center" ><?php echo $board['review'];?></td>

                        

                    </tr>
                    </tbody>
                    <?php } ?>
                </table>

                </div>
            </div>
        </div>

            <!--끝-->
            </div>

        </section>

        <!-- Footer-->
        <footer class="py-5 bg-dark">
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Your Website 2021</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
    <?php mysqli_close($conn);?>
</html>
