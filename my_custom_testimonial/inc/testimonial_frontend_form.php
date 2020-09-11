<?php
function add_testimonial_frontend(){
    if(!is_user_logged_in()){
        ?>
            <h4 class="text-center mb-4 mt-4">Please Login First to give a review. <a href="<?php echo site_url().'/login-form'; ?>">Login here</a></h4>
        <?php
    } else{
        $form = file_get_contents('add_testimonial_form.php', true);
        $editor_content = getnerate_form();
        $create_form = str_replace('CONTENT_EDITOR', $editor_content, $form );
        
        return $create_form;
    }
}

function getnerate_form(){
    ob_start();

    wp_editor('', 'add_testimonial_editor_ID');

    $contents = ob_get_clean();

    return $contents;
}