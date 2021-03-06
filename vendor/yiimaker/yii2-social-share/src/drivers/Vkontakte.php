<?php
/**
 */

namespace ymaker\social\share\drivers;

use ymaker\social\share\base\AbstractDriver;

/**
 * Driver for Vkontakte.
 *
 *
 * @since 1.0
 */
class Vkontakte extends AbstractDriver
{
    /**
     * {@inheritdoc}
     */
    protected function processShareData()
    {
        $this->url = static::encodeData($this->url);
        $this->title = static::encodeData($this->title);
        $this->description = static::encodeData($this->description);
        $this->imageUrl = static::encodeData($this->imageUrl);
    }

    /**
     * {@inheritdoc}
     */
    protected function buildLink()
    {
        return 'http://vk.com/share.php?'
            . 'url={url}'
            . '&title={title}'
            . '&description={description}'
            . '&image={imageUrl}';
    }
}
