<?php
/* @var $this MessagesController */
/* @var $data Messages */
?>

<div class="view">

	<?php $this->widget('zii.widgets.CDetailView', array(
		'data'=>$model,
		'attributes'=>array(
			array(
				'name' => 'id_sender',
				'value' => Users::model()->findByPk($model->id_sender)->name,
			),
			array(
				'name' => 'id_response',
				'value' => Users::model()->findByPk($model->id_response)->name,
			),
			'message',
			'time',
		),
	)); ?>
</div>