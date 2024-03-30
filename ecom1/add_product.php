<?php
        $sn="localhost";
        $un="root";
        $ps="";
        $dn="ecomm";
        $id=1;
        $conn1=new mysqli($sn,$un,$ps,$dn);
        $calc=$conn1->prepare("SELECT id FROM products");
        $calc->execute();
        foreach($calc->get_result() as $row){
                if($row['id']>$id){
                    $id=$row['id'];
                }
        }
        $id++;
        if(!empty($_COOKIE['newImg'])){
            $img = $_COOKIE['newImg'];
        }
        else{
            $img='noimage.jpg';
        }
        echo $_COOKIE['newImg'];
        $cat_slug=strtolower(str_replace(" ", "_",$_COOKIE['name']));
        $stmt=$conn1->prepare("INSERT INTO products (id,category_id, name, slug, price, photo,description) VALUES (?,?,?,?,?,?,?)");
        $stmt->bind_param("sssssss",$id,$_COOKIE['cat'], $_COOKIE['name'], $cat_slug, $_COOKIE['price'],$img,$_COOKIE['desc']);
        echo "<script>";
        if($stmt->execute()){
            echo "alert('Added successfully');";}
            echo "window.location= 'adminproducts.php'";
            echo "</script>";
?>