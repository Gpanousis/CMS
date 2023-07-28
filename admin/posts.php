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

                    <?php 

                    if(isset($_GET['source'])){
                        $post_page_handler = $_GET['source'];
                    }else{
                        $post_page_handler = '';
                    }

                    handlePostSource($post_page_handler);
                    


                    ?>

                    
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