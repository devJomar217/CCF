<?php 

 $events_room = array();
     // foreach ($viewInstructor as $sched_ins)
     //   {  
    $qry = $conn->query("SELECT * FROM appointment_request where status ='1'");
    while($row = $qry->fetch_assoc()):
    
        $eventArray['id'] = $row['id'];
        $eventArray['title'] = $row['Lname'].", ".$row['Fname']." ".$row['Mname'];
        $eventArray['start']=$row['schedule']."T".$row['time'];
        //$eventArray['end']=$key['schedule']."T15:30:00";
        //$eventArray['end']="2022-04-04T15:30:00";
        $eventArray['color']='#0DB1ED';
        //$eventArray['allDay']=false;
        //$eventArray['color']='#0DB1ED';
        $events_room[] = $eventArray;
     endwhile;

?>
<link href='<?php echo base_url ?>assets/calendar/fullcalendar.css' rel='stylesheet' />
<h1 >Welcome to <?php echo $_settings->info('name') ?></h1>
<hr class="border-light">
<div class="row">

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-calendar-check"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Appointment Request</span>
                <span class="info-box-number text-right">
                  <?php 
                    $appointment = $conn->query("SELECT count(id) as total FROM appointment_request ")->fetch_assoc()['total'];
                    echo number_format($appointment);
                  ?>
                  <?php ?>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>


          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-calendar-day"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Upcoming Events</span>
                <span class="info-box-number text-right">
                <?php 
                    $event = $conn->query("SELECT id FROM `events` where date(schedule) >= '".date('Y-m-d')."' ")->num_rows;
                    echo number_format($event);
                  ?>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
        </div>
<div class="card card-outline card-primary">
  <div class="card-header">
    <h3 class="card-title">Schedule</h3>
  </div>

  <div class="card-body">
    <div class="container-fluid">
        <div id="schedule"></div>
    </div>
  </div>
</div>



<script type="text/javascript"  src='<?php echo base_url ?>assets/calendar/moment.min.js'></script>
<script type="text/javascript"  src='<?php echo base_url ?>assets/calendar/fullcalendar.min.js'></script>
<script>
$(document).ready(function() {
  // $('#ins_filter').fullCalendar({events: <?php echo json_encode($events_room) ?>});
  $('#schedule').fullCalendar({

                  header: {
                    left: 'title',
                    center: 'prev,next',/*prev,next*/
                    right: '',
                  },

                  //hiddenDays: [ 0 ],
                  // minTime: '07:00:00',
                  // maxTime: '21:30:00',
                  allDaySlot: false,
                  columnFormat: 'dddd',
                  schedulerLicenseKey: 'GPL-My-Project-Is-Open-Source',
                  scrollTime: '07:00',
                  slotEventOverlap:false,
                  slotDuration:'00:05:00',
                  //defaultDate: '2016-06-13',
                  //defaultView:'dayGridMonth',/*agendaDay*/
                  editable: false,
                  events:<?php echo json_encode($events_room) ?>,

                  eventClick: function(calEvent, jsEvent, view) {
                    showAjax('../view_schedule/settings.php',{ids:calEvent.id,},'laman');
                    $("#Modal").modal();
                  }

    });
    
  });

</script>