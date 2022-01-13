<?php

namespace open20\amos\events\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "event_push_notification".
 */
class EventPushNotification extends \open20\amos\events\models\base\EventPushNotification
{
    const TYPE_SAVE_THE_DATE = 'save_the_date';
    const TYPE_INVITE_REGISTER = 'registration_email';
    const TYPE_NEW_CONTENT = 'new_content';

    const STATUS_DRAFT = 'draft';
    const STATUS_SENT = 'sent';

    public function representingColumn()
    {
        return [
//inserire il campo o i campi rappresentativi del modulo
        ];
    }

    public function attributeHints()
    {
        return [
        ];
    }

    /**
     * Returns the text hint for the specified attribute.
     * @param string $attribute the attribute name
     * @return string the attribute hint
     */
    public function getAttributeHint($attribute)
    {
        $hints = $this->attributeHints();
        return isset($hints[$attribute]) ? $hints[$attribute] : null;
    }

    public function rules()
    {
        return ArrayHelper::merge(parent::rules(), [
        ]);
    }

    public function attributeLabels()
    {
        return
            ArrayHelper::merge(
                parent::attributeLabels(),
                [
                ]);
    }


    public static function getEditFields()
    {
        $labels = self::attributeLabels();

        return [
            [
                'slug' => 'event_id',
                'label' => $labels['event_id'],
                'type' => 'integer'
            ],
            [
                'slug' => 'type',
                'label' => $labels['type'],
                'type' => 'text'
            ],
            [
                'slug' => 'content_class',
                'label' => $labels['content_class'],
                'type' => 'string'
            ],
            [
                'slug' => 'content_id',
                'label' => $labels['content_id'],
                'type' => 'integer'
            ],
            [
                'slug' => 'status',
                'label' => $labels['status'],
                'type' => 'string'
            ],
        ];
    }

    /**
     * @return string marker path
     */
    public function getIconMarker()
    {
        return null; //TODO
    }

    /**
     * If events are more than one, set 'array' => true in the calendarView in the index.
     * @return array events
     */
    public function getEvents()
    {
        return NULL; //TODO
    }

    /**
     * @return url event (calendar of activities)
     */
    public function getUrlEvent()
    {
        return NULL; //TODO e.g. Yii::$app->urlManager->createUrl([]);
    }

    /**
     * @return color event
     */
    public function getColorEvent()
    {
        return NULL; //TODO
    }

    /**
     * @return title event
     */
    public function getTitleEvent()
    {
        return NULL; //TODO
    }


}
