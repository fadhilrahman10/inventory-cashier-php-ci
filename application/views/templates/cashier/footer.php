</div>
		</div>
		<!-- Bootstrap core JavaScript -->
		<script src="<?=base_url();?>assets/vendor/jquery/jquery.min.js"></script>
		<script src="<?=base_url();?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
		<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
		<script>
			AOS.init();
		</script>
		<!-- Menu Toggle Script -->
		<script>
			$("#menu-toggle").click(function (e) {
				e.preventDefault();
				$("#wrapper").toggleClass("toggled");
			});
		</script>
		<script>
			$("#transactions").click(function (e) {
				var bayar = $("#bayar").val();
				var kembali = $("#kembali").val();
				if (bayar == 0 || kembali < 0) {
					Swal.fire({
						type: "error",
						title: "Oops...",
						text: "Please check payment!",
					});
				} else {
					Swal.fire({
						title: "<div class='product-subtitle'>Transactions Success</div>",
						text: "Print your struk",
						type: "success",
						showCancelButton: true,
						confirmButtonColor: "#3085d6",
						cancelButtonColor: "#d33",
						confirmButtonText: "Print!",
					}).then((result) => {
						if (result.value) {
							printContent("content");
							payment();
							location.href = "<?=base_url('cashier');?>";
						} else {
							payment();
						}
					});
				}
			});
		</script>
		<script>
			function printContent(el) {
				var restorepage = document.body.innerHTML;
				var printcontent = document.getElementById(el).innerHTML;
				document.body.innerHTML = printcontent;
				window.print();
				document.body.innerHTML = restorepage;
			}
		</script>

		<script>
			$("#bayar").keyup(function () {
				var bayar = $("#bayar").val();
				var str = $("#total").text().split(" ");
				var result = "";
				var tt = str[1].split(",");
        for (let i = 0; i < tt.length; i++) {
					result = result + tt[i];
				}
				var total = parseInt(bayar) - parseInt(result);
				if (isNaN(total)) {
					$("#kembali").val(0);
					$("#kembalian_uang").html(0);
				} else {
					$("#kembali").val(total);
					$("#kembalian_uang").html(total);
				}

				$("#jumlah_bayar").html(bayar);

			});
		</script>
		<script>
			$(document).ready(function () {
				get_data();
			});
			function template(data) {
				var baris = "";
				var barang = "";
				var jumlah_barang = "";
				var harga = "";
        var nama_customer = "";
        var alamat = "";
        var mobile = "";

				var total = 0;
				for (let i = 0; i < data.length; i++) {
					var subtotal = data[i].jumlah * data[i].harga_jual;
					baris +=
						'<tr class="product-subtitle">' +
						'<th scope="row">' +
						data[i].nama_barang +
						"</th>" +
						"<td>" +
						data[i].nama_customer +
						"</td>" +
						'<td width="50">' +
						'<form action="" class="form-inline justify-content-center">' +
						'<button type="button" onclick="minus('+"'"+data[i].no_penjualan+"'"+')" class="btn">' +
						'<i class="bi bi-dash-square-fill text-muted"></i>' +
						"</button>" +
						'<input type="number" value="'+data[i].jumlah+'" id="'+data[i].no_penjualan+'" class="form-control col-6 text-center"/>' +
						'<button type="button" onclick="plus('+"'"+data[i].no_penjualan+"'"+')" class="btn">' +
						'<i class="bi bi-plus-square-fill text-primary"></i>' +
						"</button>" +
						"</form>" +
						"</td>" +
						"<td>" +
						data[i].harga_jual +
						"</td>" +
						"<td>" +
						subtotal +
						"</td>" +
						"<td>" +
						'<button type="button" class="btn" onclick="hapus('+"'"+data[i].no_penjualan+"'"+')">' +
						'<i class="bi bi-x-circle-fill text-danger"></i>' +
						"</button>" +
						"</td>" +
						"</tr>";

					barang += '<div class="product-subtitle">' + data[i].nama_barang + "</div>";
					jumlah_barang += '<div class="product-subtitle">' + data[i].jumlah + "</div>";
					harga += '<div class="product-subtitle">' + data[i].harga_jual + "</div>";
          if(i != 0){
            if(data[i-1].nama_customer != data[i].nama_customer){
              nama_customer += '<div class="product-subtitle">' + data[i].nama_customer + "</div>";
              alamat += '<div class="product-subtitle">' + data[i].alamat + "</div>";
              mobile += '<div class="product-subtitle">' + data[i].no_hp + "</div>";
            }
          } else {
            nama_customer = '<div class="product-subtitle">' + data[i].nama_customer + "</div>";
            alamat = '<div class="product-subtitle">' + data[i].alamat + "</div>";
            mobile = '<div class="product-subtitle">' + data[i].no_hp + "</div>";
          }

					total += subtotal;
				}

				var kembali = $('#kembali').val();
				var bayar = $('#bayar').val();

				console.log(kembali);

        $("#cart").html(baris);
				$("#total").html(convertToRupiah(total));
				$("#customer-name").html(nama_customer);
				$("#no-hp").html(mobile);
				$("#address").html(alamat);
				$("#belanja").html(barang);
				$("#jumlah_belanja").html(jumlah_barang);
				$("#harga_print").html(harga);
				$("#total_print").html(convertToRupiah(total));
			}

      function add_data() {
        var id_barang = $("#barang").val();
        var id_customer = $("#customer").val();
        $.ajax({
        	type: "POST",
        	data: "id_barang=" + id_barang + "&&id_customer=" + id_customer,
        	url: "<?=base_url('cashier');?>/add",
        	dataType: "json",
        	success: function () {
        		get_data();
        	},
        });
      }

			function get_data() {
        $.ajax({
					type: "POST",
					url: "<?=base_url('cashier');?>/get_data",
					dataType: "json",
					success: function (data) {
						// console.log(data);
            template(data);
					},
				});
			}

			function plus(no_penjualan) {
				$.ajax({
					type: "POST",
					data: "no_penjualan=" + no_penjualan,
					url: "<?=base_url('cashier');?>/plus",
					dataType: "json",
					success: function () {
						get_data();
					},
				});
			}

			function minus(no_penjualan) {
        $.ajax({
					type: "POST",
					data: "no_penjualan=" + no_penjualan,
					url: "<?=base_url('cashier');?>/minus",
					dataType: "json",
					success: function () {
						get_data();
					},
				});
			}

			function hapus(no_penjualan) {
        Swal.fire({
          title: "<div class='product-subtitle'>Hapus Barang?</div>",
          type: "error",
          showCancelButton: true,
          confirmButtonColor: "#3085d6",
          cancelButtonColor: "#d33",
          confirmButtonText: "Oke",
        }).then((result) => {
						if (result.value) {
              $.ajax({
                type: "POST",
                data: "no_penjualan=" + no_penjualan,
                url: "<?=base_url('cashier');?>/hapus",
                dataType: "json",
                success: function () {
                  get_data();
                },
              });
            }
        });
			}

			function payment() {
				$.ajax({
					type: "POST",
					url: "<?=base_url('cashier');?>/pay",
					dataType: "json",
					success: function () {
            $("#bayar").val(0);
            $("#kembali").val(0);
						get_data();
					},
				});
			}

      function convertToRupiah(angka)
      {
        var rupiah = '';
        var angkarev = angka.toString().split('').reverse().join('');
        for(var i = 0; i < angkarev.length; i++) if(i%3 == 0) rupiah += angkarev.substr(i,3)+',';
        return 'Rp '+rupiah.split('',rupiah.length-1).reverse().join('');
      }
		</script>
	</body>
</html>
