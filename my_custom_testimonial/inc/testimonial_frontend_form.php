<?php
function add_testimonial_frontend(){
        $form = file_get_contents('add_testimonial_form.php', true);
        $editor_content = getnerate_form();
        $create_form = str_replace('CONTENT_EDITOR', $editor_content, $form );
        
        return $create_form;
}

function getnerate_form(){
    ob_start();

    wp_editor('', 'add_testimonial_editor_ID');

    $contents = ob_get_clean();

    return $contents;
}