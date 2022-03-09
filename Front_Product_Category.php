<?php
require("connect_category_product.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Categories</h1>
    <ul>
        <?php
            $query = "select * From Category";
            $result = $conn->query($query) or trigger_error($conn->error);
            

            $total_num_rows = $result->num_rows;

            echo "The Results Are : ($total_num_rows) rows <br>";

            while($row = $result->fetch_array())  // $result->fetch_assco
            {
                echo "<li>Category Id: ".$row["category_id"]." || Category Name:  ".$row["category_name"]." || Description:  ".$row["description"]."</li>";
            }
?>

        
    </ul>
        <?php
           $result ->free(); 
               ?>

<hr/> 
<h1>Products</h1>
    <ul>
        <?php
            $query = "select * From product";
            $result = $conn->query($query) or trigger_error($conn->error);
            
                      
            $total_num_rows = $result->num_rows;

            echo "The Results Are : ($total_num_rows) rows <br>";

            while($row = $result->fetch_array())  // $result->fetch_assco
            {
                echo "<li>Product Id: ".$row["product_id"]." || Product Name:  ".$row["product_name"]." || Category Id:  ".$row["category_id"]." || Description:  ".$row["description"]."</li>";
            }
?>

        
    </ul>
        <?php
           $result ->free(); 
               ?>
</body>
</html>

<!-- Terminate connection -->
<?php
    $conn ->close();
?>