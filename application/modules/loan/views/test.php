<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<?php if ($array): ?>
		<?php foreach ($array as $key => $value): ?>
			<p style="<?php echo ($key == 0)?'display: block;':'display: none;'; ?>">Element <?php echo $value; ?></p>
		<?php endforeach ?>
	<?php endif ?>
	<button type="button" class="change" style="display: none;">Previous</button>
	<button type="button" class="change" style="display: block;">Next</button>
	<script>
		var current = 1;
		var array = <?php echo json_encode($array) ?>;
		console.log(array);
		document.getElementsByClassName('change',function(){
			
		});
	</script>
</body>
</html>