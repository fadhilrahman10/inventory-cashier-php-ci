<div
    class="section-content section-dashboard-home"
    data-aos="fade-up"
>
    <div class="container-fluid">
        <div class="dashboard-heading">
            <h2 class="dashboard-title">Dashboard</h2>
            <p class="dashboard-subtitle">Look what you have made today!</p>
        </div>
        <div class="dashboard-content">
            <div class="row">
                <div class="col-md-4">
                    <div class="card mb-2">
                        <div class="card-body">
                            <div class="dashboard-card-title">Customer</div>
                            <div class="dashboard-card-subtitle"><?=$customer;?></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-2">
                        <div class="card-body">
                            <div class="dashboard-card-title">Revenue</div>
                            <div class="dashboard-card-subtitle">Rp <?=$this->crud->rupiah($revenue);?></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-2">
                        <div class="card-body">
                            <div class="dashboard-card-title">Transaction</div>
                            <div class="dashboard-card-subtitle"><?=$transactions;?></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-12 mt-2">
                    <h5 class="mb-3">Recent Transactions</h5>
                    <?php foreach ($recent as $dt): ?>
                    <a
                        class="card card-list d-block"
                        href="<?=base_url('cashier');?>/detail/<?=$dt['no_penjualan'];?>"
                    >
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-1">
                                    <!-- <img
                                        src="/images/dashboard-icon-product-1.png"
                                        alt=""
                                    /> -->
                                </div>
                                <div class="col-md-4"><?=$dt['nama_barang'];?></div>
                                <div class="col-md-3"><?=$dt['nama_customer'];?></div>
                                <div class="col-md-3" id="waktu">a moment ago</div>
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
