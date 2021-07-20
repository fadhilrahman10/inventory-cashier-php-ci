<div
            class="section-content section-dashboard-home"
            data-aos="fade-up"
          >
            <div class="container-fluid">
              <div class="dashboard-heading">
                <h2 class="dashboard-title">Edit Supplier</h2>
                <p class="dashboard-subtitle">Edit your Supplier</p>
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
                                <label for="id">ID Supplier</label>
                                <input
                                  type="text"
                                  class="form-control <?php if (validation_errors() != ''): ?>
                                    <?=form_error('id_supplier') ? 'is-invalid' : 'is-valid';?>
                                    <?php endif;?>"
                                  id="id"
                                  aria-describedby="id"
                                  name="id_supplier"
                                  value="<?=set_value('id_supplier', $data['id_supplier']);?>"
                                  readonly
                                />
                                <?php if (validation_errors()): ?>
                                <div class="invalid-feedback">
                                    <?=form_error('id_supplier');?>
                                </div>
                                <?php endif?>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="nama">Nama Supplier</label>
                                <input
                                  type="text"
                                  class="form-control <?php if (validation_errors() != ''): ?>
                                    <?=form_error('nama') ? 'is-invalid' : 'is-valid';?>
                                    <?php endif;?>"
                                  id="nama"
                                  aria-describedby="nama"
                                  name="nama"
                                  value="<?=set_value('nama', $data['nama']);?>"
                                />
                                <?php if (validation_errors()): ?>
                                <div class="invalid-feedback">
                                    <?=form_error('nama');?>
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
