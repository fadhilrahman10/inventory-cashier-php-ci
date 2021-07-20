<div
            class="section-content section-dashboard-home"
            data-aos="fade-up"
          >
            <div class="container-fluid">
              <div class="dashboard-heading">
                <h2 class="dashboard-title">Purchase</h2>
                <p class="dashboard-subtitle">Manage it well and get money</p>
              </div>
              <div class="dashboard-content">
                <div class="row">
                  <div class="col-12">
                  <?php if (isset($add)): ?>
                    <a
                      href="<?=base_url('pembelian');?>/add"
                      class="btn btn-success"
                      >Add New Purchase</a
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
                      <?php if (isset($sort)): ?>
                        <form action="" method="POST" class="form-inline mb-2">
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
                              <th scope="col">Barang</th>
                              <th scope="col">Supplier</th>
                              <th scope="col">Jumlah</th>
                              <th scope="col">Total</th>
                              <th scope="col">Tanggal</th>
                              <th scope="col">Time</th>
                            </tr>
                          </thead>
                          <tbody>
                          <?php foreach ($data as $dt): ?>
                            <tr
                              class="product-title"
                              onclick="location.href='<?=base_url('pembelian');?>/detail/<?=$dt['no_pembelian'];?>'"
                            >
                              <th scope="row"><?=$dt['nama_barang'];?></th>
                              <td><?=$dt['nama'];?></td>
                              <td><?=$dt['jumlah'];?></td>
                              <td><?=$dt['total'];?></td>
                              <td><?=$this->crud->convert_date('d F Y', $dt['tanggal']);?></td>
                              <td><?=$this->crud->convert_date('H : i A', $dt['tanggal']);?></td>
                            </tr>
                            <?php endforeach;?>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
