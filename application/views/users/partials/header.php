<!DOCTYPE html>
<html lang="en" style="height:100%">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    

    <title>My mud</title>

    <!-- Bootstrap Core CSS -->
    <!-- 
    <link href="<?php echo base_url("third_party/bootstrap-3.3.5-dist/css/bootstrap.min.css")?>" rel="stylesheet">
	-->
	<link href="<?php echo base_url($theme) ?>" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?php echo base_url("third_party/startbootsrtap/css/heroic-features.css")?>" rel="stylesheet">
    <!-- Font Awesome because Awesome> !-->
    <link rel="stylesheet" href="<?php echo base_url("third_party/font-awesome-4.4.0/css/font-awesome.min.css")?>">
	<link rel="stylesheet" href="<?php echo base_url("third_party/jquery-ui-1.11.4/jquery-ui.min.css") ?>">
	<link rel="stylesheet" href="<?php echo base_url("third_party/jquery-ui-1.11.4/jquery-ui.theme.css") ?>">  
	<script src="<?php echo base_url("third_party/jquery-1.11.3.min.js")?>" type="text/javascript"></script>
	<script src="<?php echo base_url("third_party/jquery-ui-1.11.4/jquery-ui.js")?>" type="text/javascript"></script>
	<script src="<?php echo base_url("third_party/bootstrap-3.3.5-dist/js/bootstrap.min.js")?>" type="text/javascript"></script>
	<script src="<?php echo base_url("third_party/tinymce/js/tinymce/tinymce.min.js")?>"></script>
	
	 <link rel="stylesheet" href="<?php echo base_url("third_party/AdminLTE-2.3.0/dist/css/AdminLTE.min.css")?>">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?php echo base_url("third_party/AdminLTE-2.3.0/plugins/iCheck/square/blue.css")?>">
    
	<!-- Datatable -->
    <script src="<?php echo base_url("third_party/DataTables-1.10.9/media/js/jquery.dataTables.min.js")?>" type="text/javascript"></script>
     <link rel="stylesheet" href="<?php echo base_url("third_party/DataTables-1.10.9/media/css/jquery.dataTables.min.css")?>">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>

#login-dp{
    min-width: 250px;
    padding: 14px 14px 0;
    overflow:hidden;
    /*background-color:rgba(255,255,255,.8);*/
}
#login-dp .help-block{
    font-size:12px    
}
#login-dp .bottom{
   /* background-color:rgba(255,255,255,.8); */
    border-top:1px solid #ddd;
    clear:both;
    padding:14px;
}
#login-dp .social-buttons{
    margin:12px 0    
}
#login-dp .social-buttons a{
    width: 49%;
}
#login-dp .form-group {
    margin-bottom: 10px;
}
@media(max-width:768px){
    #login-dp{
        /*background-color: inherit;*/
        color: #fff;
    }
    #login-dp .bottom{
       /* background-color: inherit; */
        border-top:0 none;
    }
}




    </style>

</head>
<body style="padding-top:0px; height:100%; " >
	<nav class=" navbar navbar-default" style="margin-bottom:0px; height:5%;">
		<div class="container-fluid" style="height:100%">
			<div class="navbar-header" style="height:100%">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-examample-navbar-collapse-1" area-expanded="false">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand">MyMUD!</a>
			</div>
			
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" style="height:100%">
				<?php 
					if($loggedIn){
				?>
					<ul class="nav navbar-nav">
						<li><a href="<?php echo base_url("index.php/select/deck") ?>">Edit deck</a></li>
						<li><a href="<?php echo base_url("index.php/game/worldmap") ?>">World map</a></li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<li>
							<div class="form-group">
								<select id="themeSelection" class="form-control">
									<?php 
										foreach($themes as $key=>$value){
									?>
											<option id="<?php echo $value['id'] ?>" <?php if($value['id']==$themeId){echo "selected";}?>><?php echo $value['name'] ?></option>
									<?php
										}
									?>
								</select>
							</div>
						</li>
						<li><a href="<?php echo base_url("index.php/profile") ?>">Profile</a></li>
						<li><a href="<?php echo base_url("index.php/logout") ?>">Logout</a></li>
					</ul>
				
				<?php	
					} else {
				?>
					<ul class="nav navbar-nav navbar-right">
						<li>
							<div class="form-group">
								<select id="themeSelection" class="form-control">
									<?php 
										foreach($themes as $key=>$value){
									?>
											<option id="<?php echo $value['id'] ?>" <?php if($value['id']==$themeId){echo "selected";}?>><?php echo $value['name'] ?></option>
									<?php
										}
									?>
								</select>
							</div>	
						</li>
						<li class="" id="headerDropdown"> <a href="#" class="dropdown-toggle"><b>Login</b> <span class="caret"></span></a>
								<ul id="login-dp" class="dropdown-menu">
									
									<li>
										 <div class="row">
												<div class="col-md-12">

													 <form class="form" role="form" method="post" action="login" accept-charset="UTF-8" id="login-nav">
															<div class="form-group">
																 <label class="sr-only" for="exampleInputEmail2">Username</label>
																 <input type="text" id="headerUsername" class="form-control" id="exampleInputEmail2" placeholder="Email address" required>
															</div>
															<div class="form-group">
																 <label class="sr-only" for="exampleInputPassword2">Password</label>
																 <input type="password" id="headerPassword" class="form-control" id="exampleInputPassword2" placeholder="Password" required>
					                                             <div class="help-block text-right"><a href="">Forget the password ?</a></div>
															</div>
															<div class="form-group">
																 <button type="submit" id="headerLogin" class="btn btn-primary btn-block">Sign in</button>
															</div>
															<div class="checkbox">
																 <label>
																 <input type="checkbox"> keep me logged-in
																 </label>
															</div>
													 </form>
												</div>
												<div class="bottom text-center">
													New here ? <a href="#"><b>Join Us</b></a>
												</div>
										 </div>
									</li>
								</ul>
					        </li>
					     

						</li> 

						<li class=""><a href="<?php echo base_url("index.php/register") ?>">Register</a></li>
					</ul>

					</ul>
						
				<?php	
					}
				?>
				</ul>
			</div>
		</div>
	</nav>
	<div class="container-fluid" style="height:85%; padding-left:0;padding-right:0;">
		<div class="col-md-12" style="height:100%; padding:0;margin:0;">


	<script>
		var NEED_OPEN=true;
		$(function () {
			$('input').iCheck({
				checkboxClass: 'icheckbox_square-blue',
				radioClass: 'iradio_square-blue',
				increaseArea: '20%' // optional
			});
			
		});
		$("#headerLogin").on("click",function(event){
				event.preventDefault();
				var password	=	$("#headerPassword").val()
				var username	=	$("#headerUsername").val()
				if( password && username){
					$.ajax({
						url		:	"<?php echo base_url("index.php/ajax/login") ?>",
						method	:	"POST",
						data	:	{password : password, username : username},
						dataType:	"json",
						success	:	function(data){
							console.log(data)
							if(!data.loggedIn){
								$("#error").empty().html("<p>"+data.error+"</p>").show();
							} else {
								location.reload();
							}
						}
						
					})
				}
			})


		$("#headerDropdown").on("click",function(event){
			event.preventDefault();


			if(NEED_OPEN){
				$( "#headerDropdown" ).addClass("open");
			} else {
				$( "#headerDropdown" ).removeClass("open");
			}

			NEED_OPEN= ! NEED_OPEN

		})
	$("#themeSelection").on("change",function(event){
		var id=$(this).find(":selected").attr("id")
		$.ajax({
			url		:	"<?php echo base_url("index.php/ajax/users/update/theme")?>/"+id,
			method	:	"GET",
			dataType:	"json",
			success	:	function(data){
				console.log(data)
				if(data.success){
					location.reload()
				}
			}
		})
	})
    </script>
    WTF?!?
