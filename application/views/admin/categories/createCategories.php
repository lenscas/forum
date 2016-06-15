<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Categories
			<small>create</small>
		</h1>
		<ol class="breadcrumb">
			<li>
				<a href="<?php echo base_url("index.php/admin/index") ?>">
					<i class="fa fa-dashboard"></i> 
					Home
				</a>
			</li>
			<li>
				<a href="<?php echo base_url("index.php/admin/categories") ?>">
					Categories
				</a>
			</li>
			<li class="active">Create</li>
		</ol>
	</section>
	<section class="content">
		<!-- Small boxes (Stat box) -->
		<div class="box">
			<div class="box-body">
				<div class="row" id="messageContainer" style="display:none">
					<div class="col-md-12">
						<div class="alert" id="alert" role="alert">
							<p id="text"></p>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="inner">
							<form id="create">
								 <div class="form-group">
								 	 <label>Category name</label>
									<input class="form-control" id="categoryName" type="text" placeholder="Name">
								 </div>
								 <div class="form-group">
								 	 <label>Rules</label>
									<select class="form-control" id="rules"></select>
								 </div>
								 <button class="pull-right btn btn-success" id="createCategory">Create</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
<script>
	//define global vars here
	//define functions here
	function showSuccess(){
		$("#messageContainer").show()
		$("#alert").removeClass("alert-danger").addClass("alert-success")
		$("#text").empty().html("The category is successfully created.")
	}
	function showError(error){
		$("#messageContainer").show()
		$("#alert").addClass("alert-danger").removeClass("alert-success")
		$("#text").empty().html(error)
	}
	//make all the events happen here
	$("#createCategory").on("click",function(event){
		event.preventDefault()
		var name	=	$("#categoryName").val()
		var rule	=	$("#rules").val()
		if(name!="" && rule){
			$.ajax({
				url		:	"<?php echo base_url("index.php/ajax/admin/categories/create") ?>",
				method	:	"POST",
				data	:	{rulesId : rule, name : name},
				dataType:	"json",
				success	:	function(data){
					if(data.success){
						showSuccess()
					} else {
						showError(data.error)
					}
				}
			})
		} else {
			showError("1 or more fields are not set correctly")
		}
		console.log(rule)
	})
	//load data using ajax here
	$.ajax({
		url		:	"<?php echo base_url("index.php/ajax/admin/categories/getAllRules") ?>",
		method	:	"GET",
		dataType:	"json",
		success	:	function(data){
			//get the select
			var element=$("#rules")
			$.each(data,function(key,value){
				$(element).append('<option value="'+value.id+'">'+value.name+'</option>')
			})
		}
		
		
	})
</script>
