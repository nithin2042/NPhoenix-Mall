<?php
    setrawcookie('loginchecker', 0);
    setrawcookie('userid', 0);
    echo    "<script>alert('Logged out Successsfully');
            window.location='index.php';
            </script>";
?>