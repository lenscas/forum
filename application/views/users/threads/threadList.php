<div class="col-md-8">
	<div class="row">
		<table id="threadTable" class="table">
			<thead>
				<tr>
					<td>Creator</td>
					<td>Title</td>
					<td>Replies</td>
				</tr>
			</thead>
			<tbody id="tableBody"></tb>
		</table>
	</div>
</div>

<script>
	$.ajax({
		url		:	"<?php echo base_url("index.php/ajax/threads/".$from."/".$code)?>",
		method	:	"GET",
		dataType:	"json",
		success	:	function(data){
			var tb	=	$("#tableBody")
			$.each(data,function(key,value){
				$(tb).append('<tr><td><a href="<?php echo base_url("index.php/profile")?>/'+value.userCode+'">'+value.username+'</a></td><td><a href="<?php echo base_url("index.php/thread/")?>/'+value.code+'">'+value.title+'</td><td>0</td></tr>')
			
			})
			$('#threadTable').DataTable();
		}
	})
</script>

