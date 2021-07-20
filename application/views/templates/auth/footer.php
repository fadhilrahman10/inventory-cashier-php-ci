    <footer>
			<div class="container">
				<div class="row">
					<div class="col-12 text-center">
						<p class="pt-4 pb-2">2019 Copyright Store. All Rights Reserved.</p>
					</div>
				</div>
			</div>
		</footer>

		<!-- Bootstrap core JavaScript -->
		<script src="<?=base_url();?>assets/vendor/jquery/jquery.slim.min.js"></script>
		<script src="<?=base_url();?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
		<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
		<script>
			AOS.init();
		</script>
		<script src="<?=base_url();?>assets/vendor/vue/vue.js"></script>
		<script src="https://unpkg.com/vue-toasted"></script>
		<script>
      <?php if ($this->session->flashdata('gagal')): ?>
      Vue.use(Toasted);
			var register = new Vue({
        el: "#register",
				mounted() {
					AOS.init();
					this.$toasted.error(
						"Maaf, tampaknya username sudah terdaftar pada sistem kami.",
						{
							position: "top-center",
							className: "rounded",
							duration: 1000,
						}
					);
				},
      });
      <?php endif;?>
      <?php if (form_error('cpass')): ?>
      Vue.use(Toasted);
			var register = new Vue({
        el: "#register",
				mounted() {
					AOS.init();
					this.$toasted.error(
						"Maaf, tampaknya confirm password tidak cocok.",
						{
							position: "top-center",
							className: "rounded",
							duration: 1000,
						}
					);
				},
      });
      <?php endif;?>
		</script>
		<script>
			$('#show').click(function(){
				if($('#show').is(':checked')){
					$("#pass").attr('type','text');
					$("#cpass").attr('type','text');
				} else {
					$("#pass").attr('type','password');
					$("#cpass").attr('type','password');
				}
			})
		</script>
		<script src="<?=base_url();?>assets/script/navbar-scroll.js"></script>
	</body>
</html>
