<ul class="list-group collapse in" id="<?php echo "collapse".$k; ?>">
	<?php $temp = $name; 
	if (isset($childs) && $childs) { foreach ($childs as $key => $value) {
		$new_name = $temp."_".$key; ?>
	<li class="list-group-item">
		<?php echo form_hidden($new_name, 0); ?>
		<?php echo form_checkbox($new_name, 1,((isset($permissions[$new_name]))?($permissions[$new_name]?TRUE:FALSE):($value['status']?TRUE:FALSE))); ?>
		<?php if (isset($value['childs'])): ?>
			<a href="<?php echo "#collapse".str_replace(".", "", $temp.$key); ?>" data-toggle="collapse">
				<?php echo $value['desc']." (".$new_name.")"; ?>
			</a>
		<?php else: ?>
			<?php echo $value['desc']." (".$new_name.")"; ?>
		<?php endif ?>
		<?php if (isset($value['childs']) && $value['childs']) {
				$name = $new_name;
 				$childs = $value['childs'];
 				$k = str_replace(".", "", $temp.$key);
	 			$this->load->view("child-element",compact("childs","name","k","permissions"));
	 		} ?>
	</li>
	<?php } } ?>
</ul>