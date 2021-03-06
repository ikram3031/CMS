<?php include "includes/admin_header.php"; ?>


    <div id="wrapper">

    <?php include "includes/admin_navigation.php"; ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome to Admin Area
                            <small>Author</small>
                        </h1>

                        <!-- Add CAtegory Form -->
                        <div class="col-xs-6">
                            
                            <?php
                            //to add new category
                            if(isset($_POST['submit'])){

                                $cat_title = $_POST['cat-title'];

                                if($cat_title == "" || empty($cat_title)){
                                    echo "This field should not be empty";
                                } else {
                                    //insert value to database table
                                    $query = "INSERT INTO categories(cat_title) VALUE ('{$cat_title}')";
                                    
                                    $create_category_query = mysql_query($connection, $query);

                                    if(!$create_category_query){
                                        die('QUERY FAILED' . mysqli_error($connection));
                                    }
                                }
                                
                            }
                            ?>
                            <form action="" method="post">
                                <div class="form-group">
                                    <label for="cat_title">Add Category</label>
                                    <input class="form-control" type="text" name="cat_title">
                                </div>
                                <div class="form-group">
                                    <input class="btn btn-primary" type="submit" name="submit" value="Add Category">
                                </div>
                            </form>
                        </div>

                        <div class="col-xs-6">
                            <?php
                            $query = "SELECT * FROM categories";
                            $select_categories = mysqli_query($connection, $query);
                            ?>
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Category Title</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    while($row = mysqli_fetch_assoc($select_categories)){
                                        $cat_id = $row['cat_id'];
                                        $cat_title = $row['cat_title'];
                                        echo "<tr>";
                                        echo "<td>{$cat_id}</td>";
                                        echo "<td>{$cat_title}</td>";
                                        echo "</tr>";
                                    }
                                    ?>
                                    <tr>
                                        

                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

<?php include "includes/admin_footer.php"; ?>
