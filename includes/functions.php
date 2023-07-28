<?php 
include "templates.php";


function createCategoriesList(){
    global $connection;
    $query = "SELECT * FROM categories";
    $select_all_categories_query = mysqli_query($connection,$query);
    if(!$select_all_categories_query){
        die("Something went wrong on db connection..");
    }
    while($row = mysqli_fetch_assoc($select_all_categories_query)){
        $cat_title = $row['cat_title'];
        echo "<li><a href='#'>" .$cat_title. "</a></li>";
    }   
}

function categoriesListForSidebarMenu(){
    global $connection;
    $query = "SELECT * FROM categories";
    $select_all_categories_query = mysqli_query($connection,$query);
    if(!$select_all_categories_query){
        die("Something went wrong on db connection..");
    }

    echo '<div class="col-lg-6">
    <ul class="list-unstyled">';
    $categories_split = ceil(mysqli_num_rows($select_all_categories_query)/2);
    $count = 0;

    while($row = mysqli_fetch_assoc($select_all_categories_query)){
        $cat_title = $row['cat_title'];
        echo "<li><a href='#'>" .$cat_title. "</a></li>";
        $count++;
        if($categories_split > 5 && $categories_split == $count){
            echo '</ul>
            </div>
            <div class="col-lg-6">
                <ul class="list-unstyled">
                ';
                    
        }
    }   
    echo '</ul>
            </div>';
}

function createPostListView(){
    global $connection;
    $query = "SELECT * FROM posts";
    $select_all_posts_query = mysqli_query($connection,$query);
    while($row = mysqli_fetch_assoc($select_all_posts_query)){
        $post_title = $row['post_title'];
        $post_author = $row['post_author'];
        $post_date = $row['post_date'];
        $post_image = $row['post_image'];
        $post_content = $row['post_content'];

        PostListViewTemplate($post_title,$post_author,$post_date,$post_image,$post_content);
    }   
}

function searchWidgetIn($search_key){
    global $connection;
    $query = "SELECT * FROM posts WHERE post_tags LIKE '%$search_key%'";
    $search_input_post_query = mysqli_query($connection,$query);
    if(!$search_input_post_query){
        die("Something went wrong on db connection..");
    }

    $count = mysqli_num_rows($search_input_post_query);

    if($count == 0){
        
            echo "No result found for " .$search_key;
        
    }else{

        while($row = mysqli_fetch_assoc($search_input_post_query)){
            $post_title = $row['post_title'];
            $post_author = $row['post_author'];
            $post_date = $row['post_date'];
            $post_image = $row['post_image'];
            $post_content = $row['post_content'];

            PostListViewTemplate($post_title,$post_author,$post_date,$post_image,$post_content);
        }  
       
    }
      
}



?>