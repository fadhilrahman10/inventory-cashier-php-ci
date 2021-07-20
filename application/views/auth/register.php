<nav
    class="
        navbar navbar-expand-lg navbar-light navbar-store
        fixed-top
        navbar-fixed-top
    "
    data-aos="fade-down"
>
    <div class="container">
        <a class="navbar-brand" href="<?=base_url('auth');?>/register">
            <img src="<?=base_url();?>assets/images/logo.svg" alt="" />
        </a>
    </div>
</nav>

<!-- Page Content -->
<div class="page-content page-auth mt-5" id="register">
    <div class="section-store-auth" data-aos="fade-up">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-4">
                    <h2>
                        Memulai untuk jual beli <br />
                        dengan cara terbaru
                    </h2>
                    <form class="mt-3" action="" method="POST">
                        <div class="form-group">
                            <label>Username</label>
                            <input
                                type="text"
                                class="form-control <?php if (validation_errors() != ''): ?><?=form_error('username') ? 'is-invalid' : 'is-valid';?><?php endif;?>"
                                name="username"
                                value="<?=set_value('username');?>"
                                aria-describedby="nameHelp"
                                autofocus
                            />
                            <?php if (validation_errors()): ?>
                            <div class="invalid-feedback">
                                <?=form_error('username');?>
                            </div>
                            <?php endif?>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" value="<?=set_value('pass');?>" name="pass" id="pass" class="form-control <?php if (validation_errors() != ''): ?><?=form_error('pass') ? 'is-invalid' : 'is-valid';?><?php endif;?>" />
                            <?php if (validation_errors()): ?>
                            <div class="invalid-feedback">
                                <?=form_error('pass');?>
                            </div>
                            <?php endif?>
                        </div>
                        <div class="form-group">
                            <label>Confirm Password</label>
                            <input type="password" value="<?=set_value('cpass');?>" name="cpass" id="cpass" class="form-control <?php if (validation_errors() != ''): ?><?=form_error('cpass') ? 'is-invalid' : 'is-valid';?><?php endif;?>" />
                            <?php if (validation_errors()): ?>
                            <div class="invalid-feedback">
                                <?=form_error('cpass');?>
                            </div>
                            <?php endif?>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="show">
                            <label class="form-check-label" for="show">
                                Show
                            </label>
                        </div>
                        <button type="submit" class="btn btn-success btn-block mt-4">
                            Sign Up Now
                        </button>
                        <button type="button" onclick="location.href='<?=base_url('auth');?>'" class="btn btn-signup btn-block mt-2">
                            Back to Sign In
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
