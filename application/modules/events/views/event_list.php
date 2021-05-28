<style type="text/css">
  .set_margin { margin-left: 10px; }
  .set_float { float: right; }
</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">

            <a href="<?php echo base_url().'add_event'; ?>" class=" btn btn-primary set_float">Add Event</a>

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
                <h3 class="card-title">Event(s) List</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Title</th>
                    <th>Dates</th>
                    <th>Occurrence</th>
                    <th>Actions</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                    //echo "<pre>";print_r($events_info);exit;
                    if((isset($events_info)) && (!empty($events_info)))
                    {
                      foreach($events_info as $key => $val)
                      {
                        ?>
                        <tr>
                          <td><?php echo $val["fld_events_title"]; ?></td>
                          <td><?php echo $val["fld_start_date"]." to ".$val["fld_end_date"]; ?></td>
                          <td><?php

                          $make_repeat = "";
                          $make_arr = array();
                          if($val["fld_recurrence"] == 1)
                          {
                            $make_arr = explode('-', $val["fld_recurrence_type_name"]);

                            $RepeatType = $Every = "";
                            if($make_arr[0] == 1)
                              $RepeatType = "Every";
                            if($make_arr[0] == 2)
                              $RepeatType = "Every Two";
                            if($make_arr[0] == 3)
                              $RepeatType = "Every Third";
                            if($make_arr[0] == 4)
                              $RepeatType = "Every Fourth";

                            if($make_arr[1] == 1)
                              $Every = "Day";
                            if($make_arr[1] == 2)
                              $Every = "Week";
                            if($make_arr[1] == 3)
                              $Every = "Month";
                            if($make_arr[1] == 4)
                              $Every = "Year";

                            $make_repeat = $RepeatType." ".$Every;

                          }

                          if($val["fld_recurrence"] == 2)
                          {
                            $make_arr = explode('-', $val["fld_recurrence_type_name"]);

                            $RepeatOn = $RepeatWeek = $RepeatMonth = "";
                            if($make_arr[0] == 1)
                              $RepeatOn = "First";
                            if($make_arr[0] == 2)
                              $RepeatOn = "Second";
                            if($make_arr[0] == 3)
                              $RepeatOn = "Third";
                            if($make_arr[0] == 4)
                              $RepeatOn = "Fourth";

                            if($make_arr[1] == 0)
                              $RepeatWeek = "Sun";
                            if($make_arr[1] == 1)
                              $RepeatWeek = "Mon";
                            if($make_arr[1] == 2)
                              $RepeatWeek = "Tue";
                            if($make_arr[1] == 3)
                              $RepeatWeek = "Wed";
                            if($make_arr[1] == 4)
                              $RepeatWeek = "Thu";
                            if($make_arr[1] == 5)
                              $RepeatWeek = "Fri";
                            if($make_arr[1] == 6)
                              $RepeatWeek = "Sat";

                            if($make_arr[2] == 1)
                              $RepeatMonth = "Month";
                            if($make_arr[2] == 3)
                              $RepeatMonth = "3 Months";
                            if($make_arr[2] == 4)
                              $RepeatMonth = "4 Months";
                            if($make_arr[2] == 6)
                              $RepeatMonth = "6 Months";
                            if($make_arr[2] == 12)
                              $RepeatMonth = "Year";

                            $make_repeat = $RepeatOn." ".$RepeatWeek." of ".$RepeatMonth;

                          }


                           echo $make_repeat; ?></td>
                          <td><a href="<?php echo base_url().'view_event/'.$val["fld_events_id"]; ?>" class="btn btn-primary">View</a><a href="<?php echo base_url().'edit_event/'.$val["fld_events_id"]; ?>" class="btn btn-primary set_margin">Edit</a><button type="button" class="btn btn-primary delete_event set_margin" id="<?php echo $val['fld_events_id']; ?>" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Delete</button></td>
                        </tr>
                        <?php
                      }
                    }
                    ?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Title</th>
                    <th>Dates</th>
                    <th>Occurrence</th>
                    <th>Actions</th>
                  </tr>
                  </tfoot>
                </table>
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

  <!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Understood</button>
      </div>
    </div>
  </div>
</div>

<script>

jQuery(document).on("click",".delete_event",function(e)
{
  var event_id = jQuery(this).attr("id");

  if (confirm('Are you sure you want to delete this?')) {
        $.ajax({
            url: '<?php echo base_url(); ?>events/delete_event/',
            type: "POST",
            data: {"event_id":event_id},
            success: function (data)
            {
              var obj_data = JSON.parse(data);

              if(obj_data.success)
              {
                location.reload();
              }
              else
              {
                location.reload();
              }
              console.log(obj_data.error);
            }
        });
    }

});

// jQuery(document).on("click",".delete_event",function(e)
// {
//  e.preventDefault();

//   bootbox.confirm({
//       message: "This is a confirm with custom button text and color! Do you like it?",
//       buttons: {
//           confirm: {
//               label: 'Yes',
//               className: 'btn-success'
//           },
//           cancel: {
//               label: 'No',
//               className: 'btn-danger'
//           }
//       }
//   });
// });

</script>