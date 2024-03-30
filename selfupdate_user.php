<?php
        $sn="localhost";
        $un="root";
        $ps="";
        $dn="ecomm";
        $conn1=new mysqli($sn,$un,$ps,$dn);
        $stmt=$conn1->prepare("UPDATE users SET firstname=?, lastname=?,password=?,contact_info=?,address=?,email=? WHERE id=?");
        $stmt->bind_param("sssssss" , $_COOKIE['firstname11'] , $_COOKIE['lastname11'] , $_COOKIE['pass11'] , $_COOKIE['phone11'] , $_COOKIE['address11'] ,$_COOKIE['email11'], $_COOKIE['id11']);
        echo "<script>";
        if($stmt->execute()){
            echo "alert('Updated successfully');";}
            echo "window.location= 'profile.php'";
            echo "</script>";
?>