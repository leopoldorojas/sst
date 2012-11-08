<?php
/* @var $this ServiceController */
/* @var $model Service */

$this->breadcrumbs=array(
	'Services'=>array('index'),
	'Create',
);

$this->menu=array(
	// array('label'=>'List Service', 'url'=>array('index')),
	array('label'=>'Manage Services', 'url'=>array('admin')),
);

Yii::app()->getClientScript()->registerCoreScript( 'jquery.ui' );
Yii::app()->clientScript->registerCssFile(
    Yii::app()->clientScript->getCoreScriptUrl().
    '/jui/css/base/jquery-ui.css'
);

Yii::app()->clientScript->registerScript('getDate', "
	var dates = $('#Service_delivery_date' ).datepicker({
                dateFormat: 'yy-mm-dd',changeMonth: true,changeYear: true,yearRange: '2008:2020',
       			onSelect: function( selectedDate ) {
            		// var option = this.id == 'seafrom' ? 'minDate' : 'maxDate',
            		var option = 'minDate',
                 	instance = $( this ).data( 'datepicker' ),
                 	date = $.datepicker.parseDate(
                    	instance.settings.dateFormat ||
                      	$.datepicker._defaults.dateFormat,
                      	selectedDate, instance.settings
                    );
            		dates.not( this ).datepicker( 'option', option, date);
       			}
    });
");

?>

<h1>Create Service</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>