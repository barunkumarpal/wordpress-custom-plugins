<?php
if(!defined('ABSPATH')){
    exit('Direct access not allowed');
    die('Direct access not allowed');
}
?>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>

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
                    <input type="password" class="form-control" placeholder="Password" id="pwd"/>
                </div>

                <?php if(!empty(get_theme_mod('cwpl_captcha_sitekey')) && get_theme_mod('cwpl_captcha_option') == 1){?>
                    <div class="g-recaptcha" data-sitekey="<?php echo get_theme_mod('cwpl_captcha_sitekey'); ?>"></div>
                <?php } ?>
                <span class="error captcha_error text-danger"></span>

                <div class="form-group">
                    <input type="checkbox" name="" id="remember">
                    <label for="">Remember Me</label>
                </div>
                <div class="form-group text-right">
                    <button type="submit" class="btn cwpl_custom_login">Login</button>
                </div>
            </div>
        </div>
    </div>
</div>