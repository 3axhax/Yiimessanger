<?php
$this->menu=array(
	array('label'=>'All Users', 'url'=>array('index')),
	array('label'=>'Contact List', 'url'=>array('index', 'contact_list' => true)),
);
?>

<h1>Users <?= ($contact_list == 'contact list') ? 'Contact' : ''?> List</h1>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'users-grid',
	'dataProvider'=>$model->search($contact_list),
	'filter'=>$model,
	'columns'=>array(
		//'id',
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
            'template' => '{view}&nbsp;{message}&nbsp;{request}',
            'buttons'=>array
            (
                'view' => array
                (
                    'imageUrl' => Yii::app()->request->baseUrl.'/images/view-16.png',
                ),
                'message' => array
                (
					'visible' => '!Yii::app()->user->isGuest && Users::isUserInContactList($data->id)',
                    'label'=>'Sent message',
					'url'=>'Yii::app()->getUrlManager()->createUrl("/messages/create", array("id_response" => $data->id))',
                    'imageUrl' => Yii::app()->request->baseUrl.'/images/message-16.png',
                ),
				'request' => array
                (
					'visible' => '!Yii::app()->user->isGuest && !Users::isUserInContactList($data->id) && !Users::isRequestToContactList($data->id) && $data->id != Yii::app()->user->id',
                    'label'=>'Request to added on Contact List',
					'url'=>'Yii::app()->getUrlManager()->createUrl("/messages/create", array("id_response" => $data->id, "request" => true))',
                    'imageUrl' => Yii::app()->request->baseUrl.'/images/add-contact-16.png',
                ),
            ),
		),
	),
)); ?>
