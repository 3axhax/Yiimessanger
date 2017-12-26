<?php
/* @var $this MessagesController */
/* @var $model Messages */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'messages-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->label($model,'id_sender'); ?>
		<?php echo $form->textField($model,'id_sender', array('disabled'=>true, 'value' => Yii::app()->user->name)); ?>
		<?php echo $form->error($model,'id_sender'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_response'); ?>
		<?php echo $form->dropDownList($model,'id_response', Messages::getUserList(), array('options' => [$model->id_response =>['selected'=>true]])); ?>
		<?php echo $form->error($model,'id_response'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'message'); ?>
		<?php echo $form->textArea($model,'message',array('rows'=>6, 'cols'=>50,)); ?>
		<?php echo $form->error($model,'message'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Sent'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->