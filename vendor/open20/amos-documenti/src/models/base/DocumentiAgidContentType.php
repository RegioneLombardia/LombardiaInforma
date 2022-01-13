<?php

namespace open20\amos\documenti\models\base;

use Yii;

/**
* This is the base-model class for table "documenti_agid_content_type".
*
    * @property integer $id
    * @property string $name
    * @property string $description
    * @property string $created_at
    * @property string $updated_at
    * @property string $deleted_at
    * @property integer $created_by
    * @property integer $updated_by
    * @property integer $deleted_by
*/
 class  DocumentiAgidContentType extends \yii\db\ActiveRecord
{
    public $isSearch = false;

/**
* @inheritdoc
*/
public static function tableName()
{
return 'documenti_agid_content_type';
}

/**
* @inheritdoc
*/
public function rules()
{
return [
            [['description'], 'string'],
            [['created_at', 'updated_at', 'deleted_at'], 'safe'],
            [['created_by', 'updated_by', 'deleted_by'], 'integer'],
            [['name'], 'string', 'max' => 255],
];
}

/**
* @inheritdoc
*/
public function attributeLabels()
{
return [
    'id' => Yii::t('app', 'ID'),
    'name' => Yii::t('app', 'Name'),
    'description' => Yii::t('app', 'Description'),
    'created_at' => Yii::t('app', 'Created at'),
    'updated_at' => Yii::t('app', 'Updated at'),
    'deleted_at' => Yii::t('app', 'Deleted at'),
    'created_by' => Yii::t('app', 'Created by'),
    'updated_by' => Yii::t('app', 'Updated by'),
    'deleted_by' => Yii::t('app', 'Deleted by'),
];
}
     /**
      * Base query, it exclude deleted elements
      *
      * @return mixed
      * @throws \yii\base\InvalidConfigException
      */
     public static function findRedactor()
     {
         $return = DocumentiAgidContentType::find();
         if (\Yii::$app->getUser()->can('REDACTOR_DOCUMENTI')) {
             $tableName = static::getTableSchema()->name;
             $ids = \open20\amos\documenti\models\DocumentiAgidTypeRoles::find()->select('documenti_agid_type_id')->andWhere(['user_id' =>\Yii::$app->getUser()->id ])->distinct()->column();
             $content_types = DocumentiAgidType::find()
                                                     ->select('agid_document_content_type_id')
                                                     ->andWhere(['id' => $ids,])
                                                     ->distinct()->column();
             
             $return->andWhere([$tableName . '.id' => $content_types]);
         }
         return $return;
     }
}
