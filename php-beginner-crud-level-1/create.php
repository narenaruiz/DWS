<!DOCTYPE HTML>
<html>
    <!--
    used for creating a new record. It contains an HTML form 
    where the user can enter details for a new record
    
    Es el apartado 5.1
    -->
    <head>
        <title>PDO - Create a Record - PHP CRUD Tutorial</title>

        <!-- Latest compiled and minified Bootsraps CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
    </head>
    <body>

        <!-- container -->
        <div class="container">

            <div class="page-header">
                <<h1>Create Products</h1>
            </div>

            <!-- apartado 5.3 -->
            <?php
            if($_POST){
                
                // include database connection
                include 'config/database.php';
                
                try {
                    
                    // insert query
                    $query = "INSERT INTO products SET name=:name, description=:description, price=:price, created=:created";
                    
                    // prepare query for execution
                    $stmt = $con->prepare($query);
                    
                    // posted values
                    //Enlace explicativo de la funcion strip_tags: https://www.php.net/manual/es/function.strip-tags.php
                    $name=htmlspecialchars(strip_tags($_POST['name']));
                    $description=htmlspecialchars(strip_tags($_POST['description']));
                    $price=htmlspecialchars(strip_tags($_POST['price']));
                    
                    // bind the paremeters
                    $stmt->bindParam(':name', $name);
                    $stmt->bindParam(':description', $description);
                    $stmt->bindParam(':price', $price);
                    
                    // specify when this record was inserted to the database
                    $created=date('Y-m-d H:i:s');
                    $stmt->bindParam(':created', $created);
                    
                    // Execute the query
                    if($stmt->execute()){
                        echo "<div class='alert alert-success'>Record was saved.</div>";
                    } else {
                        echo "<div class='alert alert-danger'>Unable to save record.</div>";
                    }
                }
                
                // show error
                catch(PDOException $exception) {
                    die('Error: ' . $exception->getMessage());
                }
            }
            ?>

            <!-- html form here where the product information will be entered 
            apartado 5.2
            -->
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <!-- enlace de pagina con explicaacion:
                https://uniwebsidad.com/libros/bootstrap-3/capitulo-4/tablas
                -->
                <table class='table table-hover table-responsive table-bordered'>
                    <tr>
                        <td>Name</td>
                        <td><input type='text' name='name' class='form-control' /></td>
                    </tr>
                    <tr>
                        <td>Description</td>
                        <td><textarea name='description' class='form-control'></textarea></td>
                    </tr>
                    <tr>
                        <td>Price</td>
                        <td><input type='text' name='price' class='form-control' /></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <input type='submit' value='Save' class='btn btn-primary' />
                            <a href='index.php' class='btn btn-danger'>Back to read products</a>
                        </td>
                    </tr>
                </table>
            </form>

        </div> <!-- end .container -->

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

        <!-- Latest compiled and minified Boostrap JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    </body>
</html>