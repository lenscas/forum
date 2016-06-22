<div class="col-md-8">
	<div class="row">
		<div class="col-md-12">
			<h1 id="threadTitle"></h1>
				<div class="col-md-6">
			
				<label>Content:    </label><textarea text id="postContent"></textarea> <button type="submit" id="createPost" class="btn btn-primary btn-block">Create post</button>
				
				<br>
			</div>
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
	$("#createPost").on("click",function(event){
				event.preventDefault();
				var content	=	$("#postContent").val()


				if( content ){
					$.ajax({
						url		:	"<?php echo base_url("index.php/ajax/posts/create") ?>",
						method	:	"POST",
						data	:	{content : content, code : "<?php echo $code ?>"},
						dataType:	"json",
						success	:	function(data){
							console.log(data)
					
						}
						
					})
				}
			})


$("#delete").on("click",function(event){
	event.preventDefault()
	var button = this
	$.ajax({
		url		:	"<?php echo base_url("index.php/ajax/threads/delete/".$code."/".$noForge) ?>",
		method	:	"GET",
		dataType:	"json",
		success	:	function(data){
			if(data.success){
				$(button).prop("disabled",true);
			}
		}
	})
})



$.ajax({
		url		:	"<?php echo base_url("index.php/ajax/posts/".$code)?>",
		method	:	"GET",
		dataType:	"json",
		success	:	function(data){
			console.log(data);
		}
	})

</script>
