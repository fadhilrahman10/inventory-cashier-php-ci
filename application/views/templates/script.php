<script>
  function add_data() {
    var id_barang = $("#barang").val();
    var id_customer = $("#customer").val();
    // console.log(id_barang);
    $.ajax({
        type: "POST",
        data: "id_barang=" + id_barang + "&&id_customer=" + id_customer,
        url: "<?=base_url('cashier');?>/add",
        dataType: "json",
        success: function (data) {
            get_data();
        },
    });
  }

  function get_data() {
    $.ajax({
      type: "POST",
      url: "http://localhost/berkah/cashier/get_data",
      dataType: "json",
      success: function (data) {
        template(data);
      },
    });
  }

  function plus(no_penjualan) {
    $.ajax({
      type: "POST",
      data: "no_penjualan=" + no_penjualan,
      url: "http://localhost/berkah/cashier/plus",
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
      url: "http://localhost/berkah/cashier/minus",
      dataType: "json",
      success: function () {
        get_data();
      },
    });
  }

  function hapus(no_penjualan) {
    $.ajax({
      type: "POST",
      data: "no_penjualan=" + no_penjualan,
      url: "http://localhost/berkah/cashier/hapus",
      dataType: "json",
      success: function () {
        get_data();
      },
    });
  }

  function payment() {
    $.ajax({
      type: "POST",
      url: "",
      dataType: "json",
      success: function () {
        get_data();
      },
    });
  }

</script>