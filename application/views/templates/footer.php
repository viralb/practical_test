<footer class="main-footer">
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.1.0
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?php echo base_url(); ?>include/plugins/jquery/jquery.min.js"></script>

<!-- <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->

<script src="<?php echo base_url(); ?>include/dist/js/notify.min.js"></script>

<?php if((isset($datatables)) && ($datatables == "set_datatable")){ ?>
<!-- jQuery UI 1.11.4 -->

<!-- DataTables  & Plugins -->
<script src="<?php echo base_url(); ?>include/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>include/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url(); ?>include/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url(); ?>include/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?php echo base_url(); ?>include/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url(); ?>include/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>include/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url(); ?>include/dist/js/demo.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

    <script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

  });
</script>

<?php } ?>
<script src="<?php echo base_url(); ?>include/dist/js/bootbox.min.js"></script>
<?php if((isset($datepicker)) && ($datepicker == "set_datepicker")){ ?>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.12.0/moment.js"></script>
<script src="<?php echo base_url(); ?>include/plugins/daterangepicker/daterangepicker.js"></script> -->

  <script type="text/javascript">
    //  $('#start_date').datetimepicker({
    //     format: 'L'
    // });
  </script>

<?php } ?>
<script type="text/javascript">
<?php if($this->session->flashdata('error')) { ?>
  $.notify("<?php echo $this->session->flashdata('error');?>");
<?php
   unset($_SESSION['error']);
} if($this->session->flashdata('success')) { ?>
  $.notify("<?php echo $this->session->flashdata('success');?>","success");
<?php
   unset($_SESSION['success']);
} ?>
</script>

</body>
</html>
