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
              var now = new Date().getTime();
              var time = new Date(data).getTime();
              var selisih = now - time;
              var timer;

              var hari = Math.floor(selisih / (1000 * 60 * 60 * 24));
              var jam = Math.floor(selisih % (1000 * 60 * 60 * 24) / (1000 * 60 * 60));
              var menit = Math.floor(selisih % (1000 * 60 * 60) / (1000 * 60));
              if(hari > 1 ){
                timer = hari + " days ago";
                setInterval(function(){
                  $('#waktu').html(timer);
                }, (1000 * 60 * 60 * 24))
              } else if (jam > 1){
                timer = jam + " hours ago";
                setInterval(function(){
                  $('#waktu').html(timer);
                }, (1000 * 60 * 60))
              } else if (menit > 1){
                timer = menit + " minutes ago";
                setInterval(function(){
                  $('#waktu').html(timer);
                }, (1000 * 60))
              } else {
                timer = 'a moment ago';
                $('#waktu').html(timer);
              }

              $('#waktu').html(timer);
            }
         });
      });
    </script>

  </body>
</html>
