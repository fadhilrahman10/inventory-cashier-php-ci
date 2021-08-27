        </div>
    </div>
    <!-- Bootstrap core JavaScript -->
    <script src="<?=base_url();?>assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?=base_url();?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <?php if (isset($prev_script)): ?>
    <?php foreach ($prev_script as $dt): ?>
    <script src="<?=$dt;?>"></script>
    <?php endforeach;?>
    <?php endif?>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
      AOS.init();
    </script>
    <script src="<?=base_url();?>assets/vendor/vue/vue.js"></script>
    <script src="https://unpkg.com/vue-toasted"></script>
    <script>
      Vue.use(Toasted);
      var barang = new Vue({
         updated() {
          $(this.$el).find('.selectpicker').selectpicker('refresh');
        },
        el: "#barang",
        data: {
          is_new_product: false,
        },
      });
    </script>
    <?php if (isset($addon_script)): ?>
    <?php foreach ($addon_script as $dt): ?>
    <script src="<?=$dt;?>"></script>
    <?php endforeach;?>
    <?php endif?>
    <?php if (isset($addon_script_local)): ?>
    <?php foreach ($addon_script_local as $dt): ?>
    <script src="<?=base_url();?><?=$dt;?>"></script>
    <?php endforeach;?>
    <?php endif?>
    <!-- Menu Toggle Script -->
    <script>
      $("#menu-toggle").click(function (e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
      });

			$("#jumlah").keyup(function(){
				const harga_beli = $("#harga_beli").val();
				const jumlah = $("#jumlah").val();
				const harga = $('#harga').val();

				var result = 0;

				if(harga != null){
					result = parseInt(harga) * parseInt(jumlah);
				}else if(harga_beli != null) {
					result = parseInt(harga_beli) * parseInt(jumlah);
				}

				if(isNaN(result)){
					$("#total").val('0');
				} else {
					$("#total").val(result);
				}


			});

			$("#idBarang").change(function(){
				var id_barang = $('#idBarang').val();
				$.ajax({
					type:'POST',
					url:'<?= base_url('pembelian'); ?>/get_harga',
					dataType:'json',
					data:'id_barang='+id_barang,
					success:function(data){
						$('#harga').val(data);
					}
				});
			});

    </script>
    <script>
      $('#show').click(function(){
        if($('#show').is(':checked')){
          $("#pass").attr('type','text');
        } else {
          $("#pass").attr('type','password');
        }
      })
    </script>
    <script>
      $(document).ready(function(){
          $.ajax({
            type:'POST',
            url:'<?=base_url('dashboard');?>/get_timer',
            dataType:'json',
            success:function(data){
              show(data);
              // $('#waktu').html(timer);
            }
         });
      });
    </script>
    <script>
      function show(data){
        var baris = '';
        for (let i = 0; i < data.length; i++) {


          console.log(waktu(data[i].tanggal));
          var timer = setInterval(function(){
            var time = waktu(data[i].tanggal);
            $('#'+(i+1)).html(time);
          }, 1000);

          console.log(waktu(data[i].tanggal));
          baris += '<a class="card card-list d-block" href="<?=base_url('cashier');?>/detail/'+data[i].no_penjualan+'">' +
                      '<div class="card-body">' +
                          '<div class="row">' +
                              '<div class="col-md-1"></div>' +
                              '<div class="col-md-4">'+data[i].nama_barang+'</div>' +
                              '<div class="col-md-3"></div>' +
                              '<div class="col-md-3" id="'+(i+1)+'">'+''+
                              '</div>' +
                              '<div class="col-md-1 d-none d-md-block">' +
                                  '<img src="<?=base_url();?>assets/images/dashboard-arrow-right.svg" alt="" />'+
                              '</div>' +
                          '</div>' +
                      '</div>' +
                  '</a>';
        }
        $('#show').html(baris);
      }
    </script>

    <script>
      function waktu(data){
        var time = new Date(data).getTime();
        var timer;

        var now = new Date().getTime();
        var selisih = now - time;

        var hari = Math.floor(selisih / (1000 * 60 * 60 * 24));
        var jam = Math.floor(selisih % (1000 * 60 * 60 * 24) / (1000 * 60 * 60));
        var menit = Math.floor(selisih % (1000 * 60 * 60) / (1000 * 60));
        var detik = Math.floor(selisih % (1000 * 60) / (1000));

        if(hari > 1){
          timer = hari + " days ago";
        } else if(jam > 1){
          timer = jam + " hours ago";
        } else if(menit > 1){
          timer = jam + " minutes ago";
        } else if(menit < 1) {
          timer = "a moment ago";
        }

        return timer;
      }
    </script>

  </body>
</html>
