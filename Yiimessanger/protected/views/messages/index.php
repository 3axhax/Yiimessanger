<?php

$this->menu=array(
	array('label'=>'Incoming Messages', 'url'=>array('index', 'inOut' => 'in')),
	array('label'=>'Outgoing Messages', 'url'=>array('index', 'inOut' => 'out')),
);
?>

<h1>
	<?php
	if ($model->inOut == 'in') echo 'Incoming';
	if ($model->inOut == 'out') echo 'Outcoming';
	?>
	Messages</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'messages-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=> (isset($column))?
        $column :
        array(
		array(
			'name' => 'id_sender',
			'value' => 'Users::model()->findByPk($data->id_sender)->name',
		),
        array(
			'name' => 'id_response',
			'value' => 'Users::model()->findByPk($data->id_response)->name',
		),
		'message',
		'time',
		array(
			'class'=>'CButtonColumn',
            'template' => '{view}&nbsp;{message}',
            'buttons'=>array
            (
                'view' => array
                (
                    'imageUrl' => Yii::app()->request->baseUrl.'/images/view-16.png',
                ),
                'message' => array
                (
                    'label'=>'Answer',
                    'url'=>'Yii::app()->getUrlManager()->createUrl("/messages/create", array("id_response" => $data->id_response))',
                    'imageUrl' => Yii::app()->request->baseUrl.'/images/answer-16.png',
                ),
            ),
		),
	),
));
?>
