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
				<h1>Slider List</h1>
				<a href="<?php echo base_url("admin/addSliderPage") ?>" class="btn btn-primary">Add Slider</a>
				<table class="table table-responsive table-inverse">
					<thead>
						<tr>
							<th>S. No.</th>
							<th>Heading</th>
							<th>Title</th>
							<th>Description</th>
							<th>Image</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php if ($slider): ?>
							<?php foreach ($slider as $key => $value): ?>
								<tr>
									<td><?php echo $key+1; ?></td>
									<td><?php echo $value['heading']; ?></td>
									<td><?php echo $value['title']; ?></td>
									<td><?php echo $value['description']; ?></td>
									<td>
										<img src="<?php echo base_url($value['asset_path']); ?>" style="width: 150px;">
									</td>
									<td>
										<a href="javascript:void(0)" class="btn btn-primary deleteSlider" data-id="<?php echo $value['id']; ?>">
											Delete
										</a>
										<a href="<?php echo base_url("admin/editSliderPage/".$value['id']) ?>" class="btn btn-primary">
											Edit
										</a>
									</td>
								</tr>
							<?php endforeach ?>
						<?php endif ?>
					</tbody>
				</table>
			</div>
		</div><!-- /.container -->
		


		<script type="text/javascript">
			var site_url =  "<?php echo base_url() ?>";
			$(".deleteSlider").on("click",function(){
				if (confirm("Really want to delete the slider?")) {
					var that = this;
					$.ajax({
						url: site_url+"admin/deleteSlider",
						data: {id:$(this).data("id")},
						type:"POST",
						success: function(response){
							if (response == 1) {
								$(that).closest("tr").remove();
							}
						}
					});
				}
			});
		</script>
<?php echo $this->load->view("admin/footer.php"); ?>