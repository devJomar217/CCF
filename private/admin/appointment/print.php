<?php
require_once('../../config.php');
if(isset($_GET['id']) && $_GET['id'] > 0){
    $qry = $conn->query("SELECT r.*, t.sched_type, brgy.brgyDesc, city.citymunDesc, city.citymunCode, prov.provDesc, prov.provCode from `appointment_request` r inner join `schedule_type` t on r.sched_type_id = t.id left join
refbrgy as brgy on r.address = brgy.brgyCode left join refcitymun as city on brgy.citymunCode= city.citymunCode left join refprovince as prov on city.provCode=prov.provCode where r.id = '{$_GET['id']}' ");
    if($qry->num_rows > 0){
        foreach($qry->fetch_assoc() as $k => $v){
            $$k=$v;
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $_settings->info('title') != false ? $_settings->info('title').' | ' : '' ?><?php echo $_settings->info('name') ?></title>
    <link rel="icon" href="<?php echo validate_image($_settings->info('logo')) ?>" />

</head>

<style type="text/css">
@page {
          size: 8.5in 14in;  /* width height */
          margin-top: 0.05in;
          margin-bottom: 0.8in;
          margin-left: 0.05in;
          margin-right: 0.05in;
      }

.table tbody tr td, .table tbody tr th {
    border-top: 1px solid #000;
    border-bottom: 1px solid #000;
}

</style>

<body onload="window.print()">
        <br>
        <div id="myDiv" width="950">
            <table class="table " style="width:100%;">
                <thead>
                  <tr>
                    <td align="center" width="25%">
                        <img style="height:80px; width:80px;" src="<?php echo validate_image($_settings->info('logo')); ?>">
                    </td>
                    <td align="center" width="50%">
                      <strong>Poggio Bustone Renewal Center</strong><br>
                      <strong>Beneg, Botolan, Zambales</strong>
                    </td>
                    <td width="25%">&nbsp;</td>

                  </tr>
                  <tr>
                    <td colspan="3" align="center">
                      <h3><?php echo $sched_type ?></h3> 
                    </td>
                  </tr>
                </thead>
                <tbody>
                </tbody>
               
            </table>
            <table class="table " style="width:30%;margin-left:250px">
                <thead>
                    <tr>
                      <td align="right"><b>Name:</b> </td>
                      <td colspan="2"><?php echo isset($Lname) ? $Lname.", ".$Fname.", ".$Mname : '' ?></td>
                    </tr>
                    <tr>
                      <td align="right"><b>Contact:</b> </td>
                      <td colspan="2"><?php echo isset($contact) ? $contact : '' ?></td>
                    </tr>
                    <tr>
                      <td align="right"><b>Address:</b> </td>
                      <td colspan="2"><?php echo isset($address) ? strtoupper($brgyDesc.", ".$citymunDesc.", ".$provDesc) : '' ?></td>
                    </tr>
                    <tr>
                      <td align="right"><b>Date:</b> </td>
                      <td colspan="2"><?php echo isset($schedule) ? date("Y-m-d",strtotime($schedule)) : '' ?></td>
                    </tr>
                    <tr>
                      <td align="right"><b>Time:</b> </td>
                      <td colspan="2"><?php echo isset($time) ? $time : '' ?></td>
                    </tr>
                    <tr>
                      <td align="right"><b>Email:</b> </td>
                      <td colspan="2"><?php echo isset($email) ? $email : '' ?></td>
                    </tr>
                    <br>
                    <br>
                    
                </thead>
            </table>
        </div>
</body>
</html>
 
