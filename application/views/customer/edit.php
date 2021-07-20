<div
            class="section-content section-dashboard-home"
            data-aos="fade-up"
          >
            <div class="container-fluid">
              <div class="dashboard-heading">
                <h2 class="dashboard-title">Edit Customer</h2>
                <p class="dashboard-subtitle">Update your Customer</p>
              </div>
              <div class="dashboard-content">
                <div class="row">
                  <div class="col-12">
                    <form action="" method="POST">
                      <div class="card">
                        <div class="card-body">
                          <div class="row">
                            <div class="col-md-12">
                              <div class="form-group">
                                <label for="id">ID Customer</label>
                                <input
                                  type="text"
                                  class="form-control <?php if (validation_errors() != ''): ?>
                                    <?=form_error('id_customer') ? 'is-invalid' : 'is-valid';?>
                                    <?php endif;?>"
                                  id="id"
                                  aria-describedby="id"
                                  name="id_customer"
                                  value="<?=set_value('id_customer', $data['id_customer']);?>"
                                  readonly
                                />
                                <?php if (validation_errors()): ?>
                                <div class="invalid-feedback">
                                    <?=form_error('id_customer');?>
                                </div>
                                <?php endif?>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="nama">Nama Customer</label>
                                <input
                                  type="text"
                                  class="form-control <?php if (validation_errors() != ''): ?>
                                    <?=form_error('nama_customer') ? 'is-invalid' : 'is-valid';?>
                                    <?php endif;?>"
                                  id="nama"
                                  aria-describedby="nama"
                                  name="nama_customer"
                                  value="<?=set_value('nama_customer', $data['nama_customer']);?>"
                                />
                                <?php if (validation_errors()): ?>
                                <div class="invalid-feedback">
                                    <?=form_error('nama_customer');?>
                                </div>
                                <?php endif?>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="no_hp">No Hp</label>
                                <input
                                  type="text"
                                  class="form-control <?php if (validation_errors() != ''): ?>
                                    <?=form_error('no_hp') ? 'is-invalid' : 'is-valid';?>
                                    <?php endif;?>"
                                  id="no_hp"
                                  aria-describedby="no_hp"
                                  name="no_hp"
                                  value="<?=set_value('no_hp', $data['no_hp']);?>"
                                />
                                <?php if (validation_errors()): ?>
                                <div class="invalid-feedback">
                                    <?=form_error('no_hp');?>
                                </div>
                                <?php endif?>
                              </div>
                            </div>
                            <div class="col-md-12">
                              <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <input
                                  type="text"
                                  class="form-control <?php if (validation_errors() != ''): ?>
                                    <?=form_error('alamat') ? 'is-invalid' : 'is-valid';?>
                                    <?php endif;?>"
                                  id="alamat"
                                  aria-describedby="alamat"
                                  name="alamat"
                                  value="<?=set_value('alamat', $data['alamat']);?>"
                                />
                                <?php if (validation_errors()): ?>
                                <div class="invalid-feedback">
                                    <?=form_error('alamat');?>
                                </div>
                                <?php endif?>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row mt-2">
                        <div class="col">
                          <button
                            type="submit"
                            class="btn btn-success btn-block px-5"
                          >
                            Save Now
                          </button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
