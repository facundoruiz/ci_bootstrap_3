
<?php $this->layout('layouts::base') ?>

<?php $this->start('scripts_crud') ?>
<?php
	// append scripts to <head>
	if ( !empty($crud_data) )
	{
		foreach ($crud_data->css_files as $file)
			echo "<link href='$file' rel='stylesheet'>".PHP_EOL;

		foreach ($crud_data->js_files as $file)
			echo "<script src='$file'></script>".PHP_EOL;
	}
?>
<?php $this->stop() ?>

<?php if ( !empty($crud_note) ) echo "<p>$crud_note</p>"; ?>

<?php echo box_open($title); ?>
<?php if ( !empty($crud_data) ) echo $crud_data->output; ?>
<?php echo box_close('Seleccione las img a cargar, tambien podra reubicarlas'); ?>

