<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
	<title>Starter Template - Materialize</title>

	<!-- CSS  -->
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link href="../css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
	<link href="../css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>
<body>
	<header>
		<nav class="top-nav grey darken-3">
			<div class="container-fluid">
				<div class="nav-wrapper"><a class="page-title">Administrator Guide Sinona</a></div>
			</div>
		</nav>
		<div class="container-fluid"><a href="#" data-activates="nav-mobile" class="button-collapse top-nav full hide-on-large-only"><i class="material-icons">menu</i></a></div>
		<ul style="transform: translateX(0%);" id="nav-mobile" class="side-nav fixed">
			<li class="logo">
				<a id="logo-container" href="http://kodemerah.com/" class="brand-logo">
					<svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" width="90px" version="1.1" style="shape-rendering:geometricPrecision; text-rendering:geometricPrecision; image-rendering:optimizeQuality; fill-rule:evenodd; clip-rule:evenodd"
					viewBox="0 0 477 304"
					xmlns:xlink="http://www.w3.org/1999/xlink">
					<defs>
						<style type="text/css">
							<![CDATA[
							.str0 {stroke:#F0F0F0;stroke-width:2.36437}
							.fil0 {fill:#F0F0F0}
							]]>
						</style>
					</defs>
					<g id="Layer_x0020_1">
						<metadata id="CorelCorpID_0Corel-Layer"/>
						<g id="_273640064">
							<g>
								<rect class="fil0 str0" y="137" width="32" height="32"/>
								<rect class="fil0 str0" x="34" y="171" width="32" height="32"/>
								<rect class="fil0 str0" x="69" y="205" width="32" height="32"/>
								<rect class="fil0 str0" x="103" y="239" width="32" height="32"/>
								<rect class="fil0 str0" x="138" y="272" width="32" height="32"/>
								<rect class="fil0 str0" transform="matrix(2.15192E-014 0.812521 -0.812521 2.15192E-014 166.655 -0.00118219)" width="39" height="39"/>
								<rect class="fil0 str0" transform="matrix(2.15192E-014 0.812521 -0.812521 2.15192E-014 132.728 34.378)" width="39" height="39"/>
								<rect class="fil0 str0" transform="matrix(2.15192E-014 0.812521 -0.812521 2.15192E-014 99.0151 68.7063)" width="39" height="39"/>
								<rect class="fil0 str0" transform="matrix(2.15192E-014 0.812521 -0.812521 2.15192E-014 65.4127 103.58)" width="39" height="39"/>
							</g>
							<g>
								<rect class="fil0 str0" x="445" y="135" width="32" height="32"/>
								<rect class="fil0 str0" x="411" y="101" width="32" height="32"/>
								<rect class="fil0 str0" x="377" y="68" width="32" height="32"/>
								<rect class="fil0 str0" x="342" y="34" width="32" height="32"/>
								<rect class="fil0 str0" x="308" width="32" height="32"/>
								<rect class="fil0 str0" transform="matrix(2.14828E-014 -0.812521 0.812521 2.14828E-014 310.345 304.036)" width="39" height="39"/>
								<rect class="fil0 str0" transform="matrix(2.14828E-014 -0.812521 0.812521 2.14828E-014 344.272 269.656)" width="39" height="39"/>
								<rect class="fil0 str0" transform="matrix(2.14828E-014 -0.812521 0.812521 2.14828E-014 377.985 235.328)" width="39" height="39"/>
								<rect class="fil0 str0" transform="matrix(2.14828E-014 -0.812521 0.812521 2.14828E-014 411.587 200.455)" width="39" height="39"/>
							</g>
						</g>
					</g>
				</svg>
			</a>
		</li>
		<li class="search">
			<div class="search-wrapper card">
				<input id="search"><i class="material-icons">search</i>
				<div class="search-results"></div>
			</div>
		</li>
		<li class="bold"><a href="http://materializecss.com/mobile.html" class="waves-effect waves-teal">Dashboard</a></li>
		<li class="bold"><a href="about.html" class="waves-effect waves-teal">Create New Documentation</a></li>
		<li class="bold"><a href="getting-started.html" class="waves-effect waves-teal">Documentation List</a></li>
		<li class="divider"><a>Documentation Sub Menu</a></li>
		<li class="bold sub-menu"><a href="http://materializecss.com/mobile.html" class="waves-effect waves-teal">Add New Categories</a></li>
		<li class="bold sub-menu"><a href="about.html" class="waves-effect waves-teal">Categories List</a></li>
		<li class="bold sub-menu"><a href="http://materializecss.com/mobile.html" class="waves-effect waves-teal">Add New Page</a></li>
		<li class="bold sub-menu"><a href="about.html" class="waves-effect waves-teal">Page List</a></li>
	</ul>
</header>

<main>
	<div class="container-fluid">
		<h5 class="header-title center">Test Documentation Categories</h5>
		<div class="row">
			<div class="col s12">
				<table class="responsive-table highlight">
			        <thead>
			          <tr>
			              <th data-field="id">Name</th>
			              <th data-field="name">Creation Date</th>
			              <th data-field="price">Action</th>
			          </tr>
			        </thead>

			        <tbody>
			          <tr>
			            <td>Alvin</td>
			            <td>Eclair</td>
			            <td>
							<a href="../view_kategori/?id=1" class="green-text tooltipped" data-position="top" data-delay="50" data-tooltip="View"><i class="small material-icons">visibility</i></a>
							<a href="../edit_kategori/?id=1" class="orange-text tooltipped" data-position="top" data-delay="50" data-tooltip="Edit"><i class="small material-icons">edit</i></a>
							<a href="../delete_kategori/?id=1" class="red-text tooltipped" data-position="top" data-delay="50" data-tooltip="Delete"><i class="small material-icons">delete</i></a>
						</td>
			          </tr>
			          <tr>
			            <td>Alan</td>
			            <td>Jellybean</td>
						<td>
							<a href="../view_kategori/?id=1" class="green-text tooltipped" data-position="top" data-delay="50" data-tooltip="View"><i class="small material-icons">visibility</i></a>
							<a href="../edit_kategori/?id=1" class="orange-text tooltipped" data-position="top" data-delay="50" data-tooltip="Edit"><i class="small material-icons">edit</i></a>
							<a href="../delete_kategori/?id=1" class="red-text tooltipped" data-position="top" data-delay="50" data-tooltip="Delete"><i class="small material-icons">delete</i></a>
						</td>
			          </tr>
			          <tr>
			            <td>Jonathan</td>
			            <td>Lollipop</td>
						<td>
							<a href="../view_kategori/?id=1" class="green-text tooltipped" data-position="top" data-delay="50" data-tooltip="View"><i class="small material-icons">visibility</i></a>
							<a href="../edit_kategori/?id=1" class="orange-text tooltipped" data-position="top" data-delay="50" data-tooltip="Edit"><i class="small material-icons">edit</i></a>
							<a href="../delete_kategori/?id=1" class="red-text tooltipped" data-position="top" data-delay="50" data-tooltip="Delete"><i class="small material-icons">delete</i></a>
						</td>
			          </tr>
			        </tbody>
			      </table>
			</div>
  		</div>
	</div>
</main>

<footer class="page-footer grey darken-3" style="bottom:0;">
	<div class="footer-copyright">
		<div class="container-fluid">
			&copy; Copyright 2016 Developed by <a class="red-text text-lighten-3" href="http://kodemerah.com"><b>Kodemerah</b></a>
		</div>
	</div>
</footer>


<!--  Scripts-->
<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="../js/materialize.js"></script>
<script src="../js/init.js"></script>
<script type="text/javascript">
	$('.button-collapse').sideNav({
			menuWidth: 300, // Default is 240
			closeOnClick: true // Closes side-nav on <a> clicks, useful for Angular/Meteor
		}
		);
		$(document).ready(function(){
  $('.scrollspy').scrollSpy();
});

</script>

</body>
</html>
