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
        $sr="";
        $m=$_COOKIE['emails'];
        echo $date.$_COOKIE['firstnames'];
        include '../../ecom1/includes/conn.php';
        $query1="SELECT email FROM users";
                $result1=mysqli_query($conn,$query1);
                $stmt1 = $conn->prepare($query1);
                $stmt1->execute();
                while($row = mysqli_fetch_assoc($result1)){
                    if($row['email']==$m){
                    $ct++;}
                }
                if($ct!=1){
                    $stmt=$conn1->prepare("INSERT INTO users (id,type,firstname, lastname,password,contact_info, photo,address,status,created_on,email) VALUES (?,?,?,?,?,?,?,?,?,?,?)");
                    $stmt->bind_param("sssssssssss",$id,$stst, $_COOKIE['firstnames'],$_COOKIE['lastnames'], $_COOKIE['passs'], $sr,$img,$sr,$stat,$date,$_COOKIE['emails']);
                    if($stmt->execute()){
                        echo "<script>";
                        echo "alert('Added successfully!You can Login now');";}
                        echo "window.location='index.php';";
                        echo "</script>";
                }
                else{
                    echo "<script>alert('This Email ALready Exists Please Check for spellings or Create a New Account');
                    window.location='signup.php';</script>";
                }
    

      
?>