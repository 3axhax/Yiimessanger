<h1>View User "<?php echo $model->name; ?>"</h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'name',
		'email',
		'status',
		array(
			'name' => 'online',
			'type' => 'boolean'
		),
	),
)); ?>
