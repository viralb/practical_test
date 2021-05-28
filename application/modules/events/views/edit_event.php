<style type="text/css">
  .set_margin { margin-left: 10px; }
  .set_float { float: right; }
  .error { color: red; }
</style>

<?php


if((isset($get_record)) && (!empty($get_record)))
{
  $event_title = $start_date = $end_date = $recurrence = $fld_recurrence_type_name = $lstRepeatType = $lstEvery = $lstRepeatOn = $lstRepeatWeek = $lstRepeatMonth = "";

  $event_title = $get_record["fld_events_title"];
  $start_date = $get_record["fld_start_date"];
  $end_date = $get_record["fld_end_date"];
  $recurrence = $get_record["fld_recurrence"];
  $fld_recurrence_type_name = $get_record["fld_recurrence_type_name"];

  if($fld_recurrence_type_name != "")
  {
    $make_arr = explode('-', $fld_recurrence_type_name);

    if($recurrence == 1)
    {
      $lstRepeatType = $make_arr[0];
      $lstEvery = $make_arr[1];
    }
    else
    {
      $lstRepeatOn = $make_arr[0];
      $lstRepeatWeek = $make_arr[1];
      $lstRepeatMonth = $make_arr[2];

    }

  }

}



?>


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">

            <a href="<?php echo base_url().'event_list'; ?>" class=" btn btn-primary set_float">Event List</a>

        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Edit Event</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">

                <form method="POST" name="event_update" id="event_update">
                  <div class="">
                    <label>Event Title:</label>
                    <input type="text" name="event_title" class="form-control" value="<?php echo $event_title; ?>" />
                  </div>
                  <div class="">
                    <label>Start Date:</label>
                    <input type="text" name="start_date" class="form-control" id="start_date" value="<?php echo $start_date; ?>" />
                  </div>
                  <div class="">
                    <label>End Date:</label>
                    <input type="text" name="end_date" class="form-control" id="end_date" value="<?php echo $end_date; ?>" />
                  </div>
                  <div class="">
                    <label>Recurrence:</label>
                    <div class="col-md-6">
                      <div class="col-md-6">
                        <label>Repeat</label>
                      </div>
                      <div class="col-md-6">
                        <input type="radio" name="recurrence" value="1" class="" <?php if($recurrence == 1){ echo "checked='checked'"; } ?> />
                        <select id="lstRepeatType" class="textbox-medium"
                          name="lstRepeatType" style="font-size: x-small; width: 100px; font-family: Verdana"
                          tabindex="10">
                          <option value="1" <?php if($lstRepeatType == 1){ echo "selected='selected'"; } ?>>Every</option>
                          <option value="2" <?php if($lstRepeatType == 2){ echo "selected='selected'"; } ?>>Every Two</option>
                          <option value="3" <?php if($lstRepeatType == 3){ echo "selected='selected'"; } ?>>Every Third</option>
                          <option value="4" <?php if($lstRepeatType == 4){ echo "selected='selected'"; } ?>>Every Fourth</option>
                        </select>
                        <select id="lstEvery" class="textbox-medium" name="lstEvery" style="font-size: x-small;
                          width: 66px; font-family: Verdana" tabindex="10">
                          <option value="1" <?php if($lstEvery == 1){ echo "selected='selected'"; } ?>>Day</option>
                          <option value="2" <?php if($lstEvery == 2){ echo "selected='selected'"; } ?>>Week</option>
                          <option value="3" <?php if($lstEvery == 3){ echo "selected='selected'"; } ?>>Month</option>
                          <option value="4" <?php if($lstEvery == 4){ echo "selected='selected'"; } ?>>Year</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="col-md-6">
                        <label>Repeat on the</label>
                      </div>
                      <div class="col-md-6">
                          <input type="radio" name="recurrence" value="2" class="" <?php if($recurrence == 2){ echo "checked='checked'"; } ?> />
                        <select id="lstRepeatOn" class="textbox-middle" name="lstRepeatOn" style="font-size: x-small;
                            width: 68px; font-family: Verdana" tabindex="12">
                            <option value="1" <?php if($lstRepeatOn == 1){ echo "selected='selected'"; } ?>>First</option>
                            <option value="2" <?php if($lstRepeatOn == 2){ echo "selected='selected'"; } ?>>Second</option>
                            <option value="3" <?php if($lstRepeatOn == 3){ echo "selected='selected'"; } ?>>Third</option>
                            <option value="4" <?php if($lstRepeatOn == 4){ echo "selected='selected'"; } ?>>Fourth</option>
                        </select>
                    <select id="lstRepeatWeek" class="textbox-middle" name="lstRepeatWeek"
                        style="font-size: x-small; width: 56px; font-family: Verdana" tabindex="13">
                        <option value="0" <?php if($lstRepeatWeek == 0){ echo "selected='selected'"; } ?>>Sun</option>
                        <option value="1" <?php if($lstRepeatWeek == 1){ echo "selected='selected'"; } ?>>Mon</option>
                        <option value="2" <?php if($lstRepeatWeek == 2){ echo "selected='selected'"; } ?>>Tue</option>
                        <option value="3" <?php if($lstRepeatWeek == 3){ echo "selected='selected'"; } ?>>Wed</option>
                        <option value="4" <?php if($lstRepeatWeek == 4){ echo "selected='selected'"; } ?>>Thu</option>
                        <option value="5" <?php if($lstRepeatWeek == 5){ echo "selected='selected'"; } ?>>Fri</option>
                        <option value="6" <?php if($lstRepeatWeek == 6){ echo "selected='selected'"; } ?>>Sat</option>
                    </select>
                                        of the
                                        <select id="lstRepeatMonth" class="textbox-middle" language="javascript" name="lstRepeatMonth"
                                            style="font-size: x-small; width: 80px;
                                            font-family: Verdana" tabindex="14">
                                            <option value="1" <?php if($lstRepeatMonth == 1){ echo "selected='selected'"; } ?>>Month</option>
                                            <option value="3" <?php if($lstRepeatMonth == 3){ echo "selected='selected'"; } ?>>3 Months</option>
                                            <option value="4" <?php if($lstRepeatMonth == 4){ echo "selected='selected'"; } ?>>4 Months</option>
                                            <option value="6" <?php if($lstRepeatMonth == 6){ echo "selected='selected'"; } ?>>6 Months</option>
                                            <option value="12" <?php if($lstRepeatMonth == 12){ echo "selected='selected'"; } ?>>Year</option>
                                        </select>
                      </div>

                    </div>
                    <!-- <input type="radio" name="recurrence" class="form-control" /> -->
                  </div>

                  <div class="" style="margin-top: 30px;float: right;">
                    <a href="<?php echo base_url().'event_list'; ?>" class="btn btn-info">Cancel</a>
                    <button class="btn btn-success" type="submit" name="save_event">Save</button>
                  </div>
                </form>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

<script src="<?php echo base_url(); ?>include/plugins/jquery/jquery.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.12.0/moment.js"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>

<!-- <link href="//cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/build/css/bootstrap-datetimepicker.css" rel="stylesheet">

<script src="//cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/src/js/bootstrap-datetimepicker.js"></script> -->

<script>

$('form[id="event_update"]').validate({
  rules: {
    event_title: 'required',
    start_date: 'required',
    end_date: 'required',
    recurrence: 'required',
  },
  submitHandler: function(form) {
    form.submit();
  }
});

 $('#start_date').datetimepicker({
         format:'YYYY-MM-DD',
    });

  $('#end_date').datetimepicker({
         format:'YYYY-MM-DD',
    });

</script>