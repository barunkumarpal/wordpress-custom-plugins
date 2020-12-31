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
                <div class="text-danger form_error d-none"></div>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Username" id="username"/>
                </div>
                <div class="form-group">
                    <input type="email" class="form-control" placeholder="Email" id="email"/>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" placeholder="Password" id="pwd"/>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" placeholder="Confirm Password" id="re_pwd"/>
                </div>
                <div class="form-group text-right">
                    <button type="submit" class="btn cwpl_custom_registration">Register</button>
                </div>
            </div>
        </div>
    </div>
</div>