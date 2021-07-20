<div class="page-dashboard">
    <div class="d-flex" id="wrapper" data-aos="fade-right">
        <!-- Sidebar -->
        <div class="border-right" id="sidebar-wrapper">
            <div class="sidebar-heading text-center">
                <img src="<?=base_url();?>assets/images/dashboard-store-logo.svg" alt="" class="my-4" />
            </div>
            <div class="list-group list-group-flush">
                <?php $user = $this->session->userdata('user');?>
                <?php if ($user['status'] == 'kasir'): ?>
                <a
                    href="<?=base_url('cashier');?>"
                    class="list-group-item list-group-item-action <?=$active == 'cash' ? 'active' : '';?>"
                    >Cashier</a
                >
                <?php endif?>
                <?php if ($user['status'] == 'admin'): ?>
                <a
                    href="<?=base_url('dashboard');?>"
                    class="list-group-item list-group-item-action <?=$active == 'dash' ? 'active' : '';?>"
                    >Dashboard</a
                >
                <a
                    href="<?=base_url('barang');?>"
                    class="list-group-item list-group-item-action <?=$active == 'bar' ? 'active' : '';?>"
                    >Barang</a
                >
                <a
                    href="<?=base_url('supplier');?>"
                    class="list-group-item list-group-item-action <?=$active == 'sup' ? 'active' : '';?>"
                    >Supplier</a
                >
                <a
                    href="<?=base_url('transactions');?>"
                    class="list-group-item list-group-item-action <?=$active == 'tra' ? 'active' : '';?>"
                    >Transactions</a
                >
                <a
                    href="<?=base_url('pembelian');?>"
                    class="list-group-item list-group-item-action <?=$active == 'pem' ? 'active' : '';?>"
                    >Pembelian</a
                >
                <a
                    data-toggle="collapse"
                    href="#collapseExample1"
                    role="button"
                    aria-expanded="false"
                    aria-controls="collapseExample"
                    class="list-group-item list-group-item-action <?=$active == 'lap' ? 'active' : '';?>"
                    >Laporan</a
                >
                <div class="collapse" id="collapseExample1">
                    <div class="card card-body">
                        <a href="<?=base_url('pembelian');?>/index/active" class="list-group-item list-group-item-action <?=$sub_active == 'lap_pem' ? 'active' : '';?>"
                            >Pembelian</a
                        >
                        <a href="<?=base_url('cashier');?>/laporan" class="list-group-item list-group-item-action <?=$sub_active == 'lap_pen' ? 'active' : '';?>"
                            >Penjualan</a
                        >
                        <a href="<?=base_url('barang');?>/index/active" class="list-group-item list-group-item-action <?=$sub_active == 'lap_bar' ? 'active' : '';?>"
                            >Barang</a
                        >
                        <a href="<?=base_url('supplier');?>/index/active" class="list-group-item list-group-item-action <?=$sub_active == 'lap_sup' ? 'active' : '';?>"
                            >Supplier</a
                        >
                        <a href="<?=base_url('customer');?>/index/active" class="list-group-item list-group-item-action <?=$sub_active == 'lap_cus' ? 'active' : '';?>"
                            >Customer</a
                        >
                    </div>
                </div>
                <?php endif?>
                <a
                    href="<?=base_url('customer');?>"
                    class="list-group-item list-group-item-action <?=$active == 'cus' ? 'active' : '';?>"
                    >Customer</a>
                <a
                    href="<?=base_url('account');?>"
                    class="list-group-item list-group-item-action <?=$active == 'acc' ? 'active' : '';?>"
                    >My Account</a
                >
            </div>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <nav
                class="navbar navbar-store navbar-expand-lg navbar-light fixed-top"
                data-aos="fade-down"
            >
                <button
                    class="btn btn-secondary d-md-none mr-auto mr-2"
                    id="menu-toggle"
                >
                    &laquo; Menu
                </button>

                <button
                    class="navbar-toggler"
                    type="button"
                    data-toggle="collapse"
                    data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent"
                    aria-expanded="false"
                    aria-label="Toggle navigation"
                >
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto d-none d-lg-flex">
                        <li class="nav-item dropdown">
                            <a
                                class="nav-link"
                                href="#"
                                id="navbarDropdown"
                                role="button"
                                data-toggle="dropdown"
                                aria-haspopup="true"
                                aria-expanded="false"
                            >
                                <img
                                    src="<?=base_url();?>assets/images/icon-user.png"
                                    alt=""
                                    class="rounded-circle mr-2 profile-picture"
                                />
                                Hi, <?=ucfirst($user['username']);?>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="<?=base_url('account');?>"
                                    >Settings</a
                                >
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="<?=base_url('auth');?>/logout">Logout</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <div class="dropleft">
                                <a
                                    class="nav-link d-inline-block mt-2"
                                    data-toggle="collapse"
                                    role="button"
                                    aria-expanded="false"
                                    aria-controls="collapseExample"
                                    href="#collapseExample"
                                    data-toggle="dropdown"
                                    >
                                    <?php $data = $this->crud->show('barang', ['jumlah<' => 5]);?>
                                    <img src="<?=base_url();?>assets/images/icon-cart-empty.svg" alt="" />
                                    <?php if ($data): ?>
                                    <div class="cart-badge"><?=count($data);?></div>
                                    <?php endif?>
                                </a>
                                <div class="collapse dropdown-menu" id="collapseExample">
                                    <div class="card" style="width: 18rem">
                                        <div class="card-header">Barang Habis</div>
                                        <div class="card-body">
                                            <table class="table table-borderless table-hover">
                                                <?php foreach ($data as $dt): ?>
                                                <tr onclick="location.href='<?=base_url('pembelian');?>/add'">
                                                    <td><?=$dt['nama_barang'];?></td>
                                                    <td><?=$dt['jumlah'];?></td>
                                                </tr>
                                                <?php endforeach;?>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <!-- Mobile Menu -->
                    <ul class="navbar-nav d-block d-lg-none mt-3">
                        <li class="nav-item">
                            <a class="nav-link" href="#"> Hi, Angga </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link d-inline-block" href="#"> Logout </a>
                        </li>
                    </ul>
                </div>
            </nav>
