<div
            class="section-content section-dashboard-home"
            data-aos="fade-up"
          >
            <div class="container-fluid">
              <div class="dashboard-heading">
                <h2 class="dashboard-title">Supplier</h2>
                <p class="dashboard-subtitle">Manage it well and get money</p>
              </div>
              <div class="dashboard-content">
                <div class="row">
                  <div class="col-12">
                  <?php if (isset($add)): ?>
                    <a
                      href="<?=base_url('supplier');?>/add"
                      class="btn btn-success"
                      >Add New Supplier</a
                    >
                    <?php endif?>
                  </div>
                </div>
                <div class="row mt-4">
                  <div class="col-12">
                    <div
                      class="card card-dashboard-product d-block"
                      href="/dashboard-products-details.html"
                    >
                      <div class="card-body">
                        <?php if ($this->session->flashdata()): ?>
                        <div class="alert alert-success" role="alert">
                            <?=$this->session->flashdata('success');?>
                        </div>
                        <?php endif?>
                        <table
                          class="table table-borderless table-hover"
                          id="tabel"
                        >
                          <thead>
                            <tr class="product-category">
                              <th scope="col">Nama</th>
                              <th scope="col">Alamat</th>
                              <th scope="col">No Hp</th>
                              <?php if (!isset($sort)): ?>
                              <th scope="col" class="text-center">Handle</th>
                              <?php endif?>
                            </tr>
                          </thead>
                          <tbody>
                          <?php foreach ($data as $dt): ?>
                            <tr
                              class="product-title"
                            >
                              <th scope="row" onclick="location.href='<?=base_url('supplier');?>/update/<?=$dt['id_supplier'];?>'"><?=$dt['nama'];?></th>
                              <td onclick="location.href='<?=base_url('supplier');?>/update/<?=$dt['id_supplier'];?>'"><?=$dt['alamat'];?></td>
                              <td onclick="location.href='<?=base_url('supplier');?>/update/<?=$dt['id_supplier'];?>'"><?=$dt['no_hp'];?></td>
                              <?php if (!isset($sort)): ?>
                              <td class="text-center">
                                <a onclick="sweetAlert('<?=base_url('supplier');?>/hapus/<?=$dt['id_supplier'];?>')"
                                  ><i
                                    class="bi bi-x-square-fill text-danger"
                                  ></i
                                ></a>
                              </td>
                              <?php endif?>
                            </tr>
                            <?php endforeach;?>
                          </tbody>
                        </table>
												<button type="button" onclick="printContent('print');" class="btn btn-success btn-block mt-5">Print</button>
                      </div>
                    </div>
                  </div>
                </div>
								<div class="row mt-4 d-none d-print-block" id="print">
									<div class="col-12">
										<div
											class="card card-dashboard-product d-block"
											href="/dashboard-products-details.html"
										>
											<div class="card-body">
												
												<div class="row">
													<div class="col-12 text-center">
														<h2>Laporan Supplier</h2>
														<h4>CV BERKAH</h4>
														<hr>
													</div>
													<?php $user = $this->session->userdata('user'); ?>
													<div class="col-6">
														<p>Tanggal : <?= date('d F Y'); ?></p>
														<p>Dibuat Oleh : <?= $user['username']; ?></p>
													</div>
												</div>

												<table
                          class="table table-bordered"
                        >
                          <thead>
                            <tr>
                              <th scope="col">Nama</th>
                              <th scope="col">Alamat</th>
                              <th scope="col">No Hp</th>
                            </tr>
                          </thead>
                          <tbody>
                          <?php foreach ($data as $dt): ?>
                            <tr>
                              <td><?=$dt['nama'];?></td>
                              <td><?=$dt['alamat'];?></td>
                              <td><?=$dt['no_hp'];?></td>
                            </tr>
                            <?php endforeach;?>
                          </tbody>
                        </table>

												<div class="row mb-3 mt-5 text-right justify-content-end" >
													<div class="col-6" >
														Pekanbaru, <?= date('d F Y'); ?>
													</div>
												</div>
												<div class="row justify-content-end">
													<img src="<?= base_url(); ?>/assets/images/ttd.png" alt="ttd.png" class="w-25">
												</div>
												<div class="row mb-5 text-right justify-content-end">
													<div class="col-6 mb-5" style="margin-top: 1rem;">
														<p class="font-weight-bold pr-5">Novriyanto</p>
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
