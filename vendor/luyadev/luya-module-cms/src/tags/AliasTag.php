<?php

namespace luya\cms\tags;

use luya\cms\frontend\Module;
use Yii;
use luya\tag\BaseTag;

/**
 * Access Application Aliases.
 *
 * This tag allows you to access the defined aliases from the application.
 *
 * Predefined: http://www.yiiframework.com/doc-2.0/guide-concept-aliases.html#predefined-aliases
 *
 * @since 1.0.0
 */
class AliasTag extends BaseTag
{
    public function example()
    {
        return 'alias[@web]';
    }
    
    public function readme()
    {
        return Module::t('tag_alias_readme');
    }
    
    public function parse($value, $sub)
    {
        return Yii::getAlias($value, false);
    }
}
