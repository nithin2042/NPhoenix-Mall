<?php
        $sn="localhost";
        $un="root";
        $ps="";
        $dn="ecomm";
        $conn1=new mysqli($sn,$un,$ps,$dn);
        $stmt=$conn1->prepare("UPDATE users SET firstname=?, lastname=?,password=?,contact_info=?,address=?,email=? WHERE id=?");
        $stmt->bind_param("sssssss" , $_COOKIE['firstname'] , $_COOKIE['lastname'] , $_COOKIE['pass'] , $_COOKIE['phone'] , $_COOKIE['address'] ,$_COOKIE['email'], $_COOKIE['id']);
        echo "<script>";
        if($stmt->execute()){
            echo "alert('Updated successfully');";}
            echo "window.location= 'adminusers.php'";
            echo "</script>";
?>