


<ol class="breadcrumb">
    <?php
    $crumbs = explode("/",$_SERVER["REQUEST_URI"]);

    foreach($crumbs as $crumb){

        $breadoutput = ucfirst(str_replace(array(".php","_"),array(""," "),$crumb) . ' ');

        if($breadoutput == "Admin "){

            echo '<li><i class="fa fa-dashboard"></i>  <a href="index.php">Dashboard</a></li>';

        }else if($breadoutput != " "){
            
            $ignore_more_params = explode("&",$breadoutput);
            $trimmed_breadoutput = explode("?",$ignore_more_params[0]);


            if(isset($trimmed_breadoutput[1])){

                $source_breadoutput = explode("=",$trimmed_breadoutput[1]);

                if($source_breadoutput[0] == "source"){

                    $source_breadoutput_disp = ucfirst($source_breadoutput[1]);

                }else{

                    $source_breadoutput_disp = $trimmed_breadoutput[0];  

                }
                
            }else{

                $source_breadoutput_disp = $trimmed_breadoutput[0];  

            }


            echo '<li class="active"><i class="fa fa-file"></i> '.$source_breadoutput_disp.'</li>';
            
            
        }
        
    }
    ?>
</ol>