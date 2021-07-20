<div
  class="section-content section-dashboard-home"
  data-aos="fade-up"
>
  <div class="container-fluid">
    <div class="dashboard-heading">
      <h2 class="dashboard-title">My Account</h2>
      <p class="dashboard-subtitle">Update your current profile</p>
    </div>
    <div class="dashboard-content">
      <div class="row">
        <div class="col-12">
          <form action="" method="POST">
            <?php if ($this->session->flashdata()): ?>
            <div class="alert alert-success" role="alert">
                <?=$this->session->flashdata('success');?>
              </div>
            <?php endif?>
            <div class="card">
              <div class="card-body">
                <div class="row mb-2">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="name">Username</label>
                      <input
                        type="hidden"
                        class="form-control"
                        id="id_admin"
                        name="id_admin"
                        value="<?=$user['id_admin'];?>"
                      />
                      <input
                        type="text"
                        class="form-control <?php if (validation_errors() != ''): ?><?=form_error('username') ? 'is-invalid' : 'is-valid';?><?php endif;?>"
                        id="name"
                        aria-describedby="emailHelp"
                        name="username"
                        value="<?=set_value('username', $user['username']);?>"
                      />
                      <?php if (validation_errors()): ?>
                      <div class="invalid-feedback">
                          <?=form_error('username');?>
                      </div>
                      <?php endif?>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="name">Password</label>
                      <input
                        type="text"
                        class="form-control <?php if (validation_errors() != ''): ?><?=form_error('pw') ? 'is-invalid' : 'is-valid';?><?php endif;?>"
                        id="pw"
                        aria-describedby="emailHelp"
                        name="pw"
                        value="<?=set_value('pw', $user['password']);?>"
                      />
                      <?php if (validation_errors()): ?>
                      <div class="invalid-feedback">
                          <?=form_error('pw');?>
                      </div>
                      <?php endif?>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col text-right">
                    <button
                      type="submit"
                      class="btn btn-success px-5"
                    >
                      Save Now
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
