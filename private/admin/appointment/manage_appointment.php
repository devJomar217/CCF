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

<div class="container-fluid">
    <form action="" id="appointment-form">
        <input type="hidden" name="id" value="<?php echo isset($id) ? $id : '' ?>">
        <input type="hidden" name="sched_type_id" value="<?php echo isset($sched_type_id) ? $sched_type_id : '' ?>">
        <div class="col-12">
			<h4>Request For: <?php echo $sched_type ?></h4>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="lname" class="control-label">Last Name</label>
                        <input type="text" name="Lname" id="Lname" class="form-control rounded-0" value="<?php echo isset($Fname) ? $Fname : '' ?>" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="fname" class="control-label">First Name</label>
                        <input type="text" name="Fname" id="Fname" class="form-control rounded-0" value="<?php echo isset($Lname) ? $Lname : '' ?>" required>
                    </div>
                </div>
                <div class="col-md-4">
                     <div class="form-group">
                        <label for="mname" class="control-label">Middle Name</label>
                        <input type="text" name="Mname" id="Mname" class="form-control rounded-0" value="<?php echo isset($Mname) ? $Mname : '' ?>" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="address" class="control-label">Province</label>
                        <select class="form-control" id="prov" required onchange="find_city(this.value)">
                            <option value=""></option>
                            <?php 
                                $qry1 = $conn->query("SELECT provDesc, provCode FROM refprovince  order by provDesc ");
                                    if($qry1->num_rows > 0){
                                        while($row = $qry1->fetch_array()):
                                            $selecting="";
                                            if(isset($provDesc) && $provDesc==$row['provDesc']){ $selecting="selected='selected'";}

                                            echo "<option value='".$row['provCode']."'".$selecting.">".$row['provDesc']."</option>";
                                        endwhile;
                                    } 
                            ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-4" id="mun_data">
                     <div class="form-group">
                       <label for="municipal" class="control-label">Municipality</label>
                        <select class="form-control" id="municipal" required onchange="find_brgy(this.value)">
                            <option value=''></option>
                            <?php 
                                   $qry2 = $conn->query("SELECT citymunDesc, citymunCode FROM refcitymun where provCode like '".$provCode."%' order by citymunDesc ");
                                    while($row = $qry2->fetch_array()):
                                        $selecting="";
                                        if(isset($citymunDesc) && $citymunDesc==$row['citymunDesc']){ $selecting="selected='selected'";}
                                        echo "<option value='".$row['citymunCode']."' ".$selecting.">".$row['citymunDesc']."</option>";
                                    endwhile;
                            ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-4" id="brgy_data">
                    <div class="form-group">
                        <label for="address" class="control-label">Barangay</label>
                        <select class="form-control" name="address" id="address" required>
                            <option value=''></option>
                            <?php 
                               $qry2 = $conn->query("SELECT brgyDesc, brgyCode FROM refbrgy where citymunCode like '".$citymunCode."%' order by brgyDesc ");
                                while($row = $qry2->fetch_array()):
                                    $selecting="";
                                    if(isset($address) && $address==$row['brgyCode']){ $selecting="selected='selected'";}
                                    echo "<option value='".$row['brgyCode']."' ".$selecting.">".strtoupper($row['brgyDesc'])."</option>";
                                endwhile;
                            ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="contact" class="control-label">Contact</label>
                        <input type="text" name="contact" id="contact" class="form-control rounded-0" value="<?php echo isset($contact) ? $contact : '' ?>" required>
                    </div>
                </div>

                                <div class="col-md-4">
                    <div class="form-group">
                        <label for="fname" class="control-label">Email</label>
                        <input type="text" name="Fname" id="Fname" class="form-control rounded-0" value="<?php echo isset($email) ? $email : '' ?>" required>
                    </div>
                </div>

                
                <div class="col-md-4">
                    
                    <div class="form-group">
                        <label for="schedule" class="control-label">Date Schedule</label>
                        <input type="date" min="<?php echo date('Y-m-d'); ?>" value="<?php echo isset($schedule) ? date("Y-m-d",strtotime($schedule)) : '' ?>" name="schedule" id="schedule" class="form-control rounded-0" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="time" class="control-label">Time Schedule</label>
                        <select class="form-control" name="time" id="time" required>
                            <option value="" <?php echo (isset($time) && $time == "") ? "selected" : "" ?>>Select</option>
                            <option value="7:00"<?php echo (isset($time) && $time == "7:00:00") ? "selected" : "" ?>>7:00</option>
                            <option value="7:30"<?php echo (isset($time) && $time == "7:30:00") ? "selected" : "" ?>>7:30</option>
                            <option value="8:00"<?php echo (isset($time) && $time == "8:00:00") ? "selected" : "" ?>>8:00</option>
                            <option value="8:30"<?php echo (isset($time) && $time == "8:30:00") ? "selected" : "" ?>>8:30</option>
                            <option value="9:00"<?php echo (isset($time) && $time == "9:00:00") ? "selected" : "" ?>>9:00</option>
                            <option value="9:30"<?php echo (isset($time) && $time == "9:30:00") ? "selected" : "" ?>>9:30</option>
                            <option value="10:00"<?php echo (isset($time) && $time == "10:00:00") ? "selected" : "" ?>>10:00</option>
                            <option value="10:30"<?php echo (isset($time) && $time == "10:30:00") ? "selected" : "" ?>>10:30</option>
                            <option value="11:00"<?php echo (isset($time) && $time == "11:00:00") ? "selected" : "" ?>>11:00</option>
                            <option value="11:30"<?php echo (isset($time) && $time == "11:30:00") ? "selected" : "" ?>>11:30</option>
                            <option value="12:00"<?php echo (isset($time) && $time == "12:00:00") ? "selected" : "" ?>>12:00</option>
                            <option value="12:30"<?php echo (isset($time) && $time == "12:30:00") ? "selected" : "" ?>>12:30</option>
                            <option value="13:00"<?php echo (isset($time) && $time == "1:00:00") ? "selected" : "" ?>>13:00</option>
                            <option value="13:30"<?php echo (isset($time) && $time == "1:30:00") ? "selected" : "" ?>>13:30</option>
                            <option value="14:00"<?php echo (isset($time) && $time == "2:00:00") ? "selected" : "" ?>>14:00</option>
                            <option value="14:30"<?php echo (isset($time) && $time == "2:30:00") ? "selected" : "" ?>>14:30</option>
                            <option value="15:00"<?php echo (isset($time) && $time == "3:00:00") ? "selected" : "" ?>>15:00</option>
                            <option value="15:30"<?php echo (isset($time) && $time == "3:30:00") ? "selected" : "" ?>>15:30</option>
                            <option value="16:00"<?php echo (isset($time) && $time == "4:00:00") ? "selected" : "" ?>>16:00</option>
                            <option value="16:30"<?php echo (isset($time) && $time == "4:30:00") ? "selected" : "" ?>>16:30</option>
                            <option value="17:00"<?php echo (isset($time) && $time == "5:00:00") ? "selected" : "" ?>>17:00</option>
                        </select>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="status" class="control-label">Status</label>
                        <select name="status" id="status" class="custom-select custom-select-md rounded-0" required>
                            <option value="0" <?php echo (isset($status) && $status == 0) ? "selected" : "" ?>>Pending</option>
                            <option value="1" <?php echo (isset($status) && $status == 1) ? "selected" : "" ?>>Confirmed</option>
                            <option value="2" <?php echo (isset($status) && $status == 2) ? "selected" : "" ?>>Cancelled</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<script>
function showAjax(url,param,div)
        {
            $.post(url,param,function(data){

                $('#'+div).html(data)
            });


        }

    function find_city(data){
        showAjax(_base_url_+'search_city.php',{prov:data},"mun_data");
    }
    function find_brgy(data){
        showAjax(_base_url_+'search_brgy.php', {brgy:data}, "brgy_data");
    }
    $(function(){
        $('#appointment-form').submit(function(e){
			e.preventDefault();
            var _this = $(this)
			 $('.err-msg').remove();
			start_loader();
			$.ajax({
				url:_base_url_+"classes/Master.php?f=save_appointment_req",
				data: new FormData($(this)[0]),
                cache: false,
                contentType: false,
                processData: false,
                method: 'POST',
                type: 'POST',
                dataType: 'json',
				error:err=>{
					console.log(err)
					alert_toast("An error occured",'error');
					end_loader();
				},
				success:function(resp){
					if(typeof resp =='object' && resp.status == 'success'){
					        location.reload();
					}else if(resp.status == 'failed' && !!resp.msg){
                        var el = $('<div>')
                            el.addClass("alert alert-danger err-msg").text(resp.msg)
                            _this.prepend(el)
                            el.show('slow')
                            $("html, body").animate({ scrollTop: _this.closest('.card').offset().top }, "fast");
                            end_loader()
                    }else{
						alert_toast("An error occured",'error');
						end_loader();
                        console.log(resp)
					}
				}
			})
		})
    })
</script>