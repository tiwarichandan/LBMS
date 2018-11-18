<?php
	include 'includes/session.php';

	if(isset($_POST['add'])){
		$isbn = $_POST['isbn'];
		$title = $_POST['title'];
		$category = $_POST['category'];
		$author = $_POST['author'];
		$publisher = $_POST['publisher'];
		$pub_date = $_POST['pub_date'];
		$pdf = $_FILES['pdf']['name'];
		$pdf_temp = $_FILES['pdf']['tmp_name'];
		$path ='../pdf/'.$pdf;
		
				copy($_FILES['pdf']['tmp_name'], $path);


		$sql = "INSERT INTO books (isbn, category_id, title, author, publisher, publish_date,pdf) VALUES ('$isbn', '$category', '$title', '$author', '$publisher', '$pub_date','$pdf')" ;
		if($conn->query($sql)){

			$_SESSION['success'] = 'Book added successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}	
	else{
		$_SESSION['error'] = 'Fill up add form first';
	}

	header('location: book.php');

?>