        
    <!-- Built in Page Title -->
    <?php include "includes/page_title.php"; ?>

    
    <!-- Built in Breadcrumb -->
    <?php include "includes/breadcrumb.php"; ?>

    <!-- Category Form -->

<form id="publish_post_form" action="posts.php" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="post_title">Post Title</label>
        <input id="post_title" type="text" class="form-control" name="post_title">
    </div>

    <div class="flex-form-group form-group">
        <div class="inner-formgroup-2">
            <label for="post_image">Post Image</label>
            <input id="post_image" type="file" class="" name="post_image">
        </div>
        <div class="inner-formgroup-3">
            <label for="post_category">Post Categories</label>
            <select name="post_category" id="post_category" class="multiple-select-categories" multiple style="width: 100%">
                <?php displayListOfCatsSelect(); ?>        
            </select>
        </div>
        <div class="inner-formgroup-3">    
            <label for="post_tags">Post Tags</label>
            <select name="post_tags" id="post_tags" class="multiple-select-tags" multiple style="width: 100%">
                <?php displayListOfTagsSelect(); ?>        
            </select>
        </div>
        <div class="switcher_round_formgroup inner-formgroup-1">
            <span class="formgroup_label">Post Status </span>
            <label for="post_status" class="switcher_round">                    
                <input id="post_status" type="checkbox" class="form-control" name="post_status" value="Public"  checked>
                <span class="checklist_switcher_round"></span>
            </label>
        </div>
    </div>

    <div class="form-group">
        <label for="post_content">Post Content</label>
        <textarea id="post_content" class="form-control" name="post_content" cols="30" rows="10"></textarea>
    </div>
    
    <div class="form-group">
        <label for="post_publish"></label>
        <input id="post_publish" type="submit" class="btn btn-primary" name="post_publish" value="Publish">
    </div>
</form>
        
        

    