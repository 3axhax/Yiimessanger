<?php
/* @var $this MessagesController */
/* @var $data Messages */
?>

<div class="view">

<!--	<b>--><?php //echo CHtml::encode($data->getAttributeLabel('id')); ?><!--:</b>-->
	<b><?php echo CHtml::encode($data->id); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<!--<b><?php /*echo CHtml::encode($data->getAttributeLabel('id_sender')); */?>:</b>
	<?php /*echo CHtml::encode($data->id_sender); */?>
	<br />

	<b><?php /*echo CHtml::encode($data->getAttributeLabel('id_response')); */?>:</b>
	<?php /*echo CHtml::encode($data->id_response); */?>
	<br />

	<b><?php /*echo CHtml::encode($data->getAttributeLabel('message')); */?>:</b>
	<?php /*echo CHtml::encode($data->message); */?>
	<br />

	<b><?php /*echo CHtml::encode($data->getAttributeLabel('time')); */?>:</b>
	<?php /*echo CHtml::encode($data->time); */?>
	<br />

	<b><?php /*echo CHtml::encode($data->getAttributeLabel('seen')); */?>:</b>
	<?php /*echo CHtml::encode($data->seen); */?>
	<br />-->


</div>