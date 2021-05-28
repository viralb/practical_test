<style type="text/css">
  .set_margin { margin-left: 10px; }
  .set_float { float: right; }
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
                <h3 class="card-title">Event View</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Date</th>
                    <th>Day Name</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php

                    function dateRange($first, $last, $step = '+1 day', $format = 'Y-m-d',$second_point = "" )
                    {
                            $dates = array();

                            if($second_point != "")
                            {
                                $month_name = date("M",strtotime($first));
                                $year = date("Y");


                                $dates[] = date("Y-m-d", strtotime($step.$month_name.$year));
                            }
                            else
                            {
                              $current = strtotime($first);
                              $last = strtotime($last);

                              while( $current <= $last ) {
                                  $dates[] = date($format, $current);
                                  $current = strtotime($step, $current);
                                  //echo date("M",strtotime($current))."</br>";exit;

                              }
                            }
                            return $dates;
                    }

                    if((isset($get_record)) && (!empty($get_record)))
                    {
                        $from_date = $get_record["fld_start_date"];
                        $end_date = $get_record["fld_end_date"];

                          if($get_record["fld_recurrence"] == 1)
                          {
                            $make_arr = explode('-', $get_record["fld_recurrence_type_name"]);

                            $RepeatType = $Every = "";

                            if($make_arr[1] == 1)
                              $Every = "Day";
                            if($make_arr[1] == 2)
                              $Every = "Week";
                            if($make_arr[1] == 3)
                              $Every = "Month";
                            if($make_arr[1] == 4)
                              $Every = "Year";

                            $set_date = dateRange($from_date, $end_date, "+".$make_arr[0]." ".$Every);
                          }

                          if($get_record["fld_recurrence"] == 2)
                          {
                            $make_arr = explode('-', $get_record["fld_recurrence_type_name"]);

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
                              $RepeatWeek = "sunday";
                            if($make_arr[1] == 1)
                              $RepeatWeek = "monday";
                            if($make_arr[1] == 2)
                              $RepeatWeek = "tuesday";
                            if($make_arr[1] == 3)
                              $RepeatWeek = "wednesday";
                            if($make_arr[1] == 4)
                              $RepeatWeek = "thursday";
                            if($make_arr[1] == 5)
                              $RepeatWeek = "friday";
                            if($make_arr[1] == 6)
                              $RepeatWeek = "saturday";

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

                            $make_repeat = $RepeatOn." ".$RepeatWeek." of ";

                            $set_date = dateRange($from_date, $end_date, $make_repeat,"","");
                          }

                            foreach($set_date as $val)
                            {
                        ?>

                        <tr>

                          <td><?php echo $val; ?></td>
                          <td><?php echo date('l', strtotime($val)); ?></td>

                        </tr>

                        <?php
                        }
                      }
                    ?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Date</th>
                    <th>Day Name</th>
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

</script>