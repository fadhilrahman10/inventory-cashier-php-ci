<div
  class="section-content section-dashboard-home"
  data-aos="fade-left"
  id="content"
>
  <div class="container-fluid">
    <div class="dashboard-heading">
      <h2 class="dashboard-title">#CASHIER</h2>
      <p class="dashboard-subtitle">Cashier Transactions</p>
    </div>
    <div class="dashboard-content" id="transactionDetails">
      <div class="row">
        <div class="col-12">
          <div class="card mb-4 d-print-none">
            <div class="card-body text-right">
              <div class="dashboard-card-title">Total</div>
              <div class="dashboard-card-subtitle">
                <div id="total"></div>
              </div>
            </div>
          </div>
          <div class="card">
            <div class="card-body">
              <div class="row d-print-none">
                <div class="col-12">
                  <div class="row">
                    <div class="col-12 col-md-4">
                      <div class="form-group">
                        <label for="barang" class="product-title"
                          >Barang</label
                        >
                        <select
                          name="id_barang"
                          class="form-control selectpicker"
                          id="barang"
                          data-live-search="true"
                        >
                          <option selected value="">Select barang</option>
                          <?php foreach ($barang as $dt): ?>
                          <option value="<?=$dt['id_barang'];?>"><?=$dt['nama_barang'];?></option>
                          <?php endforeach;?>
                        </select>
                      </div>
                    </div>
                    <div class="col-12 col-md-6">
                      <div class="form-group">
                        <label for="customer" class="product-title"
                          >Customer</label
                        >
                        <div class="form-inline">
                          <select
                            name="id_customer"
                            class="form-control col-8 selectpicker"
                            data-live-search="true"
                            id="customer"
                          >
                            <?php foreach ($customer as $dt): ?>
                            <option value="<?=$dt['id_customer'];?>"><?=$dt['nama_customer'];?></option>
                            <?php endforeach;?>
                          </select>
                          <button
                            type="button"
                            class="btn btn-dark"
                            onclick="add_data()"
                          >
                            Add
                          </button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row d-print-none">
                <div class="col-12 mt-2">
                  <h5>Informations</h5>
                  <div class="row justify-content-center">
                    <table
                      class="
                        table table-borderless table-hover
                        text-center
                      "
                    >
                      <thead>
                        <tr class="product-title">
                          <th scope="col" class="">Barang</th>
                          <th scope="col">Customer</th>
                          <th scope="col">Jumlah</th>
                          <th scope="col">Harga</th>
                          <th scope="col">Sub Total</th>
                          <th scope="col">Handle</th>
                        </tr>
                      </thead>
                      <tbody id="cart">
                        <!-- <tr class="product-subtitle">
                          <th scope="row">Pena</th>
                          <td>Mark</td>
                          <td width="50">
                            <form
                              action=""
                              class="
                                form-inline
                                justify-content-center
                              "
                            >
                              <a href="" class="btn"
                                ><i
                                  class="
                                    bi bi-dash-square-fill
                                    text-muted
                                  "
                                ></i
                              ></a>
                              <input
                                type="number"
                                class="form-control col-6 text-center"
                              />
                              <a href="" class="btn"
                                ><i
                                  class="
                                    bi bi-plus-square-fill
                                    text-primary
                                  "
                                ></i
                              ></a>
                            </form>
                          </td>
                          <td>5000</td>
                          <td>50000</td>
                          <td>
                            <a href="">
                              <i
                                class="
                                  bi bi-x-circle-fill
                                  text-danger
                                "
                              ></i>
                            </a>
                          </td>
                        </tr> -->
                      </tbody>
                      <tfoot>
                        <tr>
                          <th colspan="4">Bayar</th>
                          <th>
                            <input
                              type="number"
                              id="bayar"
                              class="form-control text-center"
                            />
                          </th>
                        </tr>
                        <tr>
                          <th colspan="4">Kembali</th>
                          <th>
                            <input
                              type="number"
                              id="kembali"
                              class="form-control text-center"
                              readonly
                            />
                          </th>
                        </tr>
                        <tr>
                          <td colspan="4" class="text-right"></td>
                        </tr>
                      </tfoot>
                    </table>
                  </div>
                  <div class="row mb-5">
                    <div class="col-6"></div>
                    <div class="col-6">
                      <button
                        type="button"
                        id="transactions"
                        data-toggle="modal"
                        class="btn btn-success btn-block d-print-none"
                      >
                        Pay
                      </button>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row d-none d-print-block" id="content">
                <div class="col-12">
                  <div class="card">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-12 col-md-8">
                          <div class="row">
                            <div class="col-12 col-md-6">
                              <div class="product-title">
                                Customer Name
                              </div>
                              <div
                                id="customer-name"
                              >
                              </div>
                            </div>
                            <div class="col-12 col-md-6">
                              <div class="product-title">
                                Date of Transaction
                              </div>
                              <div
                                class="product-subtitle"
                                id="tanggal"
                              >
                                <?=date('d F, Y');?>
                              </div>
                            </div>
                            <div class="col-12 col-md-6">
                              <div class="product-title">
                                Time of Transaction
                              </div>
                              <div
                                class="product-subtitle"
                                id="jam"
                              >
                                <?=date('H : i : s');?>
                              </div>
                            </div>
                            <div class="col-12 col-md-6">
                              <div class="product-title">Mobile</div>
                              <div
                                id="no-hp"
                              >

                              </div>
                            </div>
                            <div class="col-12 col-md-6">
                              <div class="product-title">Address</div>
                              <div
                                id="address"
                              >

                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-12 mt-4">
                          <h5>Informations</h5>
                          <div class="row">
                            <div class="col-12 col-md-4">
                              <div class="product-title">Barang</div>
                              <div id="belanja">

                              </div>
                            </div>
                            <div class="col-12 col-md-4">
                              <div class="product-title">Jumlah</div>
                              <div id="jumlah_belanja">

                              </div>
                            </div>
                            <div class="col-12 col-md-4">
                              <div class="product-title">Harga</div>
                              <div id="harga_print">

                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-12 col-md-6 mt-3">
                              <div class="product-title">Total</div>
                              <div class="product-subtitle" id="total_print">

                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-12 col-md-6 mt-3">
                              <div class="product-title">Bayar</div>
                              <div class="product-subtitle" id="jumlah_bayar">

                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-12 col-md-6 mt-3">
                              <div class="product-title">Kembalian</div>
                              <div class="product-subtitle" id="kembalian_uang">

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
  </div>
</div>
</div>
