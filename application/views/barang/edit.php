<div
    class="section-content section-dashboard-home"
    data-aos="fade-up"
>
    <div class="container-fluid">
        <div class="dashboard-heading">
            <h2 class="dashboard-title">Edit Barang</h2>
            <p class="dashboard-subtitle">Update your own product</p>
        </div>
        <div class="dashboard-content">
            <div class="row">
                <div class="col-12">
                    <form action="" method="POST">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="id">ID Barang</label>
                                            <input
                                                type="text"
                                                class="form-control <?php if (validation_errors() != ''): ?>
                                                <?=form_error('id_barang') ? 'is-invalid' : 'is-valid';?>
                                                <?php endif;?>"
                                                id="id"
                                                aria-describedby="name"
                                                name="id_barang"
                                                value="<?=set_value('id_barang', $barang['id_barang']);?>"
                                                readonly
                                            />
                                            <?php if (validation_errors()): ?>
                                            <div class="invalid-feedback">
                                                <?=form_error('id_barang');?>
                                            </div>
                                            <?php endif?>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="nama">Nama Barang</label>
                                            <input
                                                type="text"
                                                class="form-control <?php if (validation_errors() != ''): ?>
                                                <?=form_error('nama_barang') ? 'is-invalid' : 'is-valid';?>
                                                <?php endif;?>"
                                                id="nama"
                                                aria-describedby="nama"
                                                name="nama_barang"
                                                value="<?=set_value('nama_barang', $barang['nama_barang']);?>"
                                            />
                                            <?php if (validation_errors()): ?>
                                            <div id="validationServer03Feedback" class="invalid-feedback">
                                                <?=form_error('nama_barang');?>
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
                                                value="<?=set_value('jumlah', $barang['jumlah']);?>"
                                                readonly
                                            />
                                            <?php if (validation_errors()): ?>
                                            <div id="validationServer03Feedback" class="invalid-feedback">
                                                <?=form_error('jumlah');?>
                                            </div>
                                            <?php endif?>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="unit">Unit</label>
                                            <input
                                                type="text"
                                                class="form-control <?php if (validation_errors() != ''): ?>
                                                <?=form_error('unit') ? 'is-invalid' : 'is-valid';?>
                                                <?php endif;?>"
                                                id="unit"
                                                aria-describedby="unit"
                                                name="unit"
                                                value="<?=set_value('unit', $barang['unit']);?>"
                                            />
                                            <?php if (validation_errors()): ?>
                                            <div class="invalid-feedback">
                                                <?=form_error('unit');?>
                                            </div>
                                            <?php endif?>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="harga_beli">Harga Beli</label>
                                            <input
                                                type="number"
                                                class="form-control <?php if (validation_errors() != ''): ?>
                                                <?=form_error('harga_beli') ? 'is-invalid' : 'is-valid';?>
                                                <?php endif;?>"
                                                id="harga_beli"
                                                aria-describedby="harga_beli"
                                                name="harga_beli"
                                                value="<?=set_value('harga_beli', $barang['harga_beli']);?>"
                                            />
                                            <?php if (validation_errors() != ''): ?>
                                                <div class="invalid-feedback">
                                                    <?=form_error('harga_beli');?>
                                                </div>
                                            <?php endif;?>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="harga_jual">Harga Jual</label>
                                            <input
                                                type="number"
                                                class="form-control <?php if (validation_errors() != ''): ?>
                                                <?=form_error('harga_jual') ? 'is-invalid' : 'is-valid';?>
                                                <?php endif;?>"
                                                id="harga_jual"
                                                aria-describedby="harga_jual"
                                                name="harga_jual"
                                                value="<?=set_value('harga_jual', $barang['harga_jual']);?>"
                                            />
                                            <?php if (validation_errors()): ?>
                                            <div class="invalid-feedback">
                                                <?=form_error('harga_jual');?>
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
                                    name="submit"
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
