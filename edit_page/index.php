<?php
	include '../core/db.php';
	
	if(!isset($_GET['documentation']) || $_GET['documentation']== "" || !isset($_GET['category']) || $_GET['category']== "" || !isset($_GET['page']) || $_GET['page']== ""){
		header('location: ../list_page/?documentation='.$_GET['documentation'].'category='.$_GET['category']);
	}
	
	$sql = "SELECT * FROM category WHERE id_documentation=".$_GET['documentation'];
	$result_doc = $conn->query($sql);
	if($result_doc->num_rows < 1){
		header('location: ../list');
	}
	
	$sql = "SELECT * FROM page WHERE id=".$_GET['page'];
	$result_page = $conn->query($sql);
	if($result_page->num_rows < 1){
		header('location: ../list_page/?documentation='.$_GET['documentation'].'category='.$_GET['category']);
	}else{
		$result_page = mysqli_fetch_array($result_page);
	}
?>
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
	<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
  <script>
  tinymce.init({
  selector: 'textarea',
  height: 500,
  plugins: [
        "advlist autolink lists link image charmap print preview anchor",
        "searchreplace visualblocks code fullscreen",
        "insertdatetime media table contextmenu paste imagetools"
    ],
    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
  imagetools_cors_hosts: ['www.tinymce.com', 'codepen.io'],
  content_css: [
    '//fast.fonts.net/cssapi/e6dc9b99-64fe-4292-ad98-6974f93cd2a2.css',
    '//www.tinymce.com/css/codepen.min.css'
  ]
});</script>
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
		<li class="bold"><a href="../dashboard" class="waves-effect waves-teal">Dashboard</a></li>
		<li class="bold"><a href="../create" class="waves-effect waves-teal">Create New Documentation</a></li>
		<li class="bold"><a href="../list" class="waves-effect waves-teal">Documentation List</a></li>
		<li class="divider"><a>Documentation Sub Menu</a></li>
		<li class="bold sub-menu"><a href="../create_category" class="waves-effect waves-teal">Add New Categories</a></li>
		<li class="bold sub-menu"><a href="../list_category" class="waves-effect waves-teal">Categories List</a></li>
	</ul>
</header>

<main class="valign-wrapper">
	<div class="container valign">
		<h5 class="header-title center">Edit '<?php echo $result_page['title']; ?>' Page</h5>
		<div class="row">
    <form class="col s12" action="?documentation=<?php echo $_GET['documentation']; ?>&category=<?php echo $_GET['category']; ?>&page=<?php echo $_GET['page']; ?>" method="post">
      <div class="row">
        <div class="input-field col s6">
          <input id="title" type="text" class="validate" value="<?php echo $result_page['title']; ?>" name="title">
          <label for="title">Page Title</label>
        </div>
		<div class="input-field col s6">
	    <select name="category">
	      <option value="" disabled selected>Choose page category</option>
	      <?php while($row = $result_doc->fetch_assoc()) { ?>
	      <option value="<?php echo $row['id']; ?>" <?php if($row['id']==$_GET['category']) echo 'selected' ?>><?php echo $row['name']; ?></option>
	      <?php } ?>
	    </select>
	    <label>Select Category</label>
	  </div>
      </div>
	  <div class="row">
        <div class="input-field col s12">
          <textarea id="textarea1" name="content"><?php echo $result_page['content']; ?></textarea>
        </div>
	  </div>
	  <div class="row">
		  <div class="input-field col s12 center-align">
  			<button class="btn waves-effect waves-light green" type="submit" name="submit">Save Changes
  			  <i class="material-icons right">done</i>
  			</button>
  		</div>
	  </div>
    </form>
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
  $('select').material_select();
});
</script>

</body>
</html>
<?php
	
	if(isset($_POST['submit'])){
		if($_POST['title'] != "" && $_POST['content'] != "" && $_POST['category'] != ""){
			$sql = "UPDATE page SET title = '".mysql_escape_string($_POST['title'])."', id_category=".$_POST['category'].", content='".$_POST['content']."' WHERE id = ".$_GET['page'];

			if ($conn->query($sql) === TRUE) {?>
			    <script>
			    	 Materialize.toast('Insert Success', 2000,'',function(){window.location = "../list_page/?documentation=<?php echo $_GET['documentation']; ?>&category=<?php echo $_GET['category']; ?>";});
			    </script>
			<?php } else { ?>
			    <script>
			    	 Materialize.toast('Insert Failed', 4000);
			    </script>
			<?php }
			
			$conn->close();
		}
	}
?>