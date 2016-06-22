<div id="templates" style="display:none">
	<div class="post">
		<div class="content row"></div>
		<div class="postFooter"></div>
	</div>
</div>
<div class="col-md-8">
	<div class="row">
		<div class="col-md-12">
			<h1 id="threadTitle"></h1>
				<div class="col-md-6">
			
				<textarea text id="postContent"></textarea> <button type="submit" id="createPost" class="btn btn-primary btn-block">Create post</button>
				
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
	<div class="col-md-12" id="postsdiv">


	</div>
</div>

<script>
  tinymce.init({
    selector: '#postContent',
     plugins: "link"
  });


	$("#createPost").on("click",function(event){
				event.preventDefault();
				var content	=	tinyMCE.get("postContent").getContent()


				if( content ){
					$.ajax({
						url		:	"<?php echo base_url("index.php/ajax/posts/create") ?>",
						method	:	"POST",
						data	:	{content : content, code : "<?php echo $code ?>"},
						dataType:	"json",
						success	:	function(data){

							location.reload();
					
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

			var postContainer	=	$("#postsdiv")
			var temp =	$("#templates").find(".post")
			$.each(data,function(key,value){
				$(temp).find(".content").empty().html(value.content)
				$(temp).clone().appendTo($(postContainer))
			})


		}
	})

</script>
