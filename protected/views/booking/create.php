<?php
/* @var $this BookingController */
/* @var $model Booking */

$this->breadcrumbs=array(
	'Bookings'=>array('index'),
	'Create',
);

$this->menu=array(
	// array('label'=>'List Booking', 'url'=>array('index')),
	array('label'=>'Manage Bookings', 'url'=>array('admin')),
);

Yii::app()->getClientScript()->registerCoreScript( 'jquery.ui' );
Yii::app()->clientScript->registerCssFile(
    Yii::app()->clientScript->getCoreScriptUrl().
    '/jui/css/base/jquery-ui.css'
);

Yii::app()->clientScript->registerScript('getDate', "
	var dates = $('#Booking_traveldate' ).datepicker({
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

<h1>Create Booking</h1>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>