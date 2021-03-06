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
		<?php echo $form->label($model,'id_sender', array('label' => 'From: '.Yii::app()->user->name)); ?>
		<?php echo $form->textField($model,'id_sender', array('hidden'=>true, 'value' => Yii::app()->user->name)); ?>
		<?php echo $form->error($model,'id_sender'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_response', array('label' => 'To: '.Users::model()->findByPk($model->id_response)->name)); ?>
		<?php //echo $form->dropDownList($model,'id_response', Messages::getUserList($list), array('options' => [$model->id_response =>['selected'=>true]])); ?>
		<?php echo $form->textField($model,'id_response', array('hidden'=>true, 'value' => $model->id_response)); ?>
		<?php echo $form->error($model,'id_response'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'message'); ?>
		<?php
		if (Users::isUserInContactList($model->id_response)) echo $form->textArea($model,'message',array('rows'=>6, 'cols'=>50,));
		else echo $form->textArea($model, 'message', array('rows' => 6, 'cols' => 50, 'disabled' => true, 'value' => 'Please add me to your contact list'));
			?>
		<?php echo $form->error($model,'message'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Sent'); ?>
	</div>

<?php $this->endWidget(); ?>
</div><!-- form -->