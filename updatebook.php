<?php
require_once __DIR__ . '/db_con.php';
 
        $connect = db_connect();
        $bookid=$_POST['bookid'];
 
        $title=trim($_POST['title']);
        $title=addslashes($title);

        $price=$_POST['price'];

        $author=trim($_POST['author']);
        $author=addslashes($author);

        $isbn=trim($_POST['isbn']);
        $isbn=addslashes($isbn);
        echo $isbn;

        $description=$_POST['description'];
        $description=addslashes($description);

        $publisher=trim($_POST['publisher']);
        $publisher=addslashes($publisher);

        $page=$_POST['page'];
        $language=trim($_POST['language']);

        $genre=trim($_POST['genre']);
        $genre=addslashes($genre);

        $published_date=$_POST['published_date'];

        $upload_dir='./image';
        $allowed_ext=array('jpg','jpeg','png');
        if($_FILES['bookimage']['name'])
        {
                $name=$_FILES['bookimage']['name'];
                move_uploaded_file($_FILES['bookimage']['tmp_name'],"$upload_dir/$name");
        }
        else{
                $name=$_POST["bookimage"];
        }

        if($_POST['edit']=="EDIT")
        {
               //입력받은 데이터를 DB에 저장
        $update = "update book set title='$title',price='$price',author='$author',isbn='$isbn',description='$description',bookimage='$name',publisher='$publisher',page='$page',language='$language',published_date='$published_date',genre='$genre' where bookid='$bookid'";
        
        $result = mysqli_query($connect,$update);
        
        echo mysqli_error($connect);

 
        if($result) {
        ?>      
        <script>
                alert('success<?php echo $isbn?>');
                location.replace("./index.php");
                </script>
 
<?php   }
        else{
?>              <script>            
                        alert('fail');
                        history.back();
                </script>
                
<?php   }

        
        }
        if($_POST['edit']=="DELETE")
        {
        $delete="delete from book where bookid='$bookid'";
        $result = mysqli_query($connect,$delete);

        if($result) {
                ?>      <script>
                        alert('success');
                        location.replace("./index.php");
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
