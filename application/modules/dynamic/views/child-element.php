<ul class="list-group collapse in" id="<?php echo "collapse".$k; ?>">
	<?php $temp = $name; 
	if (isset($childs) && $childs) { foreach ($childs as $key => $value) {
		$new_name = $temp.".".$key; ?>
	<li class="list-group-item">
		<?php echo form_hidden($new_name, 0); ?>
		<?php echo form_checkbox($new_name, 1,(($value['status'])?TRUE:FALSE)); ?>
		<?php if (isset($value['childs'])): ?>
			<a href="<?php echo "#collapse".str_replace(".", "", $temp.$key); ?>" data-toggle="collapse">
				<?php echo $value['desc']; ?>
			</a>
		<?php else: ?>
			<?php echo $value['desc']; ?>
		<?php endif ?>
		<a href="javascript:void(0)" class="addItem" data-parent="<?php echo $new_name ?>"><i class="fa fa-plus"></i></a>
		<!-- <a href="javascript:void(0)" class="deleteItem" data-parent="<?php //echo $new_name ?>"><i class="fa fa-trash"></i></a> -->
		<?php if (isset($value['childs']) && $value['childs']) {
				$name = $new_name;
 				$childs = $value['childs'];
 				$k = str_replace(".", "", $temp.$key);
	 			$this->load->view("child-element",compact("childs","name","k"));
	 		} ?>
	</li>
	<?php } } ?>
</ul>