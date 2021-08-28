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
										<td><?=$dt['nama_barang'];?></td>
										<td><?=$dt['nama'];?></td>
										<td><?=$dt['jumlah'];?></td>
										<td><?=$dt['total'];?></td>
										<td><?=$this->crud->convert_date('d F Y', $dt['tanggal']);?></td>
										<td><?=$this->crud->convert_date('H : i A', $dt['tanggal']);?></td>
									</tr>
									<?php endforeach;?>
								</tbody>
							</table>
							<button type="button" onclick="printContent('print');" class="btn btn-success btn-block mt-5">Print</button>
						</div>
					</div>
				</div>
			</div>
			<!-- d-none d-print-block -->
			<div class="row mt-4 d-none d-print-block" id="print">
				<div class="col-12">
					<div
						class="card card-dashboard-product d-block"
						href="/dashboard-products-details.html"
					>
						<div class="card-body">
							
							<div class="row">
								<div class="col-12 text-center">
									<h2>Laporan Pembelian <?= isset($bulan) ? 'Bulan '.date('F', strtotime($bulan)): ''; ?> </h2>
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
								id="tabel"
							>
								<thead>
									<tr>
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
									<tr>
										<td><?=$dt['nama_barang'];?></td>
										<td><?=$dt['nama'];?></td>
										<td><?=$dt['jumlah'];?></td>
										<td><?=$dt['total'];?></td>
										<td><?=$this->crud->convert_date('d F Y', $dt['tanggal']);?></td>
										<td><?=$this->crud->convert_date('H : i A', $dt['tanggal']);?></td>
									</tr>
									<?php endforeach;?>
								</tbody>
							</table>
							<div class="row justify-content-between">
								<div class="col-12">
									<div class="row mb-3 mt-5 text-left justify-content-start" >
										<div class="col-6" style="margin-left: 3rem;" >
											Dibuat Oleh ,
										</div>
									</div>
									<div class="row justify-content-start">
										<img src="<?= base_url(); ?>/assets/images/ttd.png" alt="ttd.png" class="w-25">
									</div>
									<div class="row mb-3 mt-5 text-left justify-content-start" >
										<div class="col-6" >
											<p class="text-center" style="margin-left: -18rem;">
											<?= $nama_admin; ?>
											<br>
											Admin
											</p>
										</div>
									</div>
									<div class="row mb-3 text-left justify-content-end" style="margin-top: -18.2rem; margin-left: 25rem;" >
										<div class="col-6" >
											Diterima Oleh , 
										</div>
									</div>
									<div class="row justify-content-end" style="margin-right: 6rem;">
										<img src="<?= base_url(); ?>/assets/images/ttd.png" alt="ttd.png" class="w-25">
									</div>
									<div class="row mb-3 mt-5 text-right justify-content-end" >
										<div class="col-6" >
											<div class=" pl-5">
												<p class="text-center">
											Novriyanto
											<br>
											Pemilik
											</p>
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



