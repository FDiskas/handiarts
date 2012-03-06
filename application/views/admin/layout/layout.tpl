<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>{block name='title'}Default Page Title{/block}</title>
	<link rel="stylesheet" href="{$base_url}resources/admin/css/reset.css" type="text/css" media="screen"/>
	<link rel="stylesheet" href="{$base_url}resources/admin/css/style.css" type="text/css" media="screen"/>
	<link rel="stylesheet" href="{$base_url}resources/admin/css/invalid.css" type="text/css" media="screen"/>
	<script type="text/javascript" src="{$base_url}resources/admin/scripts/jquery-1.3.2.min.js"></script>
	<script type="text/javascript" src="{$base_url}resources/admin/scripts/simpla.jquery.configuration.js"></script>
	<script type="text/javascript" src="{$base_url}resources/admin/scripts/facebox.js"></script>
	<script type="text/javascript" src="{$base_url}resources/admin/scripts/jquery.wysiwyg.js"></script>
	<script type="text/javascript" src="{$base_url}resources/admin/scripts/jquery.datePicker.js"></script>
	<script type="text/javascript" src="{$base_url}resources/admin/scripts/jquery.date.js"></script>

	{block name='head'}{/block}
</head>
<body>
<div id="body-wrapper"> <!-- Wrapper for the radial gradient background -->

	{include file='admin/layout/side_menu.tpl'}

	<div id="main-content"> <!-- Main Content Section with everything -->

		<noscript> <!-- Show a notification if the user has disabled javascript -->
			<div class="notification error png_bg">
				<div>
					Javascript is disabled or is not supported by your browser. Please <a href="http://browsehappy.com/"
																						  title="Upgrade to a better browser">upgrade</a>
					your browser or <a href="http://www.google.com/support/bin/answer.py?answer=23852"
									   title="Enable Javascript in your browser">enable</a> Javascript to navigate the interface
					properly.
				</div>
			</div>
		</noscript>

		{block name='body'}{/block}

		<div id="footer">
			<small>
			{block name='footer'}
				&#169; Copyright {$smarty.now|date_format:'%Y'} Your Company | Powered by <a href="http://www.coders.lt">Coders.lt</a>
				| <a href="#">Top</a>
			{/block}
			</small>
		</div>

		<!-- End #footer -->

	</div>
	<!-- End #main-content -->
</div>
</body>
</html>
