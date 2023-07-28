<?php include "../includes/db.php"; ?>
<?php include "includes/header.php"; ?>
<?php include "includes/functions.php"; ?>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <?php include "includes/navigation.php"; ?>
        
        <div id="page-wrapper">

            <div class="container-fluid">


                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">

                        <!-- Insert Message -->
                        <?php 
                        if(isset($_POST['submit_category'])){  

                            addNewPostCat($_POST['cat_title']);

                        }else if(isset($_POST['category_rename_update'])){  
                            
                            $updated_id = $_POST['category_rename_id'];
                            $updated_name = $_POST['category_rename'];
                            updatePostCatName($updated_id,$updated_name);

                        }else if(isset($_GET['delete'])){  

                            deletePostCat($_GET['delete']);

                        }

                        
                        ?>
                        
                                
                        <!-- Built in Page Title -->
                        <?php include "includes/page_title.php"; ?>

                        
                        <!-- Built in Breadcrumb -->
                        <?php include "includes/breadcrumb.php"; ?>

                        <!-- Category Form -->
                        <div class="col-xs-6">
                            <form action="categories.php" method="post">
                                <div class="form-group">
                                    <label for="cat_title_field">New Category Name</label>
                                    <input id="cat_title_field" class="form-control" type="text" name="cat_title">
                                </div>
                                <div class="form-group">
                                    <input class="btn btn-primary" type="submit" name="submit_category" value="Add Category">
                                </div>
                            </form>
                        </div>
                        <!-- Existing Categories -->
                        <div class="col-xs-6">
                            <table class="table table-bordered table-hover text-nowrap table-responsive post_categoriy_table">
                                <thead>
                                    <tr>
                                        <th style="width:5%"></th>
                                        <th>ALL CATEGORIES</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <!-- Create categories table from database -->
                                    <?php catTableFromDb(); ?>
                                        
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

    </div>
    <!-- /#wrapper -->

    <!-- Footer -->
    <?php include "includes/footer.php"; ?>