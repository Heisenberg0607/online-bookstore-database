<?php

include_once "db_con.php"; // 데이터베이스에 연결

    // 현재 페이지 번호 받아오기
    if(isset($_GET["page"])){
        $page = $_GET["page"]; // 하단에서 다른 페이지 클릭하면 해당 페이지 값 가져와서 보여줌
    } else {
        $page = 1; // 게시판 처음 들어가면 1페이지로 시작
    }

    $conn=db_connect();
    $sql="select * from book";

    $result=mysqli_query($conn,$sql);
    
    session_start();
    $total=0;
    if($_SESSION)
    {
        $userid=$_SESSION['userid'];

        $countquery="select * from cart where userid='$userid'";
        $userquery="select * from user where userid='$userid'";

        $cartcount = mysqli_query($conn, $countquery);
        $userinfo=mysqli_query($conn,$userquery);

        if (mysqli_num_rows($userinfo) > 0) {
            while($row = mysqli_fetch_assoc($userinfo)) 
            {
                $role=$row["permission"];
            }
            }
        if (mysqli_num_rows($cartcount) >0) {
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
        <!--navbar end-->
        <header class="bg-dark py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="text-center text-white">
                    <h1 class="display-4 fw-bolder">ADMIN</h1>
                    <p class="lead fw-normal text-white-50 mb-0">order management</p>
                </div>
            </div>
        </header>
        <!--books-->
        
            
        <!-- Page content-->
        <div class="container" style='border:1px solid white'>
            <div class="text-center mt-5">
                
                <div id="board_area" > 
                <table class="list-table">
                    
                <?php
                if(isset($_SESSION['userid'])&&$role=="root")
                {?>
                
                    <br></br>
                <?php
                
                }?>
                

                    <thead>
                        <tr>
                            <th width="250">ORDER ID</th>
                            <th width="250">USER</th>
                            <th width="250">TITLE</th>
                            <th width="250">QUANTITY</th>
                            <th width="250">TOTAL</th>
                            <!-- 추천수 항목 추가 -->
                        </tr>
                    </thead>
                    <?php
                    $sql=mq("select * from orders");
                    $total_record=mysqli_num_rows($sql);
                    $list=10;//product in one page
                    $block_cnt=5;
                    $block_num=ceil($page/$block_cnt);//page now
                    $block_start=(($block_num-1)*$block_cnt)+1;//start page
                    $block_end=$block_start+$block_cnt-1;//end page

                    $total_page=ceil($total_record/$list);
                    if($block_end>$total_page)
                    {
                        $block_end=$total_page;
                    }
                    $totla_block=ceil($total_page/$block_cnt);
                    $page_start=($page-1)*$list;

                    $sql2=mq("select * from orders order by userid desc limit $page_start,$list");

                        while($board = $sql2->fetch_array())
                        {
                            //title변수에 DB에서 가져온 title을 선택
                            $title=$board["title"];
                            if(strlen($title)>30)
                            { 
                            //title> 30 .....
                            $title=str_replace($board["title"],mb_substr($board["title"],0,30,"utf-8")."...",$board["title"]);
                            }
                    ?>
                    <tbody>
                    <tr>
                    
                        
                        <td width="200",align="center"><?php echo $board['orderid']; ?></td>
                        <td width="200",align="center"><?php echo $board['userid']?></td>
                        <td width="200",align="center"><?php echo $board['title']?>$</td>
                        <td width="200",align="center"><?php echo $board['quantity']; ?></td>
                        <td width="200",align="center"><?php echo $board['amount']?></td>
                        <?php
                        if(isset($_SESSION['userid'])&&$role=="root")
                        {?>
    
                        <td width="70",align="center">
                        <form method="get" action="order_manage.php">
                            <input type=submit name="status" value="delete">
                            <input type=hidden name="orderid" value="<?php echo $board['orderid']?>">
                            <input type=hidden name="userid" value="<?php echo $board['userid']?>">
                        </form>
                        </td>
                        <?php }
                        ?>

                    </tr>
                    </tbody>
                    <?php } ?>
                </table>
                <div id="page_num" style="text-align: center;">
			    	<?php
				    	if ($page <= 1){
				    		// 빈 값
				    	} else {
				    		echo "<a href='index.php?page=1'>first</a>";
				    	}
				    	
				    	if ($page <= 1){
				    		// 빈 값
				    	} else {
				    		$pre = $page - 1;
				    		echo "<a href='index.php?page=$pre'>◀ previous </a>";
				    		
				    	}
				    	
				    	for($i = $block_start; $i <= $block_end; $i++){
				    		if($page == $i){
				    			echo "<b> $i </b>";
				    		} else {
				    			echo "<a href='index.php?page=$i'> $i </a>";
				    		}
				    	}
				    	
				    	if($page >= $total_page){
				    		// 빈 값
				    	} else {
				    		$next = $page + 1;
				    		echo "<a href='index.php?page=$next'> next ▶</a>";
				    	}
					   	
				    	if($page >= $total_page){
				    		// 빈 값
				    	} else {
				    		echo "<a href='index.php?page=$total_page'>last</a>";
				    	}
					?>
				</div>	
                </div>
                        </br>
                <div id="search_box">
    <form action="search_result.php" method="get">
      <select  name="catgo">
        <option value="title">TITLE</option>
        <option value="user">USER</option>
        
      </select>
      <input type="text" name="search" size="40" required="required" /> 
      <button >SEARCH</button>
    </form>
                        </br>
    </div>
            </div>
            
        </div>


        <footer class="py-5 bg-dark">
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Your Website 2021</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
        
    </body>
    
</html>
