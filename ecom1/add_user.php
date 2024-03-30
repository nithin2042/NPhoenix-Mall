<?php
        $sn="localhost";
        $un="root";
        $ps="";
        $dn="ecomm";
        $id=1;
        $conn1=new mysqli($sn,$un,$ps,$dn);
        $calc=$conn1->prepare("SELECT id FROM users");
        $calc->execute();
        foreach($calc->get_result() as $row){
                if($row['id']>$id){
                    $id=$row['id'];
                }
        }
        $id++;
        $img='profile.jpg';
        $date=date("Y-m-d");
        $stst=0;
        $stat=1;
        $stmt=$conn1->prepare("INSERT INTO users (id,type,firstname, lastname,password,contact_info, photo,address,status,created_on,email) VALUES (?,?,?,?,?,?,?,?,?,?,?)");
        $stmt->bind_param("sssssssssss",$id,$stst, $_COOKIE['firstname'],$_COOKIE['lastname'], $_COOKIE['pass'], $_COOKIE['phone'],$img,$_COOKIE['address'],$stat,$date,$_COOKIE['email']);
        echo "<script>";
        if($stmt->execute()){
            echo "alert('Added successfully');";}
            echo "window.location='adminusers.php'";
            echo "</script>";
?>