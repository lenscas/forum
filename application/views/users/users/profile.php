<div id="templates" style="display:none">
	<div class="grave col-md-4">
		<a href="" class="graveLocation">
			<h3 class="name"></h3>
			<img class="img-responsive corpse">
		</a>
	</div>
</div>
<div class="col-md-6" style="height:100%">
	<div class="row" style="height:10%">
		<div style="text-align:center">	
			<h1 id="userName"></h1>
		</div>
	</div>
	<div class="row" style="height:20%">
		<table class="table removeNotExist">
			<tbody id="userData">
				<tr>
					<td>Status</td>
					<td id="status"></td>
				</tr>
			</tbody>
		</table>
	</div>
	<div class="row col-md-12" id="graveyard" style="height:70%;overflow:auto">
		<div class="row" id="row0"></div>
	</div>
</div>
<script>
	<?php 
		if(isset($userId)){
	?>
		$.ajax({
			url		:	"<?php echo base_url("index.php/ajax/profile/".$userId)?>",
			method	:	"GET",
			dataType:	"json",
			success	:	function(data){
				$("#userName").html(data.username)
				$("#status").html(data.status)
			}
		})
	<?php
	} else {
	?>
		$("#userName").html("This account does not exist")
		$(".removeNotExist").remove()
	<?php
	}
	?>
</script>
