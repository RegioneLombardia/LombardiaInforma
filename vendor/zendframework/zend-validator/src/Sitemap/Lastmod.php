<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 */

namespace Zend\Validator\Sitemap;

use Zend\Stdlib\ErrorHandler;
use Zend\Validator\AbstractValidator;

/**
 * Validates whether a given value is valid as a sitemap <lastmod> value
 *
 */
class Lastmod extends AbstractValidator
{
    /**
     * Regular expression to use when validating
     *
     */
    // @codingStandardsIgnoreStart
    const LASTMOD_REGEX = '/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])(T([0-1][0-9]|2[0-3])(:[0-5][0-9])(:[0-5][0-9])?(\\+|-)([0-1][0-9]|2[0-3]):[0-5][0-9])?$/';
    // @codingStandardsIgnoreEnd

    /**
     * Validation key for not valid
     *
     */
    const NOT_VALID = 'sitemapLastmodNotValid';
    const INVALID   = 'sitemapLastmodInvalid';

    /**
     * Validation failure message template definitions
     *
     * @var array
     */
    protected $messageTemplates = [
        self::NOT_VALID => "The input is not a valid sitemap lastmod",
        self::INVALID   => "Invalid type given. String expected",
    ];

    /**
     * Validates if a string is valid as a sitemap lastmod
     *
     *
     * @param  string  $value  value to validate
     * @return bool
     */
    public function isValid($value)
    {
        if (! is_string($value)) {
            $this->error(self::INVALID);
            return false;
        }

        $this->setValue($value);
        ErrorHandler::start();
        $result = preg_match(self::LASTMOD_REGEX, $value);
        ErrorHandler::stop();
        if ($result != 1) {
            $this->error(self::NOT_VALID);
            return false;
        }

        return true;
    }
}
