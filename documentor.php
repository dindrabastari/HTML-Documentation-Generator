<?php
	include 'core/db.php';
	
	$categories = array();
	$pages = array();
	
	if(!isset($_GET['documentation']) || $_GET['documentation']==""){
		header('location: list/');
	}
	
	$sql = "SELECT * FROM documentation WHERE id=".$_GET['documentation'];
	$result_doc = $conn->query($sql);
	if($result_doc->num_rows < 1){
		header('location: list/');
	}else{
		$result_doc = mysqli_fetch_assoc($result_doc);
	}
	
	$sql = "SELECT * FROM category WHERE id_documentation=".$_GET['documentation'];
	$result_cat = $conn->query($sql);
	if($result_cat->num_rows < 1){
		header('location: list/');
	}
	
	$folderName = documentationFolderName($result_doc['title']);
	
	if(!file_exists("documentor/".$folderName)){
		mkdir("documentor/".$folderName);
		mkdir("documentor/".$folderName."/css/");
		mkdir("documentor/".$folderName."/js/");
		mkdir("documentor/".$folderName."/fonts/");
		mkdir("documentor/".$folderName."/fonts/roboto");
		
		copy("css/materialize.min.css", "documentor/".$folderName."/css/materialize.min.css");
		copy("css/materialize.css", "documentor/".$folderName."/css/materialize.css");
		copy("css/style.css", "documentor/".$folderName."/css/style.css");
		
		copy("js/materialize.min.js", "documentor/".$folderName."/js/materialize.min.js");
		copy("js/materialize.js", "documentor/".$folderName."/js/materialize.js");
		copy("js/init.js", "documentor/".$folderName."/js/init.js");
		
		copy("fonts/roboto/Roboto-Bold.eot", "documentor/".$folderName."/fonts/roboto/Roboto-Bold.eot");
		copy("fonts/roboto/Roboto-Bold.ttf", "documentor/".$folderName."/fonts/roboto/Roboto-Bold.ttf");
		copy("fonts/roboto/Roboto-Bold.woff", "documentor/".$folderName."/fonts/roboto/Roboto-Bold.woff");
		copy("fonts/roboto/Roboto-Bold.woff2", "documentor/".$folderName."/fonts/roboto/Roboto-Bold.woff2");
		
		copy("fonts/roboto/Roboto-Light.eot", "documentor/".$folderName."/fonts/roboto/Roboto-Light.eot");
		copy("fonts/roboto/Roboto-Light.ttf", "documentor/".$folderName."/fonts/roboto/Roboto-Light.ttf");
		copy("fonts/roboto/Roboto-Light.woff", "documentor/".$folderName."/fonts/roboto/Roboto-Light.woff");
		copy("fonts/roboto/Roboto-Light.woff2", "documentor/".$folderName."/fonts/roboto/Roboto-Light.woff2");
		
		copy("fonts/roboto/Roboto-Regular.eot", "documentor/".$folderName."/fonts/roboto/Roboto-Regular.eot");
		copy("fonts/roboto/Roboto-Regular.ttf", "documentor/".$folderName."/fonts/roboto/Roboto-Regular.ttf");
		copy("fonts/roboto/Roboto-Regular.woff", "documentor/".$folderName."/fonts/roboto/Roboto-Regular.woff");
		copy("fonts/roboto/Roboto-Regular.woff2", "documentor/".$folderName."/fonts/roboto/Roboto-Regular.woff2");
		
		copy("fonts/roboto/Roboto-Thin.eot", "documentor/".$folderName."/fonts/roboto/Roboto-Thin.eot");
		copy("fonts/roboto/Roboto-Thin.ttf", "documentor/".$folderName."/fonts/roboto/Roboto-Thin.ttf");
		copy("fonts/roboto/Roboto-Thin.woff", "documentor/".$folderName."/fonts/roboto/Roboto-Thin.woff");
		copy("fonts/roboto/Roboto-Thin.woff2", "documentor/".$folderName."/fonts/roboto/Roboto-Thin.woff2");
	}
	
	
	while($cat = $result_cat->fetch_assoc()){
		array_push($categories, $cat);
		$folderCat = documentationFolderName($cat['name']);
		if(!file_exists("documentor/".$folderName."/".$folderCat)){
			mkdir("documentor/".$folderName."/".$folderCat);
		}
		
		$sql = "SELECT page.title, category.name, page.content FROM page JOIN category ON page.id_category = category.id WHERE id_category=".$cat['id'];
		$result_page = $conn->query($sql);
		if($result_page->num_rows > 0){
			while($page = $result_page->fetch_assoc()){
				array_push($pages, $page);
			}
		}
	}
	
	foreach($pages as $page){
		$folderCat = documentationFolderName($page['name']);
		$fileName = documentationFolderName($page['title']);
		$pageFile = fopen("documentor/".$folderName."/".$folderCat."/".$fileName.".html", "w") or die("Unable to open file!");
		$txt = createPage($page, $categories, $pages);
		fwrite($pageFile, $txt);
		fclose($pageFile);
	}

	function documentationFolderName($a){
		$b = split(" ", $a);
		$n = "";
		foreach($b as $k => $v){
			if($k == 0){
				$n = $n . $v;
			}else{
				$n = $n . "-" . $v;
			}
		}
		return $n;
	}
	
	function createTOC($a){
		$h = '<div class="container-fluid"><h5 class="toc-header"><b>Table of Contents</b></h5><ul class="toc">';
		$bd = "";
		$f = '</ul></div>';
		
		foreach($a as $c){
			$cl = documentationFolderName($c['name']);
			$bd = $bd . '<li class="toc-item"><a href="#'.$cl.'">'.$c['name'].'</a></li>';
		}
		return $h . $bd . $f;
	}
	
	function createPageList($a, $b){
		$res = array();
		foreach($a as $c){
			$cl = documentationFolderName($c['name']);
			$h = '<div class="container-fluid scrollspy" id="'.$cl.'"><h5 class="list-header"><b>'.$c['name'].'</b></h5><ul class="list">';
			$f = '</ul></div>';
			$bd = '';
			foreach($b as $d){
				$dl = documentationFolderName($d['title']);
				if($c['name'] == $d['name'])
					$bd = $bd . '<li class="list-item"><a href="'.$cl.'/'.$dl.'.html">'.$d['title'].'</a></li>';
			}
			array_push($res, $h.$bd.$f);
		}
		return $res;
	}
	
	function createMenu($a, $b){
		$res = array();
		foreach($a as $c){
			$cl = documentationFolderName($c['name']);
			$h = '<li class="bold"><a class="collapsible-header  waves-effect waves-teal">'.$c['name'].'</a><div style="" class="collapsible-body"><ul>';
			$f = '</ul></div></li>';
			$bd = '';
			foreach($b as $d){
				$dl = documentationFolderName($d['title']);
				if($c['name'] == $d['name']){
					$bd = $bd . '<li><a href="../'.$cl.'/'.$dl.'.html">'.$d['title'].'</a></li>';
				}
			}
			array_push($res, $h.$bd.$f);
		}
		$balik = '';
		foreach($res as $v){
			$balik = $balik.$v;
		}
		
		return $balik;
	}
	
	function createPage($a, $c, $p){
		$head = '<!DOCTYPE html>
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
				<div class="nav-wrapper"><a class="page-title">Administrator Guide Sinona > Login</a></div>
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
		<li class="no-padding">
			<ul class="collapsible collapsible-accordion">
				'.createMenu($c, $p).'
			</ul>
		</li>
	</ul>
</header>';
		$foot = '<footer class="page-footer grey darken-3" style="bottom:0;">
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
$(".button-collapse").sideNav({
	menuWidth: 300, // Default is 240
	closeOnClick: true // Closes side-nav on <a> clicks, useful for Angular/Meteor
}
);
$(document).ready(function(){
  $(".scrollspy").scrollSpy();
});

</script>

</body>
</html>';
		$body = '<main>
	<div class="container-fluid">
		<h5 class="toc-header"><b>'.$a['name'].'</b></h5>
	</div>
	<div class="container-fluid">
		<h5 class="list-header"><b>'.$a['title'].'</b></h5>
		<p>'.$a['content'].'</p>
	</div>
</main>';
		return $head.$body.$foot;
	}
?>