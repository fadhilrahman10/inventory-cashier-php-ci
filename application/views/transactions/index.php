<div
            class="section-content section-dashboard-home"
            data-aos="fade-up"
          >
            <div class="container-fluid">
              <div class="dashboard-heading">
                <h2 class="dashboard-title">Transactions</h2>
                <p class="dashboard-subtitle">
                  Big result start from the small one
                </p>
              </div>
              <div class="dashboard-content">
                <ul class="nav nav-pills" id="myTab" role="tablist">
                  <li class="nav-item" role="presentation">
                    <a
                      class="nav-link active"
                      id="sell-tab"
                      data-toggle="tab"
                      href="#sell"
                      role="tab"
                      aria-controls="sell"
                      aria-selected="true"
                      >Sell Product</a
                    >
                  </li>
                  <li class="nav-item" role="presentation">
                    <a
                      class="nav-link"
                      id="buy-tab"
                      data-toggle="tab"
                      href="#buy"
                      role="tab"
                      aria-controls="buy"
                      aria-selected="false"
                      >Buy Product</a
                    >
                  </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                  <div
                    class="tab-pane fade show active"
                    id="sell"
                    role="tabpanel"
                    aria-labelledby="sell-tab"
                  >
                    <div class="row mt-3">
                      <div class="col-12 mt-2">
                      <?php foreach ($penjualan as $dt): ?>
                        <a
                          class="card card-list d-block"
                          href="<?=base_url('cashier');?>/detail/<?=$dt['no_penjualan'];?>"
                        >
                          <div class="card-body">
                            <div class="row">
                              <div class="col-md-1">
                                <!-- <img
                                  src="/images/dashboard-icon-product-3.png"
                                  alt=""
                                /> -->
                              </div>
                              <div class="col-md-4">
                                <?=$dt['nama_barang'];?>
                              </div>
                              <div class="col-md-3">
                                <?=$dt['nama_customer'];?>
                              </div>
                              <div class="col-md-3">
                                <?=$this->crud->convert_date('d F, Y', $dt['tanggal']);?>
                              </div>
                              <div class="col-md-1 d-none d-md-block">
                                <img
                                  src="<?=base_url();?>assets/images/dashboard-arrow-right.svg"
                                  alt=""
                                />
                              </div>
                            </div>
                          </div>
                        </a>
                      <?php endforeach;?>
                      </div>
                    </div>
                  </div>
                  <div
                    class="tab-pane fade"
                    id="buy"
                    role="tabpanel"
                    aria-labelledby="buy-tab"
                  >
                    <div class="row mt-3">
                      <div class="col-12 mt-2">
                      <?php foreach ($pembelian as $dt): ?>
                        <a
                          class="card card-list d-block"
                          href="<?=base_url('pembelian');?>/detail/<?=$dt['no_pembelian'];?>"
                        >
                          <div class="card-body">
                            <div class="row">
                              <div class="col-md-1">
                                <!-- <img
                                  src="/images/dashboard-icon-product-1.png"
                                  alt=""
                                /> -->
                              </div>
                              <div class="col-md-4">
                                <?=$dt['nama_barang'];?>
                              </div>
                              <div class="col-md-3">
                                <?=$dt['nama'];?>
                              </div>
                              <div class="col-md-3">
                                <?=$this->crud->convert_date('d F, Y', $dt['tanggal']);?>
                              </div>
                              <div class="col-md-1 d-none d-md-block">
                                <img
                                  src="<?=base_url();?>assets/images/dashboard-arrow-right.svg"
                                  alt=""
                                />
                              </div>
                            </div>
                          </div>
                        </a>
                        <?php endforeach;?>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
