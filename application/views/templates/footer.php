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
        // mounted() {
        //   const $selectpicker = $(this.$el).find('.selectpicker');

        //   $selectpicker
        //     .selectpicker()
        //     .on('changed.bs.select', () => this.$emit('changeWeek', this.options[$selectpicker.val()]));
        // },
         updated() {
          $(this.$el).find('.selectpicker').selectpicker('refresh');
        },
        // destroyed() {
        //   $(this.$el).find('.selectpicker')
        //     .off()
        //     .selectpicker('destroy');
        // },
        el: "#barang",
        data: {
          // name: "Angga Hazza Sett",
          // email: "kamujagoan@bwa.id",
          // password: "",
          is_new_product: false,
          // store_name: "",
          // isActive:true,
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
      // if($("#show").is(':checked')){
      //   console.log('aa');
      //   // $("#pass").attr('type','text');  // checked
      // }
      // else {
      //   $("#pass").attr('type','password');  // unchecked
      // }
      $('#show').click(function(){
        if($('#show').is(':checked')){
          $("#pass").attr('type','text');
        } else {
          $("#pass").attr('type','password');
        }
      })
    </script>

  </body>
</html>
