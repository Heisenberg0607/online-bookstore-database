<?php
require_once __DIR__ . '/db_con.php';
 
        $connect = db_connect();
        session_start();
        
        $title=trim($_POST['title']);
        $title=addslashes($title);

        $price=$_POST['price'];

        $author=trim($_POST['author']);
        $author=addslashes($author);

        $isbn=trim($_POST['isbn']);
        $isbn=addslashes($isbn);

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


               //입력받은 데이터를 DB에 저장
        $add="insert into book(isbn,title,price,author,description,bookimage,publisher,page,language,published_date,genre) 
                        values('$isbn','$title','$price','$author','$description','$name','$publisher','$page','$language','$published_date','$genre')";
        $result = mysqli_query($connect,$add);

 
        if($result)
        {?>
        <script>
            alert('success')
            location.replace("index.php")
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