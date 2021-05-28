<style type="text/css">
  .set_margin { margin-left: 10px; }
  .set_float { float: right; }
  .error { color: red; }
</style>
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
                <h3 class="card-title">Add Event</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">

                <form method="POST" name="event_add" id="event_add">
                  <div class="">
                    <label>Event Title:</label>
                    <input type="text" name="event_title" class="form-control" />
                  </div>
                  <div class="">
                    <label>Start Date:</label>
                    <input type="text" name="start_date" class="form-control" id="start_date" />
                  </div>
                  <div class="">
                    <label>End Date:</label>
                    <input type="text" name="end_date" class="form-control" id="end_date" />
                  </div>
                  <div class="">
                    <label>Recurrence:</label>
                    <div class="col-md-6">
                      <div class="col-md-6">
                        <label>Repeat</label>
                      </div>
                      <div class="col-md-6">
                        <input type="radio" name="recurrence" value="1" class="" />
                        <select id="lstRepeatType" class="textbox-medium"
                          name="lstRepeatType" style="font-size: x-small; width: 100px; font-family: Verdana"
                          tabindex="10">
                          <option selected="selected" value="1">Every</option>
                          <option value="2">Every Two</option>
                          <option value="3">Every Third</option>
                          <option value="4">Every Fourth</option>
                        </select>
                        <select id="lstEvery" class="textbox-medium" name="lstEvery" style="font-size: x-small;
                          width: 66px; font-family: Verdana" tabindex="10">
                          <option selected="selected" value="1">Day</option>
                          <option value="2">Week</option>
                          <option value="3">Month</option>
                          <option value="4">Year</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="col-md-6">
                        <label>Repeat on the</label>
                      </div>
                      <div class="col-md-6">
                          <input type="radio" name="recurrence" value="2" class="" />
                        <select id="lstRepeatOn" class="textbox-middle" name="lstRepeatOn" style="font-size: x-small;
                            width: 68px; font-family: Verdana" tabindex="12">
                            <option selected="selected" value="1">First</option>
                            <option value="2">Second</option>
                            <option value="3">Third</option>
                            <option value="4">Fourth</option>
                        </select>
                    <select id="lstRepeatWeek" class="textbox-middle" name="lstRepeatWeek"
                        style="font-size: x-small; width: 56px; font-family: Verdana" tabindex="13">
                        <option selected="selected" value="0">Sun</option>
                        <option value="1">Mon</option>
                        <option value="2">Tue</option>
                        <option value="3">Wed</option>
                        <option value="4">Thu</option>
                        <option value="5">Fri</option>
                        <option value="6">Sat</option>
                    </select>
                                        of the
                                        <select id="lstRepeatMonth" class="textbox-middle" language="javascript" name="lstRepeatMonth"
                                            style="font-size: x-small; width: 80px;
                                            font-family: Verdana" tabindex="14">
                                            <option selected="selected" value="1">Month</option>
                                            <option value="3">3 Months</option>
                                            <option value="4">4 Months</option>
                                            <option value="6">6 Months</option>
                                            <option value="12">Year</option>
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

$('form[id="event_add"]').validate({
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