<?php
    $url_splitted = explode("/",$_SERVER["REQUEST_URI"]);
    
    $title= ucfirst(str_replace(array(".php","_"),array(""," "),$url_splitted[2]) . ' ');
    $ignore_more_params = explode("&",$title);
    $title_trimmed = explode("?",$ignore_more_params[0]);
?>

<h1 class="page-header">
    
    <?php 
    echo $title_trimmed[0]; 
    
    if(isset($title_trimmed[1])){
        $small_title = explode("=",$title_trimmed[1]);
       if($small_title[0] == "source"){
            $small_title_disp = ucfirst($small_title[1]);
            echo "<small> ".$small_title_disp."</small>";
        }
        
    }
    ?>

</h1>