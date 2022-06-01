<?php
    
    if($_POST)
    {
        $username = mysqli_real_escape_string($db,$_POST["username"]);
        $password = mysqli_real_escape_string($db,md5($_POST["password"]));

        $query = mysqli_query($db,"SELECT * FROM shop_admin WHERE username = '$username' AND password = '$password'");

        $row = mysqli_fetch_array($query,MYSQLI_ASSOC);

        $count = mysqli_num_rows($query);

        if($count == 1)
        {
            ini_set('session.gc_maxlifetime', 86400);

            session_start();

            $_SESSION['SHOP_ADMIN'] = $username;

            echo '<img src="public/img/loading.gif" width="100" style="margin-top: -25px; margin-bottom: 25px;">';

            header("refresh: 3; url=welcome");
          
        }
        else
        {
            echo '<p style="color: #FF0000; text-align: center; margin-top: -20px;">Kullanıcı Adı veya Kullanıcı Şifresi hatalı.</p><br>';
        } 
    }

?>