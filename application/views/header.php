<?php $url = $this->config->config['base_url']; ?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>myvimcommands.com</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<script type="text/javascript" src="http://code.jquery.com/jquery-1.6.min.js"></script>
<script type="text/javascript" src="<?php echo $url; ?>js/jquery.snippet.js"></script>
<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $url; ?>css/style.css"></script>
<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $url; ?>css/jquery.snippet.css"></script>
 <script type="text/javascript">
 $(document).ready(function(){
$("pre").snippet("javascript",{style:"easter",transparent:false,showNum:false});
});

 </script>

</head>
<body>
<!-- end #header-wrapper -->
<div id="header">
	<div id="logo">
		<h1><a href="/vimup/index.php/">VimCompare.com</a></h1>
	</div>
	<div id="menu">
		<ul>
		<?php
		$menu_items = array(
		'/' => 'home',
		'/vim/submit' => 'submit',
		'/user/profile' => 'profile',
		'/vim/favorites' => 'favorites',
		'/user/login' => 'login'
		);
		$i = 0;
		foreach ($menu_items as $item => $value) {
			$class = ((/*$this->uri->segment(1,0) == "0" && $value == "home") || (*/$value == "home" && $this->uri->segment(2,0) == $value )) ? " class='current_page_item' " : "";

			if(0 == $i)
				$aclass = "class='first'";

			echo "<li $class><a href='".$url."index.php".$item."' $aclass >$value</a></li>";
			$i++;
		} ?>
			<!--<li class="current_page_item"><a href="<?php echo $url; ?>index.php/" class="first">Homepage</a></li>
			<li ><a href="<?php echo $url; ?>index.php/vim/submit">Submit</a></li>
			<li ><a href="<?php echo $url; ?>index.php/user/profile">Profile</a></li>
			<li><a href="<?php echo $url; ?>index.php/vim/favorites">Favorites</a></li>
			<li><a href="<?php echo $url; ?>index.php/user/login">Login</a></li>
			-->
		</ul>
	</div>
	<!-- end #menu -->
</div>
<!-- end #header -->
<hr />
<div id="wrapper">
	<!-- end #logo -->
</div>
<div id="page">
	<div id="page-bgtop">
		<div id="content">
		<?php
		if(isset($public_message) && $public_message != "")
			echo "<h3 style='padding:20px;border:1px solid #ccc;background:#efefef;margin:20px 0 20px 0;width:890px;'>$public_message</h3>"; ?>
