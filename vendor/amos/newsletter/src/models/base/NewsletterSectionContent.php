<?php

namespace amos\newsletter\models\base;

use Yii;

/**
* This is the base-model class for table "newsletter_section_content".
*
    * @property integer $id
    * @property integer $newsletter_section_id
    * @property integer $newsletter_content_type_id
    * @property string $model_content_classname
    * @property integer $model_content_id
    * @property string $html
    * @property string $created_at
    * @property string $updated_at
    * @property string $deleted_at
    * @property integer $created_by
    * @property integer $updated_by
    * @property integer $deleted_by
    *
            * @property \amos\newsletter\models\NewsletterContentType $newsletterContentType
            * @property \amos\newsletter\models\NewsletterSection $newsletterSection
    */
 class  NewsletterSectionContent extends \open20\amos\core\record\Record
{


/**
* @inheritdoc
*/
public static function tableName()
{
return 'newsletter_section_content';
}

/**
* @inheritdoc
*/
public function rules()
{
return [
            [['newsletter_section_id'], 'required'],
            [['newsletter_section_id', 'newsletter_content_type_id', 'model_content_id', 'created_by', 'updated_by', 'deleted_by'], 'integer'],
            [['html'], 'string'],
            [['created_at', 'updated_at', 'deleted_at'], 'safe'],
            [['model_content_classname'], 'string', 'max' => 255],
            [['newsletter_content_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => NewsletterContentType::className(), 'targetAttribute' => ['newsletter_content_type_id' => 'id']],
            [['newsletter_section_id'], 'exist', 'skipOnError' => true, 'targetClass' => NewsletterSection::className(), 'targetAttribute' => ['newsletter_section_id' => 'id']],
];
}

/**
* @inheritdoc
*/
public function attributeLabels()
{
return [
    'id' => Yii::t('amosnewsletter', 'ID'),
    'newsletter_section_id' => Yii::t('amosnewsletter', 'Template'),
    'newsletter_content_type_id' => Yii::t('amosnewsletter', 'Type'),
    'model_content_classname' => Yii::t('amosnewsletter', 'Model content'),
    'model_content_id' => Yii::t('amosnewsletter', 'Model content id'),
    'html' => Yii::t('amosnewsletter', 'Html'),
    'created_at' => Yii::t('amosnewsletter', 'Created at'),
    'updated_at' => Yii::t('amosnewsletter', 'Updated at'),
    'deleted_at' => Yii::t('amosnewsletter', 'Deleted at'),
    'created_by' => Yii::t('amosnewsletter', 'Created by'),
    'updated_by' => Yii::t('amosnewsletter', 'Updated at'),
    'deleted_by' => Yii::t('amosnewsletter', 'Deleted at'),
];
}

    /**
    * @return \yii\db\ActiveQuery
    */
    public function getNewsletterContentType()
    {
    return $this->hasOne(\amos\newsletter\models\NewsletterContentType::className(), ['id' => 'newsletter_content_type_id']);
    }

    /**
    * @return \yii\db\ActiveQuery
    */
    public function getNewsletterSection()
    {
    return $this->hasOne(\amos\newsletter\models\NewsletterSection::className(), ['id' => 'newsletter_section_id']);
    }
}
