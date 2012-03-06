<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Gallery Admin | Sign In</title>
<link rel="stylesheet" href="{$base_url}resources/admin/css/reset.css" type="text/css" media="screen" />
<link rel="stylesheet" href="{$base_url}resources/admin/css/style.css" type="text/css" media="screen" />
<link rel="stylesheet" href="{$base_url}resources/admin/css/invalid.css" type="text/css" media="screen" />
<script type="text/javascript" src="{$base_url}resources/admin/scripts/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="{$base_url}resources/admin/scripts/simpla.jquery.configuration.js"></script>
<script type="text/javascript" src="{$base_url}resources/admin/scripts/facebox.js"></script>
<script type="text/javascript" src="{$base_url}resources/admin/scripts/jquery.wysiwyg.js"></script>
</head>
  
	<body id="login">
		
		<div id="login-wrapper" class="png_bg">
			<div id="login-top">
			
				<h1>Gallery Admin</h1>
				<!-- Logo (221px width) -->
				<img id="logo" src="{$base_url}resources/admin/images/logo.png" alt="Simpla Admin logo" />
			</div> <!-- End #logn-top -->
			
			<div id="login-content">
				
				<form method="post">

					{if isset($errorMessage)}
						<div class="notification error png_bg">
							<div>
								{$errorMessage}
								{ci_form_validation field='userEmail' error='true'}
								{ci_form_validation field='userPassword' error='true'}
							</div>
						</div>
					{/if}
					{if isset($successMessage)}
						<div class="notification success png_bg">
							<div>
								{$successMessage}
							</div>
						</div>
					{/if}

					<p>
						<label>Email</label>
						<input class="text-input" type="text" name="userEmail" value="{ci_form_validation|escape:'htmlall' field='userEmail'}" />
					</p>
					<div class="clear"></div>
					<p>
						<label>Password</label>
						<input class="text-input" type="password" name="userPassword" />
					</p>
					<div class="clear"></div>
					<p>
						<input class="button" type="submit" value="Login" />
					</p>
					
				</form>
			</div> <!-- End #login-content -->
			
		</div> <!-- End #login-wrapper -->
  </body>
</html>
