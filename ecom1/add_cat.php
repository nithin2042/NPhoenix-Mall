<?php
        $sn="localhost";
        $un="root";
        $ps="";
        $dn="ecomm";
        $id=1;
        $conn1=new mysqli($sn,$un,$ps,$dn);
        $calc=$conn1->prepare("SELECT id FROM category");
        $calc->execute();
        foreach($calc->get_result() as $row){
                if($row['id']>$id){
                    $id=$row['id'];
                }
        }
        $id++;
    if(!empty($_COOKIE['newcat'])){
        $newcat=$_COOKIE['newcat'];
        $cat_slug=strtolower(str_replace(" ", "_",$_COOKIE['newcat']));
        $stmt=$conn1->prepare("INSERT INTO category (id, name, cat_slug) VALUES (?,?,?)");
        $stmt->bind_param("sss",$id,$_COOKIE['newcat'],$cat_slug);
        echo "<script>";
        if($stmt->execute()){
            echo "alert('Added successfully');";}
            echo "window.location= 'admincat.php'";
            echo "</script>";
}
?>