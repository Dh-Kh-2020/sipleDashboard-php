<?php
require("connect_category_product.php");

echo "<h1> Category </h1>";
if(isset($_POST['insert'])){
    $id=$_POST['category_id'];
    $name=$_POST['category_name'];
    $description=$_POST['description'];

    $query = "insert into category(category_id,category_name,description) values (".$id.",'".$name."','".$description."') ";
    $result = $conn->query($query) or trigger_error($conn->error);

    if(!$result)
    {
        echo "Something went error" ;
    }
}
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
          
<form action="" method="POST">
<pre>
<label>Category ID       </label><input type="text" name="category_id">
<label>Category Name     </label><input type="text" name="category_name">
<label>Discription       </label><textarea name="description" cols="30" rows="10" placeholder="Describe"></textarea>  
      <br/>
                <input type="submit" value="Insert" name="insert">   
</pre>
</form>

<hr/>  
<form action="" method="POST">
<pre>
<label>Enter Data: </label><input type="text" name="search"> <input type="submit" name="send" value="Search">   
</pre>
</form>
<ul>
<?php
if(isset($_POST['send'])){

            $search=$_POST['search'];
            $query = "select * From category where  category_id like '%".$search."%' or category_name like '%".$search."%' or description like '%".$search."%' ";
            $result = $conn->query($query) or trigger_error($conn->error);
            
            if(!$result)
            {
                die("Error in Query");
            }
                    
            while($row=$result->fetch_assoc())
            {
                echo "<li>Id: ".$row["category_id"]." || Name:  ".$row["category_name"]."  <a href='CPanel_Category_product.php?del_id=".$row["category_id"]." '>  Delete</a></li>"." <a href='CPanel_Category_product.php?edit_id=".$row["category_id"]." & edit_name=".$row["category_name"]." & edit_desc=".$row["description"]." '>  Edit</a></li>";
            }
            
        }
        
?>
        </ul>
        <br><br>
        <?php
        
        if(isset($_GET['del_id']))
        {
            $query = "delete from category where category_id= ".$_GET['del_id']." ";
            $result = $conn->query($query);
            
            if(!$result)
            { 
                echo "Something went error";
            }

        }

        if(isset($_GET['edit_id']))
        {
            echo '
            <form action="" method="POST">
             <pre>
            <label>Category ID       </label><input type="text" value="'.  $_GET['edit_id']  .'" name="cat_id">
            <label>Category Name     </label><input type="text" value="'.  $_GET['edit_name']  .'"  name="cat_name">
            <label>Discription       </label><textarea cols="30" rows="10" placeholder="Describe"   name="cat_desc" >'.  $_GET['edit_desc']  .'</textarea>
                <br/>
                            <input type="submit" value="Update" name="update">   
            </pre> 
            </form>'       ;


            if(isset($_POST['update']))
            {
                $id=$_POST['cat_id'];
                $name=$_POST['cat_name'];
                $description=$_POST['cat_desc'];
            
                $query = "update category set category_id=".$id." , category_name ='".$name."'  , description ='".$description."' where category_id= ".$_GET['edit_id']." ";
                $result = $conn->query($query);
            
                if(!$result)
                { 
                    echo "Something went error";
                }
            }
        }

        
        ?>

        <hr/>
        <h1> Product </h1>

        <?php

            if(isset($_POST['inser'])){
                $id=$_POST['product_id'];
                $name=$_POST['product_name'];
                $prod_Cat= $_POST['prod_cat_id'];
                $description=$_POST['descrip'];

                $query = "insert into product(product_id,product_name,category_id,description) values (".$id.",'".$name."',".$prod_Cat.",'".$description."') ";
                $result = $conn->query($query) or trigger_error($conn->error);

                if(!$result)
                {
                    echo "Something went error" ;
                }
            }
            ?>

<form action="" method="POST">
<pre>
<label>Product ID       </label><input type="text" name="product_id">
<label>Product Name     </label><input type="text" name="product_name">
<label>Category ID      </label><input type="text" name="prod_cat_id">
<label>Discription      </label><textarea cols="30" rows="10" placeholder="Describe"  name="descrip" ></textarea>
      <br/>
                <input type="submit" value="Insert" name="inser">   
</pre>
</form>

<hr/>  
<form action="" method="POST">
<pre>
<label>Enter Data: </label><input type="text" name="searh"> <input type="submit" name="sub" value="Search">   
</pre>
</form>
<ul>
<?php
if(isset($_POST['sub'])){

            $search=$_POST['searh'];
            $query = "select * From product where  product_id like '%".$search."%' or product_name like '%".$search."%' or description like '%".$search."%' ";
            $result = $conn->query($query) or trigger_error($conn->error);
            
            if(!$result)
            {
                die("Error in Query");
            }
                    
                while($row=$result->fetch_assoc())
                {
                    echo "<li>Id: ".$row["product_id"]." || Name:  ".$row["product_name"]." <a href='CPanel_Category_product.php?del_id2=".$row["product_id"]." '>  Delete</a></li>"." <a href='CPanel_Category_product.php?edit_id2=".$row["product_id"]." & edit_name2=".$row["product_name"]." & edit_prod_cat=".$row["category_id"]."&edit_desc2=".$row["description"]." '>  Edit</a></li>";
                }
            
        }
        
?>
        </ul>
        <br><br>
        <?php
        
        if(isset($_GET['del_id2']))
        {
            $query = "delete from product where product_id= ".$_GET['del_id2']." ";
            $result = $conn->query($query);
            
            if(!$result)
            { 
                echo "Something went error";
            }

        }

        if(isset($_GET['edit_id2']))
        {
            echo '
            <form action="" method="POST">
             <pre>
            <label>Prouct ID        </label><input type="text" value="'.  $_GET['edit_id2']  .'" name="prod_id">
            <label>product Name     </label><input type="text" value="'.  $_GET['edit_name2']  .'"  name="prod_name">
            <label>Category ID      </label><input type="text" value="'.  $_GET['edit_prod_cat']  .'"  name="prod_cat_id">
            <label>Discription      </label><textarea cols="30" rows="10" placeholder="Describe"   name="prod_desc" >'. $_GET['edit_desc2'] . '</textarea>
                <br/>
                            <input type="submit" value="Update" name="update2">   
            </pre> 
            </form>'       ;


            if(isset($_POST['update2']))
            {
                $id=$_POST['prod_id'];
                $name=$_POST['prod_name'];
                $prod_cat = $_POST['prod_cat_id'];
                $descrip=$_POST['prod_desc'];
            
                $query = "update product set product_id=".$id." , product_name ='".$name."',category_id =".$prod_cat."  , description ='".$descrip."' where product_id= ".$_GET['edit_id2']." ";
                $result = $conn->query($query);
            
                if(!$result)
                { 
                    echo "Something went error";
                }
            }
        }

        
        ?>

        <hr/>
</body>
</html>

<!-- Terminate connection -->
<?php
    $conn ->close();
?>