<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!-- Bootstrap CSS -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
		<link rel="stylesheet" href="assets/style/style.css" />
		<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
		<link rel="icon" href="./assets/images/logo.jpg" type="image/gif" sizes="16x16" />
		<script src="https://kit.fontawesome.com/4907713ded.js" crossorigin="anonymous"></script>
		<title>Project akhir pweb</title>
		<style>
			#a {
				text-transform: capitalize;
			}
		</style>

	</head>
	<body>
		<!-- navbar start -->
		<nav class="navbar navbar-expand-lg navbar-light" id="Home">
			<div class="container">
				<div class="logo">
					<a class="navbar-brand" href="#"> Food.in </a>
				</div>
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarNav">
					<ul class="navbar-nav">
						<li class="nav-item">
							<a class="nav-link active" aria-current="page" href="#">Home</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#">Menu</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#">About</a>
						</li>
					</ul>
				</div>
			</div>
		</nav>
		<!-- navbar end -->

		<!-- Header Start -->
		<div class="bg">
			<section class="container">
				<div class="row header-component">
					<section class="col-lg-6 text-center">
						<h1>Food.in</h1>
						<p>Website untuk membantu anda menemukan makanan favorit kalian. Temukan makanan Favorit kalian disini.</p>
					</section>
				</div>
			</section>
		</div>
		<!-- Header End -->

		<!-- search and sorting start-->
		<div class="search container mt-5">
			<div class="card">
				<h5 class="card-header">Search and Sort</h5>
				<div class="card-body">
					<div class="row">
						<div class="col-lg-6 col-sm-12">
							Cari Makanan
							<form class="d-flex">
								<input class="form-control me-2" id="carii" name="carii" type="search" placeholder="Search" aria-label="Search" />
								<button class="btn btn-outline-primary" type="submit">Search</button>
							</form>
						</div>
						<div class="col-lg-6 col-sm-12">
							Jenis Makanan
							<select class="form-select" id="jenis">
								<option value="">Open this select menu</option>
								<option value="1">Appetizer</option>
								<option value="2">Main Course</option>
								<option value="3">Dessert</option>
							</select>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- search and sorting end -->

		<div class="container our-menu mt-5">
			<div class="text-center">
				<h3>Our Menu</h3>
				<p>select your favorit food</p>
			</div>
		</div>

		<div class="button-tambah-data">
			<div class="container mb-2 mt-2">
				<a href="form.html"
					><button type="button" class="btn btn-primary text-white">
						<i class="fa-solid fa-plus"></i>
						Tambah
					</button>
				</a>
			</div>
		</div>

		<main>
			<div class="container mt-5">
				<div class="row services-list" id="data">
				</div>
			</div>
		</main>

		<div class="button-load-more mt-4">
			<div class="container">
				<div class="d-grid gap-2">
					<button class="btn btn-primary" id="Load" type="button"><i class="fa-solid fa-circle-chevron-down me-2"></i>Load More</button>
				</div>
			</div>
		</div>

		<div class="footer">
			<footer class="container mt-5">
				<div class="row">
					<div class="col-md-3">
						<h4>Food.in</h4>
						<p>Tempat anda mencari inovasi menu masakan</p>
					</div>
					<div class="col-md-3 ms-auto">
						<h4>About</h4>
						<ul class="list-unstyled">
							<a href="" class="text-decoration-none"><li>About Food.in</li></a>
							<a href="" class="text-decoration-none"><li>Career</li></a>
							<a href="" class="text-decoration-none"><li>Privacy Policy</li></a>
							<a href="" class="text-decoration-none"><li>FAQ</li></a>
						</ul>
					</div>
					<div class="col-md-3">
						<h4>Social media</h4>
						<ul class="list-unstyled">
							<a href="" class="text-decoration-none"><li>Instagram</li></a>
							<a href="" class="text-decoration-none"><li>Twitter</li></a>
							<a href="" class="text-decoration-none"><li>Tiktok</li></a>
							<a href="" class="text-decoration-none"><li>Youtube</li></a>
						</ul>
					</div>
				</div>

				<div class="row mt-3 copyright">
					<div class="col">
						<p class="text-center">Copyright Food.in 2022</p>
					</div>
				</div>
			</footer>
		</div>

		<!-- Optional JavaScript; choose one of the two! -->
		<!-- Option 1: Bootstrap Bundle with Popper -->
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
		<script>
			var page = 0;
			var Jenis = ["Appetizer", "Main Course", "Dessert"];
			
			$(document).ready(function () {
				$("#Load").click(function (){
					$.get("makanan.php?start=" + page, function (response) {
						$.each(response, function (key, value) {
							$("#data").append("<div class='col-lg-4 col-md-6 col-sm-12'>"+
									"<div class='card card-services'>"+
										"<div class='card-services-img'>"+
											"<img src='./assets/images/menu-1.jpg' class='card-img-top' alt='./assets/images/no_image.jpg'>"+
										"</div>"+
										"<div class='card-body'>"+
											"<h5 class='card-title' id='a'>"+ value.nama_makanan +"</h5>"+
											"<p class='card-text'>Cocok untuk makanan penutup.. <a href='#'> more details</a></p>"+
										"</div>"+
										"<div class='card-footer'>"+
											"<small>Jenis : "+ Jenis[(value.jenis_id)-1] +"</small>"+
											"<button type='button' class='fa-solid fa-pen-to-square fa-lg btn edit-btn mb-2 mt-2'></button>"+
											"<button type='button' class='fa-solid fa-trash fa-lg btn delete-btn  mb-2 mt-2'></button>"+
										"</div>"+
									"</div>"+
								"</div>")
						});
						page += 6;
					}); 
				}).trigger("click");
			});

			
			
		</script>


		<script src="ajax.js"></script>

	</body>
</html>
