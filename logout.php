<?php
 
        session_start();
        $result = session_destroy();
 
        if($result) {
?>
        <script>
                alert("logout success.");
                location.replace("./index.php");
        </script>
<?php   }
?>
