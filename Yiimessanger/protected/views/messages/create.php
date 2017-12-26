<?php
/* @var $this MessagesController */
/* @var $model Messages */


$this->menu=array(
	array('label'=>'Incoming Messages', 'url'=>array('index', 'inOut' => 'in')),
	array('label'=>'Outgoing Messages', 'url'=>array('index', 'inOut' => 'out')),
);
?>

<h1>Create Messages</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>