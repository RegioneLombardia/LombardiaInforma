<?php

namespace luya\bootstrap3\blocks;

use luya\TagParser;
use luya\bootstrap3\Module;
use luya\cms\helpers\BlockHelper;
use luya\bootstrap3\BaseBootstrap3Block;
use luya\cms\frontend\blockgroups\MediaGroup;

/**
 * Image with Text block.
 *
 * @since 1.0.0
 */
final class ImageTextBlock extends BaseBootstrap3Block
{
    /**
     * @inheritdoc
     */
    public $cacheEnabled = true;

    /**
     * @inheritdoc
     */
    public function name()
    {
        return Module::t('block_image_text_name');
    }
    
    /**
     * @inheritdoc
     */
    public function blockGroup()
    {
        return MediaGroup::class;
    }

    /**
     * @inheritdoc
     */
    public function icon()
    {
        return 'recent_actors';
    }

    /**
     * @inheritdoc
     */
    public function config()
    {
        return [
            'vars' => [
                ['var' => 'text', 'label' => Module::t('block_image_text_text_label'), 'type' => 'zaa-textarea'],
                ['var' => 'imageId', 'label' => Module::t('block_image_text_imageid_label'), 'type' => 'zaa-image-upload'],
                ['var' => 'imagePosition', 'label' => Module::t('block_image_text_imageposition_label'), 'type' => 'zaa-select', 'initvalue' => 'left', 'options' => [
                        ['value' => 'left', 'label' => Module::t('block_image_text_imageposition_left')],
                        ['value' => 'right', 'label' => Module::t('block_image_text_imageposition_right')],
                    ],
                ],
            ],
            'cfgs' => [
                ['var' => 'margin', 'label' => Module::t('block_image_text_margin_label'), 'type' => 'zaa-select', 'initvalue' => '20px', 'options' => [
                        ['value' => '5px', 'label' => '0 ' . Module::t('block_image_text_margin_pixel')],
                        ['value' => '10px', 'label' => '10 ' . Module::t('block_image_text_margin_pixel')],
                        ['value' => '20px', 'label' => '20 ' . Module::t('block_image_text_margin_pixel')],
                        ['value' => '30px', 'label' => '30 ' . Module::t('block_image_text_margin_pixel')],
                        ['value' => '40px', 'label' => '40 ' . Module::t('block_image_text_margin_pixel')],
                        ['value' => '50px', 'label' => '50 ' . Module::t('block_image_text_margin_pixel')],
                    ],
                ],
                ['var' => 'textType', 'label' => Module::t('block_image_text_texttype_label'), 'initvalue' => 0, 'type' => 'zaa-select', 'options' => [
                        ['value' => '0', 'label' => Module::t('block_image_text_texttype_normal')],
                        ['value' => '1', 'label' => Module::t('block_image_text_texttype_markdown')],
                    ],
                ],
                ['var' => 'btnLabel', 'label' => Module::t('block_image_text_btnlabel_label'), 'type' => 'zaa-text'],
                ['var' => 'btnHref', 'label' => Module::t('block_image_text_btnhref_label'), 'type' => 'zaa-text'],
                ['var' => 'btnClass', 'label' => Module::t('block_image_text_btnclass_label'), 'type' => 'zaa-text'],
                ['var' => 'targetBlank', 'label' => Module::t('block_image_text_targetblank_label'), 'type' => 'zaa-checkbox'],
                ['var' => 'width', 'label' => Module::t('block_image_fixed_width'), 'type' => 'zaa-text'],
                ['var' => 'height', 'label' => Module::t('block_image_fixed_height'), 'type' => 'zaa-text'],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function getFieldHelp()
    {
        return [
            'textType' => Module::t('block_image_text_help_texttype'),
        ];
    }

    /**
     * Get the image text.
     *
     * @return string
     */
    public function getText()
    {
        $text = $this->getVarValue('text');

        if ($this->getCfgValue('textType')) {
            return TagParser::convertWithMarkdown($text);
        }

        return empty($text) ? null : '<p>' . nl2br($text) . '</p>';
    }

    public function getImagePosition()
    {
        return ($this->getVarValue('imagePosition', 'left') == 'left')
            ? "margin-right:{$this->getCfgValue('margin', '20px')}"
            : "margin-left:{$this->getCfgValue('margin', '20px')}";
    }

    /**
     * @inheritdoc
     */
    public function extraVars()
    {
        return [
            'image' => BlockHelper::imageUpload($this->getVarValue('imageId')),
            'text' => $this->getText(),
            'imagePosition' => $this->getImagePosition(),
        ];
    }

    /**
     * @inheritdoc
     */
    public function admin()
    {
        return  '{% if not extras.image.source %}'.
                    '<span class="block__empty-text">' . Module::t('block_image_text_no_image') . '</span>'.
                '{% endif %}'.
                '{% if not extras.text %}'.
                    '<span class="block__empty-text">' . Module::t('block_image_text_no_text') . '</span>'.
                '{% endif %}'.
                '{% if extras.image.source and extras.text %}'.
                    '<img src="{{ extras.image.source }}"{% if cfgs.width %} width="{{cfgs.width}}"{% endif %}{% if cfgs.height %} height="{{cfgs.height}}"{% endif %} border="0" style="{% if vars.imagePosition == "left" %}float:left;{% else %}float:right{% endif %};{% if vars.imagePosition == "right" %}margin-left:{{ cfgs.margin }}{% else %}margin-right:{{ cfgs.margin }}{% endif %};margin-bottom:{{ cfgs.margin }}; max-width: 50%;"">'.
                    '{{ extras.text }}'.
                '{% endif %}';
    }
}
