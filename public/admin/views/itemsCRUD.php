<?php
    require_once("dbconfig.php");

    if(isset($_POST['insert'])){

        $pname=$_POST['product_name'];
        $pdesc=$_POST['product_description'];
        $pcat=$_POST['product_category'];
        $pprice=$_POST['product_price'];
        $pquan=$_POST['product_quantity'];

        $sql = "INSERT INTO items(product_name,product_description,product_category,product_price,product_quantity) VALUES(:pn,:pd,:pc,:pp,:pq)";
        $query = $dbh->prepare($sql);

        $query->bindParam(':pn',$pname,PDO::PARAM_STR);
        $query->bindParam(':pd',$pdesc,PDO::PARAM_STR);
        $query->bindParam(':pc',$pcat,PDO::PARAM_STR);
        $query->bindParam(':pp',$pprice,PDO::PARAM_STR);
        $query->bindParam(':pq',$pquan,PDO::PARAM_STR);

        $query->execute();

        $lastInsertId = $dbh->lastInsertId();

        if($lastInsertId){
            echo "<script>alert('Record inserted successfully');</script>";
            echo "<script>window.location.href='itemsCRUD.php'</script>";
        }else{
            echo "<script>alert('Something wrong with the insertion of the records');</script>";
            echo "<script>window.location.href='itemsCRUD.php'</script>";
        }
    }
?>


<html>
    <head>
        <title>
            PHP CRUD Operation using PDO Extension
        </title>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3>add item</h3>
                </div>
            </div>
			<hr/>
            <form name="insertrecord" method="POST">
                <div class="row">
                    <div class="col-md-6">
                        <b>product name</b>
                        <input type="text" name="product_name" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                        <b>product description</b>
                        <input type="text" name="product_description" class="form-control" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                    <b>product category</b>
                        <input type="text" name="product_category" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                    <b>product price</b>
                        <input type="text" name="product_price" class="form-control" required>
                    </div>       
                </div>
                <div class="row">
                    <div class="col-md-6">
                    <b>product quantity</b>
                        <input type="text" name="product_quantity" class="form-control" required>
                    </div>
                </div>



                <div class="row" style="margin-top:1%">
                    <div class="col-md-12">
                       <input type="submit" name="insert" class="btn btn-success" value="submit">
                       <a href="adm.sample.php" class="btn btn-danger">Back</a>
                    </div>
                </div>
            </form>
        </div>
    </body>
</html>