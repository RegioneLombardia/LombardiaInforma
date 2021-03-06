<?php
/**
 * Lombardia Informatica S.p.A.
 * OPEN 2.0
 *
 *
 * @package    open20\amos\attachments\models
 * @category   CategoryName
 */

namespace open20\amos\attachments\models;

use open20\amos\attachments\FileModule;
use open20\amos\attachments\FileModuleTrait;
use open20\amos\core\record\Record;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveQuery;
use yii\helpers\Url;
use Yii;

/**
 * Class File
 *
 * This is the model class for table "file".
 *
 * @property integer $id
 * @property string $name
 * @property string $model
 * @property string $attribute
 * @property integer $itemId
 * @property string $hash
 * @property integer $size
 * @property string $type
 * @property string $mime
 * @property integer $is_main
 * @property integer $date_upload
 * @property integer $sort
 * @property integer $num_downloads
 * @property integer $encrypted
 * @property FileRefs[] $attachFileRefs
 *
 * @property \open20\amos\attachments\models\File[] $attachmentWithBrothers
 *
 * @package open20\amos\attachments\models
 */
class File extends Record
{

    use FileModuleTrait;
    const MAIN             = 1;
    const NOT_MAIN         = 0;
    // Const to encrypted files
    const IS_ENCRYPTED     = 1;
    const IS_NOT_ENCRYPTED = 0;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return \Yii::$app->getModule(FileModule::getModuleName())->tableName;
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'date_upload',
                'updatedAtAttribute' => false,
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['model', 'attribute', 'hash', 'size', 'mime'], 'required'],
            [['itemId', 'size', 'is_main', 'date_upload', 'sort', 'num_downloads'], 'integer'],
            [['name', 'model', 'hash', 'type', 'mime', 'table_name_form'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => FileModule::t('amosattachments', 'ID'),
            'name' => FileModule::t('amosattachments', 'Name'),
            'model' => FileModule::t('amosattachments', 'Model'),
            'attribute' => FileModule::t('amosattachments', 'Attribute'),
            'itemId' => FileModule::t('amosattachments', 'Item ID'),
            'hash' => FileModule::t('amosattachments', 'Hash'),
            'size' => FileModule::t('amosattachments', 'Size'),
            'type' => FileModule::t('amosattachments', 'Type'),
            'mime' => FileModule::t('amosattachments', 'Mime'),
            'is_main' => FileModule::t('amosattachments', 'Is main'),
            'date_upload' => FileModule::t('amosattachments', 'Date upload'),
            'sort' => FileModule::t('amosattachments', 'Sort'),
            'num_downloads' => FileModule::t('amosattachments', '#num_downloads'),
            'encrypted' => FileModule::t('amosattachments', '#encrypted'),
        ];
    }

    /**
     * @param string $size
     * @return string
     */
    public function getUrl($size = 'original', $absolute = false, $canCache = false)
    {
        $hash = FileRefs::getHashByAttachFile($this, $size);
        return $this->generateUrlForHash($hash, $absolute, $canCache);
    }

    /**
     * @param $size
     * @return string
     */
    public function getWebUrl($size = 'original', $absolute = false, $canCache = false)
    {
        $hash = FileRefs::getHashByAttachFile($this, $size, false);
        return $this->generateUrlForHash($hash, $absolute, $canCache);
    }

    /**
     * @param $hash
     * @param $absolute
     * @param bool $canCache
     * @return string
     */
    public function generateUrlForHash($hash, $absolute, $canCache = false)
    {
        $baseUrl = Url::to(['/'.FileModule::getModuleName().'/file/view', 'hash' => $hash, 'canCache' => $canCache]);

        if (!$absolute) return $baseUrl;
        else return \Yii::$app->getUrlManager()->createAbsoluteUrl($baseUrl);
    }

    /**
     * @return string
     */
    public function getPath($size = 'original')
    {
        if ($size == 'original') {
            return $this->getModule()->getFilesDirPath($this->hash).DIRECTORY_SEPARATOR.$this->hash.'.'.$this->type;
        } else {
            $moduleConfig = Yii::$app->getModule('attachments')->config;
            $crops        = $moduleConfig['crops'] ?: [];

            if (json_decode($size) != null) {
                $crops['custom'] = (array) json_decode($size);
                $size            = 'custom';
            }

            if (array_key_exists($size, $crops)) {
                $cropSettings = $crops[$size];
            } else {
                $crops['custom'] = (array) json_decode('default');
                $size            = 'custom';
                $cropSettings    = $crops[$size];
            }

            return $this->getModule()->getFilesDirPath($this->hash).DIRECTORY_SEPARATOR.$this->hash.'.'.(!empty($cropSettings['width'])
                    ? $cropSettings['width'] : '').'.'.(!empty($cropSettings['height']) ? $cropSettings['height'] : '').'.'.$this->type;
        }
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAttachFileRefs()
    {
        return $this->hasOne(FileRefs::className(), ['attach_file_id' => 'id']);
    }

    /**
     * @return integer
     */
    public function getNumDownloads()
    {
        return $this->num_downloads;
    }

    /**
     * TODO da implementare. Creare tabella criptata in cui salvare la password univoca oppure una random per ciascuna riga di attach_file.
     * @return string
     */
    public function getDecryptPassword()
    {
        return '5dd2d749acf49';
    }

    public function getOwner()
    {
        if (class_exists($this->model) && method_exists($this->model, 'find')) {
            return $this->hasOne($this->model, ['id' => 'itemId']);
        }

        return null;
    }

    /**
     * @return ActiveQuery
     * @throws \yii\base\InvalidConfigException
     */
    public function getAttachmentWithBrothers()
    {
        return $this->hasMany(self::className(), ['model' => 'model'])
                ->andWhere(['itemId' => $this->itemId])
                ->andWhere(['attribute' => $this->attribute]);
    }
}