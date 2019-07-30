<?php echo $this->load->view("admin/header.php"); ?>

	<body>
		<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
			<a class="navbar-brand" href="#">Navbar</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarsExampleDefault">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item active">
						<a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">Link</a>
					</li>
					<li class="nav-item">
						<a class="nav-link disabled" href="#">Disabled</a>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="http://example.com" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
						<div class="dropdown-menu" aria-labelledby="dropdown01">
							<a class="dropdown-item" href="#">Action</a>
							<a class="dropdown-item" href="#">Another action</a>
							<a class="dropdown-item" href="#">Something else here</a>
						</div>
					</li>
				</ul>
				<form class="form-inline my-2 my-lg-0">
					<input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
					<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
				</form>
			</div>
		</nav>

		<div class="container" style="margin-top: 100px;">
			<div class="starter-template">
				<h1><?php echo (isset($status) && $status == 1)?"Edit":"Add"; ?> Slider</h1>
				<form action="<?php echo $action ?>" method="POST" enctype="multipart/form-data">
					<?php if (isset($status) && $status == 1): ?>
						<input type="hidden" name="id" value="<?php echo $slider['id'] ?>">
					<?php endif ?>
					<div class="form-group row">
						<label class="col-sm-2 form-control-label">Heading</label>
						<div class="col-sm-10">
							<input type="text" name="heading" class="form-control" value="<?php echo (isset($slider['heading']) && $slider['heading']!="")?$slider['heading']:""; ?>" placeholder="Heading">
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-2 form-control-label">Title</label>
						<div class="col-sm-10">
							<input type="text" name="title" class="form-control" value="<?php echo (isset($slider['title']) && $slider['title']!="")?$slider['title']:""; ?>" placeholder="Title">
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-2 form-control-label">Description</label>
						<div class="col-sm-10">
							<textarea name="description" cols="75" rows="10" placeholder="Description"><?php echo (isset($slider['description']) && $slider['description']!="")?$slider['description']:""; ?></textarea>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-2 form-control-label">Description</label>
						<div class="col-sm-10">
							<input type="file" name="image">
						</div>
					</div>
					<div class="form-group row">
						<div class="col-sm-offset-2 col-sm-10">
							<button type="submit" class="btn btn-secondary"><?php echo $button; ?></button>
						</div>
					</div>
				</form>
			</div>
		</div><!-- /.container -->
<?php echo $this->load->view("admin/footer.php"); ?>