<?php
/**
 * Lombardia Informatica S.p.A.
 * OPEN 2.0
 *
 *
 * @package    @vendor/open20/amos-events/src/views 
 */
use open20\amos\core\helpers\Html;
use open20\amos\core\views\DataProviderView;
use yii\widgets\Pjax;

/**
* @var yii\web\View $this
* @var yii\data\ActiveDataProvider $dataProvider
 * @var open20\amos\events\models\EventCalendarsSlotsSearch $model
*/

$this->title = Yii::t('amoscore', 'Event Calendars Slots');
$this->params['breadcrumbs'][] = ['label' => '', 'url' => ['/events']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="event-calendars-slots-index">
                <?=   $this->render('_search', ['model' => $model, 'originAction' => Yii::$app->controller->action->id ]); ?>
    
            <?= DataProviderView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $model,
   'currentView' => $currentView,
   'gridView' => [
   'columns' => [
        ['class' => 'yii\grid\SerialColumn'],

                    'event_calendars_id',
            'date:date',
            ['attribute'=>'hour_start','format'=>['time',(isset(Yii::$app->modules['datecontrol']['displaySettings']['time'])) ? Yii::$app->modules['datecontrol']['displaySettings']['time'] : 'H:i:s A']],
            ['attribute'=>'hour_end','format'=>['time',(isset(Yii::$app->modules['datecontrol']['displaySettings']['time'])) ? Yii::$app->modules['datecontrol']['displaySettings']['time'] : 'H:i:s A']],
            'user_id',

                        'user' => [
                        'attribute' => 'user',
                        'format' => 'html',
                        'label' => 'Utente',
                        'value' => function($model){
                        return strip_tags($model->user);
                        }
                        ],
                            [
        'class' => 'open20\amos\core\views\grid\ActionColumn',
        ],
        ],
        ],
        /*'listView' => [
        'itemView' => '_item',
        'masonry' => FALSE,

        // Se masonry settato a TRUE decommentare e settare i parametri seguenti 
        // nel CSS settare i seguenti parametri necessari al funzionamento tipo
        // .grid-sizer, .grid-item {width: 50&;}
        // Per i dettagli recarsi sul sito http://masonry.desandro.com                                     

        //'masonrySelector' => '.grid',
        //'masonryOptions' => [
        //    'itemSelector' => '.grid-item',
        //    'columnWidth' => '.grid-sizer',
        //    'percentPosition' => 'true',
        //    'gutter' => '20'
        //]
        ],
        'iconView' => [
        'itemView' => '_icon'
        ],
        'mapView' => [
        'itemView' => '_map',          
        'markerConfig' => [
        'lat' => 'domicilio_lat',
        'lng' => 'domicilio_lon',
        'icon' => 'iconMarker',
        ]
        ],
        'calendarView' => [
        'itemView' => '_calendar',
        'clientOptions' => [
        //'lang'=> 'de'
        ],
        'eventConfig' => [
        //'title' => 'titleEvent',
        //'start' => 'data_inizio',
        //'end' => 'data_fine',
        //'color' => 'colorEvent',
        //'url' => 'urlEvent'
        ],
        'array' => false,//se ci sono più eventi legati al singolo record
        //'getEventi' => 'getEvents'//funzione da abilitare e implementare nel model per creare un array di eventi legati al record
        ]*/
        ]); ?>
    
</div>
