<div class="col-md-8">
	<div class="row">
		<div class="col-md-12">
			<h1 id="threadTitle"></h1>
			<?php 
				if($owned){
			?>
					<button class="btn btn-danger pull-right" id="delete">Delete</button>
			<?php
				}
			?>
		</div>
	</div>
</div>

<script>
$("#delete").on("click",function(event){
	event.preventDefault()
	var button = this
	$.ajax({
		url		:	"<?php echo base_url("index.php/ajax/threads/delete/".$code) ?>",
		method	:	"GET",
		dataType:	"json",
		success	:	function(data){
			if(data.success){
				$(button).prop("disabled",true);
			}
		}
	})
})

</script>
