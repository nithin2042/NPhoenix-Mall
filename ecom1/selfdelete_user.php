<?php
        $sn="localhost";
        $un="root";
        $ps="";
        $dn="ecomm";
        $conn1=new mysqli($sn,$un,$ps,$dn);
    if(!empty($_COOKIE['userid'])){
        $id=$_COOKIE['userid'];
        setrawcookie('loginchecker',0);
        setrawcookie('userid',0);
        $stmt=$conn1->prepare("DELETE FROM users WHERE id=?");
        $stmt->bind_param("s",$id);
        echo "<script>";
        if($stmt->execute()){
            echo "alert('Deleted successfully');";}
            echo "window.location= 'index.php'";
            echo "</script>";
}
?>