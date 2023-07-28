<?php


if(isset($_POST['post_publish'])){  

    $publish_post_values_array = [
        "post_title" => $_POST['post_title'],
        "post_image" => $_FILES['post_image']['name'],
        "post_image_tmp" => $_FILES['post_image']['tmp_name'],
        "post_author" => "Greg",
        "post_category" => (isset($_POST['post_category'])) ? $_POST['post_category'] : null,
        "post_status" => (isset($_POST['post_status'])) ? $_POST['post_status'] : 'Draft',
        "post_tags" => (isset($_POST['post_tags'])) ? $_POST['post_tags'] : null,
        "post_content" => $_POST['post_content'],
        "post_date" => date('d-m-y'),
        "post_comment_count" => "4",
    ];
    publishNewPost($publish_post_values_array);

}

if(isset($_GET['delete'])){  

    deletePost($_GET['delete']);

}

?>
        
    <!-- Built in Page Title -->
    <?php include "includes/page_title.php"; ?>

    
    <!-- Built in Breadcrumb -->
    <?php include "includes/breadcrumb.php"; ?>

    <!-- Category Form -->

<table class="table table-bordered table-hover text-nowrap table-responsive">
    <thead>
        <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Image</th>
        <th>Category</th>
        <th>Tags</th>
        <th>Additional Info</th>
        </tr>
    </thead>
    <tbody>
        
        <!-- Create categories table from database -->
        <?php postTableFromDb(); ?>

    </tbody>
    
</table>