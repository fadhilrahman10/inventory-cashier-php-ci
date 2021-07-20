<div
            class="section-content section-dashboard-home"
            data-aos="fade-up"
          >
            <div class="container-fluid">
              <div class="dashboard-heading">
                <h2 class="dashboard-title">Add New Pembelian</h2>
                <p class="dashboard-subtitle">Create your Pembelian</p>
              </div>
              <div class="dashboard-content">
                <div class="row">
                  <div class="col-12">
                    <form action="" method="POST" id="barang">
                      <div class="card">
                        <div class="card-body">
                          <div class="row">
                            <div class="col-md-12">
                              <div class="form-group">
                                <label for="id">No Pembelian</label>
                                <input
                                  type="text"
                                  class="form-control <?php if (validation_errors() != ''): ?>
                                    <?=form_error('no_pembelian') ? 'is-invalid' : 'is-valid';?>
                                    <?php endif;?>"
                                  id="id"
                                  aria-describedby="id"
                                  name="no_pembelian"
                                  value="<?=set_value('no_pembelian', $kode);?>"
                                  readonly
                                />
                                <?php if (validation_errors()): ?>
                                <div class="invalid-feedback">
                                    <?=form_error('no_pembelian');?>
                                </div>
                                <?php endif?>
                              </div>
                            </div>
                            <div class="col-md-12">
                              <div class="form-group">
                                <p class="text-muted">
                                  Apakah anda ingin menambah barang baru?
                                </p>
                                <div
                                  class="custom-control custom-radio custom-control-inline"
                                >
                                  <input
                                    class="custom-control-input"
                                    type="radio"
                                    name="is_new_product"
                                    id="newProductTrue"
                                    v-model="is_new_product"
                                    :value="true"
                                  />
                                  <label class="custom-control-label" for="newProductTrue"
                                    >Iya, boleh</label
                                  >
                                </div>
                                <div
                                  class="custom-control custom-radio custom-control-inline"
                                >
                                  <input
                                    class="custom-control-input"
                                    type="radio"
                                    name="is_new_product"
                                    id="newProductFalse"
                                    v-model="is_new_product"
                                    :value="false"
                                  />
                                  <label
                                    class="custom-control-label"
                                    for="newProductFalse"
                                    >Enggak, makasih</label
                                  >
                                </div>
                              </div>
                            </div>
                            <div class="col-md-6" v-if="is_new_product">
                              <div class="form-group" >
                                <label>Nama Barang</label>
                                <input
                                  type="text"
                                  name="nama_barang"
                                  class="form-control <?php if (validation_errors() != ''): ?>
                                    <?=form_error('nama_barang') ? 'is-invalid' : 'is-valid';?>
                                    <?php endif;?>"
                                  aria-describedby="storeHelp"
                                  value="<?=set_value('nama_barang');?>"
                                  required
                                />
                                <?php if (validation_errors()): ?>
                                <div class="invalid-feedback">
                                    <?=form_error('nama_barang');?>
                                </div>
                                <?php endif?>
                              </div>
                            </div>
                            <div class="col-md-6" v-if="is_new_product">
                              <div class="form-group">
                                <label>Unit</label>
                                <input
                                  type="text"
                                  name="unit"
                                  class="form-control"
                                  aria-describedby="storeHelp"
                                  required
                                />
                              </div>
                            </div>
                            <div class="col-md-6" v-if="is_new_product">
                              <div class="form-group">
                                <label>Harga Beli</label>
                                <input
                                  type="number"
                                  name="harga_beli"
                                  class="form-control"
                                  aria-describedby="storeHelp"
                                  required
                                />
                              </div>
                            </div>
                            <div class="col-md-6" v-if="is_new_product">
                              <div class="form-group" >
                                <label>Harga Jual</label>
                                <input
                                  type="number"
                                  name="harga_jual"
                                  class="form-control"
                                  aria-describedby="storeHelp"
                                  required
                                />
                              </div>
                            </div>
                            <div class="col-md-12" v-else>
                              <div class="form-group" >
                                <label>Barang</label>
                                <select name="id_barang" class="form-control selectpicker <?php if (validation_errors() != ''): ?>
                                    <?=form_error('id_barang') ? 'is-invalid' : 'is-valid';?>
                                  <?php endif;?>"
                                  data-live-search="true"
                                  >
                                  <option value="">Select Barang</option>
                                  <?php foreach ($barang as $dt): ?>
                                  <option <?=set_select('id_barang', $dt['id_barang']);?> value="<?=$dt['id_barang'];?>"><?=$dt['nama_barang'];?></option>
                                  <?php endforeach;?>
                                </select>
                                <?php if (validation_errors()): ?>
                                <div class="invalid-feedback">
                                    <?=form_error('id_barang');?>
                                </div>
                                <?php endif?>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="supplier">Supplier</label>
                                <select
                                  class="form-control selectpicker <?php if (validation_errors() != ''): ?>
                                    <?=form_error('id_supplier') ? 'is-invalid' : 'is-valid';?>
                                    <?php endif;?>"
                                  data-live-search="true"
                                  name="id_supplier"
                                >
                                  <option selected value="">
                                    Select Supplier
                                  </option>
                                  <?php foreach ($supplier as $dt): ?>
                                  <option value="<?=$dt['id_supplier'];?>" <?=set_select('id_supplier', $dt['id_supplier']);?>><?=$dt['nama'];?></option>
                                  <?php endforeach;?>
                                </select>
                                <?php if (validation_errors()): ?>
                                <div class="invalid-feedback">
                                    <?=form_error('id_supplier');?>
                                </div>
                                <?php endif?>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="jumlah">Jumlah</label>
                                <input
                                  type="number"
                                  class="form-control <?php if (validation_errors() != ''): ?>
                                    <?=form_error('jumlah') ? 'is-invalid' : 'is-valid';?>
                                    <?php endif;?>"
                                  id="jumlah"
                                  aria-describedby="jumlah"
                                  name="jumlah"
                                  value="<?=set_value('jumlah');?>"
                                />
                                <?php if (validation_errors()): ?>
                                <div class="invalid-feedback">
                                    <?=form_error('jumlah');?>
                                </div>
                                <?php endif?>
                              </div>
                            </div>
                            <div class="col-md-12">
                              <div class="form-group">
                                <label for="total">Total</label>
                                <input
                                  type="number"
                                  class="form-control <?php if (validation_errors() != ''): ?>
                                    <?=form_error('total') ? 'is-invalid' : 'is-valid';?>
                                    <?php endif;?>"
                                  id="total"
                                  aria-describedby="total"
                                  name="total"
                                  value="<?=set_value('total');?>"
                                />
                                <?php if (validation_errors()): ?>
                                <div class="invalid-feedback">
                                    <?=form_error('total');?>
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
