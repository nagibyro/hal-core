<?php
/**
 * @copyright ©2014 Quicken Loans Inc. All rights reserved. Trade Secret,
 *    Confidential and Proprietary. Any dissemination outside of Quicken Loans
 *    is strictly prohibited.
 */

namespace QL\Hal\Core\Type\EnumType;

use Doctrine\DBAL\Types\Type as BaseType;

class EventStatusEnum extends BaseType
{
    use EnumTypeTrait;

    /**
     * The enum data type
     */
    const TYPE = 'eventstatusenum';

    /**
     * The enum allowed values
     *
     * @return array
     */
    public static function values()
    {
        return [
            'info',
            'success',
            'failure'
        ];
    }
}