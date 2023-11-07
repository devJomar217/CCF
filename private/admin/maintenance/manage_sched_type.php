<?php
if(isset($_GET['id']) && $_GET['id'] > 0){
    $qry = $conn->query("SELECT * from `schedule_type` where id = '{$_GET['id']}' ");
    if($qry->num_rows > 0){
        foreach($qry->fetch_assoc() as $k => $v){
            $$k=$v;
        }
    }
}
?>
<div class="card card-outline card-info">
	<div class="card-header">
		<h3 class="card-title"><?php echo isset($id) ? "Update ": "Create New " ?> Schedule Request Type</h3>
	</div>
	<div class="card-body">
		<form action="" id="sched_type-form">
			<input type="hidden" name ="id" value="<?php echo isset($id) ? $id : '' ?>">
			<div class="form-group">
				<label for="sched_type" class="control-label">Schedule Type</label>
				<input type="text" name="sched_type" id="sched_type" class="form-control rounded-0" required value="<?php echo isset($sched_type) ? $sched_type : ''; ?>">
			</div>
            <div class="form-group">
				<label for="description" class="control-label">Description</label>
                <textarea name="description" id="" cols="30" rows="3" class="form-control form no-resize summernote"><?php echo isset($description) ? $description : ''; ?></textarea>
			</div>
            <div class="form-group">
				<label for="status" class="control-label">Status</label>
                <select name="status" id="status" class="custom-select selevt">
                <option value="1" <?php echo isset($status) && $status == 1 ? 'selected' : '' ?>>Active</option>
                <option value="0" <?php echo isset($status) && $status == 0 ? 'selected' : '' ?>>Inactive</option>
                </select>
			</div>
			
		</form>
	</div>
	<div class="card-footer">
		<button class="btn btn-flat btn-primary" form="sched_type-form">Submit</button>
		<a class="btn btn-flat btn-default" href="?page=maintenance/sched_type">Cancel</a>
	</div>
</div>
<script>
  
	$(document).ready(function(){
		$('#sched_type-form').submit(function(e){
			e.preventDefault();
            var _this = $(this)
			 $('.err-msg').remove();
			start_loader();
			$.ajax({
				url:_base_url_+"classes/Master.php?f=save_sched_type",
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
						location.href = "./?page=maintenance/sched_type";
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