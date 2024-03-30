<?php
    session_start();
    include 'ecom1/includes/conn.php';
    $mail=$_SESSION['loginmail'];
    $pass=$_SESSION['loginpass'];
    $query="SELECT * FROM users" ;
    $loginchecker=0;
                $result=mysqli_query($conn,$query);
                while($row = mysqli_fetch_assoc($result)){
                    if($row['email']==$mail && $row['password']==$pass){
                        $loginchecker=1;
                        if($row['type']==0){
                            setcookie('logintype',0);
                            setcookie('userid',$row['id']);
                            setcookie('loginchecker',$loginchecker);
                            header('Location:index.php?id='.$_SESSION['userid'].';login=1;');
                        }
                        else if($row['type']==1){
                            setcookie('logintype',1);
                            setcookie('userid',$row['id']);
                            header('Location:adminhome.php');
                        }
                    }
                }
                if($loginchecker==0){
                    echo "<script>alert('Login information wrong please try again');
                    window.location='login.php';</script>";
                }
?>