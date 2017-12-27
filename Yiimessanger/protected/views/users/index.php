<?php
$this->menu=array(
	array('label'=>'All Users', 'url'=>array('index')),
	array('label'=>'Contact List', 'url'=>array('index', 'contact_list' => true)),
);
?>

<h1>Users List</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'users-grid',
	'dataProvider'=>$model->search($contact_list),
	'filter'=>$model,
	'columns'=>array(
		'name',
		'email',
		'status',
		array(
			'name' => 'online',
			'value' => '$data->getOnlineStatus()',
            'type' => 'boolean',
		),
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
                    'label'=>'Sent message',
					'url'=>'Yii::app()->getUrlManager()->createUrl("/messages/create", array("id_response" => $data->id))',
                    'imageUrl' => Yii::app()->request->baseUrl.'/images/message-16.png',
                ),
            ),
		),
	),
)); ?>
