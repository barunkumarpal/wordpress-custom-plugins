<?php
if(!defined('ABSPATH')){
    exit('Direct access not allowed');
    die('Direct access not allowed');
}
?>
<div class="container custom_login_form_area">
    <div class="row justify-content-center">
        <div class="col-md-5 column">
            <div class="custom_login_form_section">
                <div class="title_area text-center">
                    <?php
                        if(has_custom_logo()){
                            the_custom_logo();
                        }
                    ?>
                </div>
                <span class="text-danger form_error pb-4"></span><br>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Username" id="username"/>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" placeholder="Password" id="pwd"/>
                </div>
                <div class="form-group text-right">
                    <button type="submit" class="btn cwpl_custom_login">Login >></button>
                </div>
            </div>
        </div>
    </div>
</div>