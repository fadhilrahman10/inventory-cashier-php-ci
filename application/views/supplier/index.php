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
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
