<?php
/**
 * camelcase to dash filter
 *
 * @category    PHP
 * @package     MvcLite
 * @subpackage  Filter
 * @since       File available since release 1.1.x
 * @author      Cory Collier <corycollier@corycollier.com>
 */

namespace MvcLite\Filter;

use MvcLite\FilterAbstract as FilterAbstract;

/**
 * camelcase to dash filter
 *
 * @category    PHP
 * @package     MvcLite
 * @subpackage  Filter
 * @since       Class available since release 1.1.x
 * @author      Cory Collier <corycollier@corycollier.com>
 */
class CamelcaseToDash extends FilterAbstract
{
    /**
     * (non-PHPdoc)
     * @see \MvcLite\FilterAbstract::filter()
     */
    public function filter($word = '')
    {
        $result = '';
        for ($i = 0; $i < strlen($word); $i++) {
            if ($i > 0 && strtolower($word{$i}) !== $word{$i}) {
                $result .= '-';
            }
            $result .= strtolower($word{$i});
        }
        return $result;
    }
}
