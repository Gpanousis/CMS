<?php 

include "templates.php"; 


/*
 HELPERS 

global $connection;
cc($connection);

*/


define("cat", "CATEGORY");
define("post", "POST");



function cc($con){
    if($con){
        echo "<span class='con_msg'>It is connected!</span>";
    }else{
        die("<span class='con_er_msg'>fail query</span>");
    }
}

function catTableFromDb(){

   
    
    global $connection;
    $query = "SELECT * FROM categories";
    $select_all_categories_query = mysqli_query($connection,$query);
    if(!$select_all_categories_query){
        die("Something went wrong on db connection..");
    }
    while($row = mysqli_fetch_assoc($select_all_categories_query)){
        $cat_id = $row['cat_id'];
        $cat_title = $row['cat_title'];

        ?> 
        <tr id='cat_<?php echo $cat_id; ?>' class='table_element_hover_effect'>
                <td>
                    <div class='form-check'>
                        <input class='form-check-input' type='checkbox' value=''>                                                
                    </div>
                </td>
                <td class='table_element_flex'>
                    <div class='categ-title' category_id='<?php echo $cat_id; ?>'><?php echo $cat_title; ?></div>
                    <div class='hidden_table_settings'>
                
                                <span>
                                    <button type='button' class='btn btn-success edit-cat-btn'>Edit</button>
                                </span>
                                <span>
                                    <a class='btn btn-danger' href='javascript:confirmDelete("<?php echo $cat_id; ?>")'>Delete</a>
                                </span>
                            
                    </div>
                </td>
        </tr>
        <?php
    }  
}

function postTableFromDb(){
    global $connection;
    $query = "SELECT * FROM posts";
    $select_all_posts_query = mysqli_query($connection,$query);
    if(!$select_all_posts_query){
        die("Something went wrong on db connection..");
    }
    while($row = mysqli_fetch_assoc($select_all_posts_query)){
        $post_id = $row['post_id'];
        $post_title = $row['post_title'];
        $post_category_id = $row['post_category_id'];
        $post_author = $row['post_author'];
        $post_date = $row['post_date'];
        $post_image = $row['post_image'];
        $post_tags = $row['post_tags'];
        $post_comment_count = $row['post_comment_count'];
        $post_status = $row['post_status'];


        echo "<tr class='table_element_hover_effect'>";
        echo "<td>$post_id</td>";
        echo "<td>$post_title</td>";
        echo "<td><img class='img-responsive thmub-admin-panel' src='../images/$post_image' alt='post image'></td>";
        echo "<td>$post_category_id</td>";
        echo "<td>$post_tags</td>";
        ?>
        <td class='table_element_flex'>
            <div>
                <div class='author_addinfo'><span>Author:</span><?php echo $post_author; ?></div>
                <div class='comments_addinfo'><span>Comments:</span><?php echo $post_comment_count; ?></div>
                <div class='date_addinfo'><span>Date:</span><?php echo $post_date; ?></div>
                <div class='status_addinfo'><span>Status:</span><?php echo $post_status; ?></div>
            </div>
            <div class='hidden_table_settings display_block'>
        
                        <span>
                        <a class='btn btn-success' href='javascript:editThisPost("<?php echo $post_id; ?>")'>Edit</a>
                        </span>
                        <span>
                            <a class='btn btn-danger' href='javascript:confirmDelete("<?php echo $post_id; ?>")'>Delete</a>
                        </span>
                    
            </div>
            
            </td>
        <?php
        echo "</td></tr>";
        
    }
}


function addNewPostCat($catitle){

    global $connection;

    if($catitle == "" || empty($catitle)){

        echo "<div class='notify_user notify_user_fail'>This field should not be empty.<br><span class='msg_cn'>INSERT FAILED</span></div>";
    
    }else{

        $query = "INSERT INTO categories(cat_title) ";
        $query .= "VALUE('{$catitle}') ";

        $create_category_query = mysqli_query($connection,$query);

        if(!$create_category_query){
            die('QUERY FAILED' . mysqli_error($connection));
        }else{
            userMessageUpdate('add',cat);
        }

    }
    
}


function deletePostCat($catid){
    global $connection;

    $query = "DELETE FROM categories WHERE cat_id = '{$catid}'";

    $delete_query = mysqli_query($connection,$query);

    if(!$delete_query){
        die('QUERY FAILED' . mysqli_error($connection));
    }else{
        userMessageUpdate('delete',cat);
    }

}

function deletePost($postid){
    global $connection;

    $query = "DELETE FROM posts WHERE post_id = '{$postid}'";

    $delete_post_query = mysqli_query($connection,$query);

    if(!$delete_post_query){
        die('QUERY FAILED' . mysqli_error($connection));
    }else{
        userMessageUpdate('delete',post);
    }
}


function updatePostCatName($catid,$catname){
    global $connection;

    $query = "UPDATE categories SET cat_title = '{$catname}' WHERE cat_id = '{$catid}'";

        $update_cat_name_query = mysqli_query($connection,$query);

        if(!$update_cat_name_query){
            die('QUERY FAILED' . mysqli_error($connection));
        }else{
            userMessageUpdate('update',cat);
        }

}

function handlePostSource($post_page_handler){
    switch ($post_page_handler) {
        case 'add_post':
            include "includes/add_post.php";
            break;
        case 'edit_post':
            include "includes/edit_post.php";
            break;
        case 2:
            echo "bee equals 2";
            break;
        default:
            include "includes/show_all_posts.php";
            break;
    }
}



function displayListOfCatsSelect(){


    global $connection;
    $query = "SELECT * FROM categories";
    $select_all_categories_query = mysqli_query($connection,$query);
    if(!$select_all_categories_query){
        die("Something went wrong on db connection..");
    }
    while($row = mysqli_fetch_assoc($select_all_categories_query)){
        $cat_id = $row['cat_id'];
        $cat_title = $row['cat_title'];
        echo "<option id='category_select_".$cat_id."' value='".$cat_id."'>".$cat_title."</option>";
    }
}

function displayListOfTagsSelect(){


    global $connection;
    $query = "SELECT * FROM tags";
    $select_all_tags_query = mysqli_query($connection,$query);
    if(!$select_all_tags_query){
        die("Something went wrong on db connection..");
    }
    while($row = mysqli_fetch_assoc($select_all_tags_query)){
        $tag_id = $row['tag_id'];
        $tag_name = $row['tag_name'];
        echo "<option id='tag_select_".$tag_id."' value='".$tag_name."'>".$tag_name."</option>";
    }

}


function publishNewPost($post_values){
    $post_image = $post_values['post_image'];
    if($post_image){
        move_uploaded_file($post_values['post_image_tmp'],"../images/$post_image");
    }

    $post_title = $post_values['post_title'];
    $post_author = $post_values['post_author'];
    $post_category = $post_values['post_category'];
    $post_status = $post_values['post_status'];
    $post_tags = $post_values['post_tags'];
    $post_content = $post_values['post_content'];
    $post_date = $post_values['post_date'];
    $post_comment_count = $post_values['post_comment_count'];
    
    $query = "INSERT INTO posts(post_category_id, post_title, post_author, post_date, post_image,
    post_content, post_tags, post_comment_count, post_status) ";

    $query .= "VALUES('{$post_category}','{$post_title}','{$post_author}','{$post_date}','{$post_image}',
    '{$post_content}','{$post_tags}','{$post_comment_count}','{$post_status}' ) ";

    global $connection;
    $publish_new_post_query = mysqli_query($connection,$query);
    if(!$publish_new_post_query){
        die('QUERY FAILED' . mysqli_error($connection));
    }

}

?>
