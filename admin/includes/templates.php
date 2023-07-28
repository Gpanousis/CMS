<?php 
/*
This function returns the message we wish to print to user after an action (remove,update, etc)
*/
function userMessageUpdate($given_action_text,$type){

    if($type == "CATEGORY"){

        $given_action_text_fixed = rtrim($given_action_text,"e");
        $given_action_text_fixed = strtoupper($given_action_text_fixed);
        
        echo "<div class='notify_user notify_user_accept'>
        <span class='msg_cn'>You have been successfuly ".$given_action_text." new category.</span>
        <br><span class='msg_mn'>CATEGORY ".$given_action_text_fixed."ED</span></div>";

    }else if($type == "POST"){

        $given_action_text_fixed = rtrim($given_action_text,"e");
        $given_action_text_fixed = strtoupper($given_action_text_fixed);
        
        echo "<div class='notify_user notify_user_accept'>
        <span class='msg_cn'>You have been successfuly ".$given_action_text." new post.</span>
        <br><span class='msg_mn'>POST ".$given_action_text_fixed."ED</span></div>";

    }
    
    
}



?>