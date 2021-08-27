    <div
            class="section-content section-dashboard-home"
            data-aos="fade-up"
          >
            <div class="container-fluid">
              <div class="dashboard-heading">
                <h2 class="dashboard-title">Barang</h2>
                <p class="dashboard-subtitle">Manage it well and get money</p>
              </div>
              <div class="dashboard-content">
              <?php if (isset($add)): ?>
                <div class="row">
                  <div class="col-12">
                    <a
                      href="<?=base_url('barang');?>/add"
                      class="btn btn-success"
                      >Add New Barang</a
                    >
                  </div>
                </div>
              <?php endif?>
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
                      <?php if (isset($sort)): ?>
                        <form action="" method="POST" class="form-inline mb-4">
                          <input
                            type="month"
                            class="form-control col-3"
                            value="<?=set_value('bulan', date('Y-m'));?>"
                            name="bulan"
                          />
                          <button type="submit" class="btn btn-dark">Sort</button>
                        </form>
                      <?php endif?>
                        <table
                        class="table table-borderless table-hover"
                        id="tabel"
                        >
                        <thead>
                            <tr class="product-category">
                            <th scope="col">Nama</th>
                            <th scope="col">Jumlah</th>
                            <th scope="col">Unit</th>
                            <th scope="col">Harga Beli</th>
                            <th scope="col">Harga Jual</th>
                            <th scope="col">Buat</th>
                            <th scope="col">Perbarui</th>
                            <?php if (!isset($sort)): ?>
                            <th scope="col" class="d-print-none">Handle</th>
                            <?php endif?>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($barang as $dt): ?>
                            <tr
                            class="product-title"
                            >
                            <th scope="row" onclick="location.href='<?=base_url('barang');?>/update/<?=$dt['id_barang'];?>'"><?=$dt['nama_barang'];?></th>
                            <td onclick="location.href='<?=base_url('barang');?>/update/<?=$dt['id_barang'];?>'"><?=$dt['jumlah'];?></td>
                            <td onclick="location.href='<?=base_url('barang');?>/update/<?=$dt['id_barang'];?>'"><?=$dt['unit'];?></td>
                            <td onclick="location.href='<?=base_url('barang');?>/update/<?=$dt['id_barang'];?>'"><?=$dt['harga_beli'];?></td>
                            <td onclick="location.href='<?=base_url('barang');?>/update/<?=$dt['id_barang'];?>'"><?=$dt['harga_jual'];?></td>
                            <td onclick="location.href='<?=base_url('barang');?>/update/<?=$dt['id_barang'];?>'"><?=$this->crud->convert_date('d F Y', $dt['tgl_input']);?></td>
                            <td onclick="location.href='<?=base_url('barang');?>/update/<?=$dt['id_barang'];?>'">
                                <?=$dt['tgl_update'] == '0000-00-00 00:00:00' ? '-' : $this->crud->convert_date('d F Y', $dt['tgl_update']);?>
                            </td>
                            <?php if (!isset($sort)): ?>
                            <td class="text-center" class="d-print-none">
                                <a onclick="sweetAlert('<?=base_url('barang');?>/hapus/<?=$dt['id_barang'];?>')" class="btn" ><i
                                    class="
                                    bi bi-x-square-fill
                                    d-print-none
                                    text-danger
                                    "
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
														<h2>Laporan Barang <?= isset($bulan) ? 'Bulan '.date('F', strtotime($bulan)): ''; ?> </h2>
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
															<th scope="col">Jumlah</th>
															<th scope="col">Unit</th>
															<th scope="col">Harga Beli</th>
															<th scope="col">Harga Jual</th>
															<th scope="col">Buat</th>
															<th scope="col">Perbarui</th>
														</tr>
													</thead>
                        <tbody>
                        <?php foreach ($barang as $dt): ?>
                            <tr>
															<td><?=$dt['nama_barang'];?></td>
															<td><?=$dt['jumlah'];?></td>
															<td><?=$dt['unit'];?></td>
															<td><?=$dt['harga_beli'];?></td>
															<td><?=$dt['harga_jual'];?></td>
															<td><?=$this->crud->convert_date('d F Y', $dt['tgl_input']);?></td>
															<td>
																	<?=$dt['tgl_update'] == '0000-00-00 00:00:00' ? '-' : $this->crud->convert_date('d F Y', $dt['tgl_update']);?>
															</td>
                            </tr>
                        <?php endforeach;?>
                        	</tbody>
                        </table>

												<div class="row mb-5 mt-5 text-right justify-content-end" >
													<div class="col-6 mb-5" >
														Pekanbaru, <?= date('d F Y'); ?>
													</div>
												</div>
												<div class="row mb-5 mt-5 text-right justify-content-end">
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



<!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrop">
  Launch static backdrop modal
</button> -->

<!-- Modal -->

