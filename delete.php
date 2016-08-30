<?php
	include('core/db.php');
	if(!isset($_GET['type']) || $_GET['type']==""){
		header('location: list/');
	}else{
		if($_GET['type'] == "documentation"){
			if(!isset($_GET['documentation']) || $_GET['documentation']==""){
				header('location: list/');
			}else{
				$sql = "DELETE FROM documentation WHERE id=".$_GET['documentation'];
				$conn->query($sql);
				$sql = "SELECT id FROM category WHERE id_documentation=".$_GET['documentation'];
				$category = $conn->query($sql);
				while($row = $category->fetch_assoc()){
					$sql = "DELETE FROM page WHERE id_category=".$row['id'];
					$conn->query($sql);
				}
				$sql = "DELETE FROM category WHERE id_documentation=".$_GET['documentation'];
				$conn->query($sql);
				header('location: list/');
			}
		}else if($_GET['type'] == "category"){
			if(!isset($_GET['category']) || $_GET['category']==""){
				header('location: list/');
			}else{
				$sql = "DELETE FROM category WHERE id=".$_GET['category'];
				$conn->query($sql);
				$sql = "DELETE FROM page WHERE id_category=".$_GET['category'];
				$conn->query($sql);
				header('location: list/');
			}
		}else if($_GET['type'] == "page"){
			if(!isset($_GET['page']) || $_GET['page']==""){
				header('location: list/');
			}else{
				$sql = "DELETE FROM page WHERE id=".$_GET['page'];
				$conn->query($sql);
				header('location: list/');
			}
		}else{
			header('location: list/');
		}
	}
?>