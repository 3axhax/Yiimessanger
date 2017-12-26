<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
<div class="<?=(Yii::app()->controller->id == 'messages') ? 'span-19' : ''?>">
	<div id="content">
		<?php echo $content; ?>
	</div><!-- content -->
</div>
<?php if(!Yii::app()->user->isGuest): ?>
<div class="span-5 last">
	<div id="sidebar">
	<?php
		$this->beginWidget('zii.widgets.CPortlet', array(
			'title'=>'Operations',
		));
		$this->widget('zii.widgets.CMenu', array(
			'items'=>$this->menu,
			'htmlOptions'=>array('class'=>'operations'),
		));
		$this->endWidget();
	?>
	</div><!-- sidebar -->
</div>
<?php endif;?>
<?php $this->endContent(); ?>