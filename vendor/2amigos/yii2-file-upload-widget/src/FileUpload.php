<?php
/**
 */

namespace dosamigos\fileupload;

use yii\helpers\Html;
use yii\helpers\Json;
use yii\helpers\Url;

/**
 * FileUpload
 *
 * Widget to render the jQuery File Upload Basic Uploader
 *
 */
class FileUpload extends BaseUpload
{
    /**
     * @var bool whether to register the js files for the basic +
     */
    public $plus = false;

    /**
     * @var bool whether to render the default button
     */
    public $useDefaultButton = true;

    /**
     * @var string the upload view path to render the js upload template
     */
    public $uploadButtonTemplateView = 'uploadButton';

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        $url = Url::to($this->url);
        $this->options['data-url'] = $url;
    }

    /**
     * @inheritdoc
     */
    public function run()
    {
        $input = $this->hasModel()
            ? Html::activeFileInput($this->model, $this->attribute, $this->options)
            : Html::fileInput($this->name, $this->value, $this->options);

        echo $this->useDefaultButton
            ? $this->render($this->uploadButtonTemplateView, ['input' => $input])
            : $input;

        $this->registerClientScript();
    }

    /**
     * Registers required script for the plugin to work as jQuery File Uploader
     */
    public function registerClientScript()
    {
        $view = $this->getView();

        if($this->plus) {
            FileUploadPlusAsset::register($view);
        } else {
            FileUploadAsset::register($view);
        }

        $options = Json::encode($this->clientOptions);
        $id = $this->options['id'];

        $js[] = ";jQuery('#$id').fileupload($options);";
        if (!empty($this->clientEvents)) {
            foreach ($this->clientEvents as $event => $handler) {
                $js[] = "jQuery('#$id').on('$event', $handler);";
            }
        }
        $view->registerJs(implode("\n", $js));
    }
}
