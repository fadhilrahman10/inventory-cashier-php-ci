    <nav
      class="navbar navbar-expand-lg navbar-light navbar-store fixed-top navbar-fixed-top"
      data-aos="fade-down"
    >
      <div class="container">
        <a class="navbar-brand" href="<?=base_url('auth');?>">
          <img src="<?=base_url();?>assets/images/logo.svg" alt="" />
        </a>

      </div>
    </nav>

    <!-- Page Content -->
    <div class="page-content page-auth">
      <div class="section-store-auth" data-aos="fade-up">
        <div class="container">
          <div class="row align-items-center row-login">
            <div class="col-lg-6 text-center">
              <img
                src="<?=base_url();?>assets/images/login-placeholder.png"
                alt=""
                class="w-50 mb-4 mb-lg-none"
              />
            </div>
            <div class="col-lg-5">
              <h2>
                Belanja kebutuhan utama, <br />
                menjadi lebih mudah
              </h2>
              <form class="mt-3" action="" method="POST">
                <?php if ($this->session->flashdata()): ?>
                <div class="alert alert-danger" role="alert">
                    <?=$this->session->flashdata('login');?>
                </div>
                <?php endif?>
                <div class="form-group">
                  <label>Username</label>
                  <input
                    type="text"
                    name="username"
                    autofocus
                    value="<?=set_value('username');?>"
                    class="form-control w-75 <?php if (validation_errors() != ''): ?><?=form_error('username') ? 'is-invalid' : 'is-valid';?><?php endif;?>"
                  />
                  <?php if (validation_errors()): ?>
                  <div class="invalid-feedback">
                      <?=form_error('username');?>
                  </div>
                  <?php endif?>
                </div>
                <div class="form-group">
                  <label>Password</label>
                  <input type="password" name="pass" id="pass" class="form-control w-75 <?php if (validation_errors() != ''): ?><?=form_error('pass') ? 'is-invalid' : 'is-valid';?><?php endif;?>" />
                  <?php if (validation_errors()): ?>
                  <div class="invalid-feedback">
                      <?=form_error('pass');?>
                  </div>
                  <?php endif?>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="show">
                    <label class="form-check-label" for="show">
                        Show / Hide
                    </label>
                </div>
                <button
                  class="btn btn-success btn-block w-75 mt-4"
                 type="submit"
                 name="submit"
                >
                  Sign In to My Account
                </button>
                <a class="btn btn-signup w-75 mt-2" href="<?=base_url('auth');?>/register">
                  Sign Up
                </a>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
