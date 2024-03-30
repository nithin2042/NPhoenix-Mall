
    <?php 
    include 'includes/conn.php';?>
        
    <?php if(isset($_COOKIE['sales_id'])){$id=$_COOKIE['sales_id'];}
            else{$id=0;}?>
                            <h3 style="position:absolute;color:lightblue;">Transaction Full Details</h3>
                                    <?php 
                                        $amount=0;
                                        $query="SELECT * FROM sales";
                                        $result=mysqli_query($conn,$query);
                                        echo "<table><tr><th>Product</th><th>Price</th><th>Quantity</th><th>Subtotal</th></tr>";
                                        while($row = mysqli_fetch_assoc($result)){
                                            if($id==$row['id']){
                                                echo "<br><br><p style='float:left'>Date : ".$row['sales_date']."</p><p style='float:right;'>Transaction# : ".$row['pay_id']."</p>";}
                                            if($id==$row['id']){
                                            $query2="SELECT * FROM details";
                                            $result2=mysqli_query($conn,$query2);
                                            while($row2 = mysqli_fetch_assoc($result2)){
                                                if($row2['sales_id']==$row['id']){
                                                    $query1="SELECT * FROM products";
                                                    $result1=mysqli_query($conn,$query1);
                                                    while($row1 = mysqli_fetch_assoc($result1)){
                                                        if($row1['id']==$row2['product_id']){{
                                                            echo "<tr><td>".$row1['name']."</td><td>".$row1['price']."</td><td>".$row2['quantity']."</td><td>".$row1['price']*$row2['quantity']."</td></tr>";
                                                                $amount+=$row1['price']*$row2['quantity'];}}}}
                                    }}}
                                         echo "</table>
                                         <p style='color:white;float:right;'>Total: $ ".$amount." </p>
                                         <a href='adminsales.php'><button style='background:transparent;color:lightblue;padding:5 15;margin-top:40px;' onclick='closeFunction()'><i class='fa fa-times'></i> Close</button></a>
                                         ";
                                        ?>
                                        