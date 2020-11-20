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
                <h1>Create Products</h1>
            </div>

            <!-- apartado 5.3 -->
            <?php
            if ($_POST) {

                // include database connection
                include 'config/database.php';

                try {

                    // insert query
                    /* Antes de cambiar al 11.2
                    $query = "INSERT INTO products SET name=:name, description=:description, price=:price, created=:created";

                    // prepare query for execution
                    $stmt = $con->prepare($query);

                    // posted values
                    //Enlace explicativo de la funcion strip_tags: https://www.php.net/manual/es/function.strip-tags.php
                    $name = htmlspecialchars(strip_tags($_POST['name']));
                    $description = htmlspecialchars(strip_tags($_POST['description']));
                    $price = htmlspecialchars(strip_tags($_POST['price']));

                    // bind the paremeters
                    $stmt->bindParam(':name', $name);
                    $stmt->bindParam(':description', $description);
                    $stmt->bindParam(':price', $price);

                    // specify when this record was inserted to the database
                    $created = date('Y-m-d H:i:s');
                    $stmt->bindParam(':created', $created);

                    // Execute the query
                    if ($stmt->execute()) {
                        echo "<div class='alert alert-success'>Record was saved.</div>";
                    } else {
                        echo "<div class='alert alert-danger'>Unable to save record.</div>";
                    }
                */
                    // apartado 11.2
                    // insert query
                    $query = "INSERT INTO products SET name=:name, description=:description,"
                            . " price=:price, image=:image, created=:created";
                    
                    // prepare query for execution
                    $stmt = $con->prepare($query);
                    
                    $name= htmlspecialchars(strip_tags($_POST['name']));
                    $description=htmlspecialchars(strip_tags($_POST['description']));
                    $price=htmlspecialchars(strip_tags($_POST['price']));
                    
                    // new 'image' field
                    // enlace para entender el sha1_file https://www.php.net/manual/es/function.sha1-file.php
                    $image=!empty($_FILES["image"]["name"])
                            ? sha1_file($_FILES['image']['tmp_name']) . "-" . basename($_FILES["image"]["name"])
                            : "";
                    $image=htmlspecialchars(strip_tags($image));
                    
                    // bind the parameters
                    $stmt->bindParam(':name', $name);
                    $stmt->bindParam(':description', $description);
                    $stmt->bindParam(':price', $price);
                    $stmt->bindParam(':image', $image);
                    
                    // specify when this record was inserted to the database
                    $created=date('Y-m-d H:i:s');
                    $stmt->bindParam(':created', $created);
                    
                    // Execute the query
                    if ($stmt->execute()) {
                        echo "<div class='alert alert-success'>Record was saved.</div>";
                        // apartado 11.3
                        // now, if image is not empty, try to upload the image
                        if($image){
                            
                            // sha1_file() function is used to make a unique file name
                            $target_directory = "uploads/";
                            $target_file = $target_directory . $image;
                            $file_type = pathinfo($target_file, PATHINFO_EXTENSION);
                            
                            // error message is empty
                            $file_upload_error_messages="";
                            
                            // apartado 11.4
                            // make sure that file is a real image
                            $check = getimagesize($_FILES["image"]["tmp_name"]);
                            // !== -> diferente o de distinto tipo.
                            if($check!==false){
                                // submitted file is an image
                            }else{
                                $file_upload_error_messages.="<div>Submitted file is not an image.</div>";
                            }
                            //---- Fin apartado 11.4 -----
                            // apartado 11.5
                            // make sure certain file types are allowed
                            $allowed_file_types=array("jpg", "jpeg", "png", "gif");
                            if(!in_array($file_type, $allowed_file_types)){
                                $file_upload_error_messages.="<div>Only JPG, JPEG, PNG, GIF files are allowed.</div>";
                            }
                            //---- Fin apartado 11.5
                            // apartado 11.6
                            // make sure file does not exist
                            if(file_exists($target_file)){
                                $file_upload_error_messages.="<div>Image already exists. Try to change file name.</div>";
                            }
                            //---- Fin apartado 11.6 ----
                            // apartado 11.7
                            // make sure submitted file is not too large,can't be larger than 1MB
                            if($_FILES['image']['size'] > (1024000)){
                                $file_upload_error_messages.="<div>Image must be less than 1MB in size.</div>";
                            }
                            //---- Fin apartado 11.7 ----
                            // apartado 11.8
                            // make sure the 'uploads' folder exists
                            //if not, create it
                            //is_dir() - Indica si el nombre de archivo es un directorio.
                            if(!is_dir($target_directory)){
                                // Explicacion de los parametros https://www.php.net/manual/es/function.mkdir.php
                                mkdir($target_directory, 0777, true);
                            }
                            //---- Fin apartado 11.8 ----
                            // apartado 11.9
                            // if $file_upload_error_messages is still empty
                            if(empty($file_upload_error_messages)){
                                // it means there are no errors, so try to upload the file
                                if(move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)){
                                    // it means photo was uploaded
                                }else{
                                    echo "<div class='alert alert-danger'>";
                                        echo "<div>Unable to upload photo.</div>";
                                        echo "<div>Update the record to upload photo.</div>";
                                    echo "</div>";
                                }
                            }
                            // if $file_upload_error_messages is NOT empty
                            else{
                                // it means there are some errors, so show them to user
                                echo "<div class='alert alert-danger'>";
                                    echo "<div>{$file_upload_error_messages}</div>";
                                    echo "<div>Update the record to upload photo.</div>";
                                echo "</div>";
                            }
                            //---- Fin apartado 11.9 -----
                        }
                        //---- Fin apartado 11.3 -----
                        
                    } else {
                        echo "<div class='alert alert-danger'>Unable to save record.</div>";
                    }
                    //----- Fin apartado 11.2 -----
                }
                // show error
                catch (PDOException $exception) {
                    die('Error: ' . $exception->getMessage());
                }
            }
            ?>

            <!-- html form here where the product information will be entered 
            apartado 5.2
            -->
            <!-- En el apartado 11.1 se cambia este form por el que hay nuevo.
            Lo que hace el nuevo es permitir la subida de archivos.
            <form action="<php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            -->
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
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
                    <!-- Apartado 11.1 -->
                    <tr>
                        <td>Photo</td>
                        <td><input type="file" name="image" /></td>
                    </tr>
                    <!-- Fin 11.1 -->
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