<div
            class="section-content section-dashboard-home"
            data-aos="fade-up"
            id="content"
          >
            <div class="container-fluid">
              <div class="dashboard-heading">
                <h2 class="dashboard-title">#<?=$data['no_pembelian'];?></h2>
                <p class="dashboard-subtitle">Pembelian Details</p>
              </div>
              <div class="dashboard-content" id="transactionDetails">
                <div class="row">
                  <div class="col-12">
                    <div class="card">
                      <div class="card-body">
                        <div class="row">
                          <div class="col-12 col-md-8">
                            <div class="row">
                              <div class="col-12 col-md-6">
                                <div class="product-title">Supplier Name</div>
                                <div class="product-subtitle"><?=$data['nama'];?></div>
                              </div>
                              <div class="col-12 col-md-6">
                                <div class="product-title">Mobile</div>
                                <div class="product-subtitle"><?=$data['no_hp'];?></div>
                              </div>
                              <div class="col-12 col-md-6">
                                <div class="product-title">
                                  Date of Transaction
                                </div>
                                <div class="product-subtitle">
                                  <?=$this->crud->convert_date('d F, Y', $data['tanggal']);?>
                                </div>
                              </div>
                              <div class="col-12 col-md-6">
                                <div class="product-title">
                                  Time of Transaction
                                </div>
                                <div class="product-subtitle">
                                  <?=$this->crud->convert_date('H : i A', $data['tanggal']);?>
                                </div>
                              </div>
                              <div class="col-12 col-md-6">
                                <div class="product-title">Address</div>
                                <div class="product-subtitle">
                                  <?=$data['alamat'];?>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-12 mt-4">
                            <h5>Informations</h5>
                            <div class="row">
                              <div class="col-12 col-md-6">
                                <div class="product-title">Barang</div>
                                <div class="product-subtitle"><?=$data['nama_barang'];?></div>
                              </div>
                              <div class="col-12 col-md-6">
                                <div class="product-title">Jumlah</div>
                                <div class="product-subtitle"><?=$data['jumlah'];?> <?=$data['unit'];?></div>
                              </div>
                              <div class="col-12 col-md-6">
                                <div class="product-title">Total</div>
                                <div class="product-subtitle">Rp <?=$this->crud->rupiah($data['total']);?></div>
                              </div>
                              <div class="col-12">
                                <div class="row">
                                  <div class="col-md-2">
                                    <button
                                      type="button"
                                      onclick="printContent('content')"
                                      class="
                                        btn btn-success btn-block
                                        mt-4
                                        d-print-none
                                      "
                                    >
                                      Print
                                    </button>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
