<?php
/**
 */

namespace Zend\Http\Header;

/**
 * Expires Header
 *
 */
class Expires extends AbstractDate
{
    /**
     * Get header name
     *
     * @return string
     */
    public function getFieldName()
    {
        return 'Expires';
    }

    public function setDate($date)
    {
        if ($date === '0' || $date === 0) {
            $date = date(DATE_W3C, 0); // Thu, 01 Jan 1970 00:00:00 GMT
        }
        return parent::setDate($date);
    }
}
