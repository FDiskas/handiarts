<div id="sidebar">
	<div id="sidebar-wrapper"> <!-- Sidebar with logo and menu -->

		<h1 id="sidebar-title"><a href="{$base_url}admin">Gallery Admin</a></h1>

		<!-- Logo (221px wide) -->
		<a href="{$base_url}admin"><img id="logo" src="{$base_url}resources/admin/images/logo.png" alt="Simpla Admin logo"/></a>

		<!-- Sidebar Profile links -->
		<div id="profile-links">
			{t}hello{/t}, <a href="{$base_url}admin/user/edit/{$ci->session->userdata.userId}" title="Edit your profile">{$ci->session->userdata.userEmail}</a>{*, you have <a href="#messages" rel="modal" title="3 Messages">3 Messages</a>*}
			<br/>
			<br/>
			<a href="{$base_url}" title="View the Site">View the Site</a> | <a href="{$base_url}admin/logout" title="Sign Out">Sign Out</a>
		</div>

		<ul id="main-nav">  <!-- Accordion Menu -->

			<li>
				<a href="{$base_url}admin/" class="nav-top-item no-submenu">
					<!-- Add the class "no-submenu" to menu items with no sub menu -->
					{t}dashboard{/t}
				</a>
			</li>

		{*<li>
			   <a href="#" class="nav-top-item current"> <!-- Add the class "current" to current menu item -->
				   Articles
			   </a>
			   <ul>
				   <li><a href="#">Write a new Article</a></li>
				   <li><a class="current" href="#">Manage Articles</a></li>
				   <!-- Add class "current" to sub menu items also -->
				   <li><a href="#">Manage Comments</a></li>
				   <li><a href="#">Manage Categories</a></li>
			   </ul>
		   </li>*}

			<li>
				<a href="#" class="nav-top-item">
					{t}pages{/t}
				</a>
				<ul>
					<li><a href="#">{t}create a new page{/t}</a></li>
					<li><a href="#">{t}manage pages{/t}</a></li>
				</ul>
			</li>

			<li>
				<a href="#" class="nav-top-item">
					{t}image gallery{/t}
				</a>
				<ul>
					<li><a href="#">Upload Images</a></li>
					<li><a href="#">Manage Galleries</a></li>
					<li><a href="#">Manage Albums</a></li>
					<li><a href="#">Gallery Settings</a></li>
				</ul>
			</li>

		{*<li>
			   <a href="#" class="nav-top-item">
				   Events Calendar
			   </a>
			   <ul>
				   <li><a href="#">Calendar Overview</a></li>
				   <li><a href="#">Add a new Event</a></li>
				   <li><a href="#">Calendar Settings</a></li>
			   </ul>
		   </li>*}

			<li>
				<a href="#" class="nav-top-item">
					Settings
				</a>
				<ul>
					<li><a href="#">General</a></li>
					<li><a href="#">Design</a></li>
					<li><a href="#">Your Profile</a></li>
					<li><a href="#">Users and Permissions</a></li>
				</ul>
			</li>

		</ul>
		<!-- End #main-nav -->

	</div>
</div>
<!-- End #sidebar -->