<?php
/**
 * underscore to dash filter
 *
 * @category    PHP
 * @package     MvcLite
 * @subpackage  Filter
 * @since       File available since release 1.1.x
 * @author      Cory Collier <corycollier@corycollier.com>
 */

namespace MvcLite\Filter;

/**
 * underscore to dash filter
 *
 * @category    PHP
 * @package     MvcLite
 * @subpackage  Filter
 * @since       Class available since release 1.1.x
 * @author      Cory Collier <corycollier@corycollier.com>
 */

class UnderscoreToDash extends \MvcLite\FilterAbstract
{
    /**
     * (non-PHPdoc)
     * @see \MvcLite\FilterAbstract::filter()
     */
    public function filter($word = '')
    {
        return strtr($word, ['_' => '-']);
    }
}
