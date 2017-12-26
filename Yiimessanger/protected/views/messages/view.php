<?php
/* @var $this MessagesController */
/* @var $model Messages */

$this->menu=array(
	array('label'=>'Incoming Messages', 'url'=>array('index', 'inOut' => 'in')),
	array('label'=>'Outgoing Messages', 'url'=>array('index', 'inOut' => 'out')),
	(($model->id_sender != Yii::app()->user->id) ? array('label'=>'Answer', 'url'=>array('create', 'id_response' => $model->id_sender)) : NULL),
);
?>

<h1>View Message</h1>

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
