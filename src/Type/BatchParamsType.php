<?php
/**
 * This file is a part of GraphQLExtensions project.
 *
 * @author Alexandr Viniychuk <a@viniychuk.com>
 * created: 2/23/17 4:10 PM
 */

namespace Youshido\GraphQLExtension\Type;

use Youshido\GraphQL\Config\Object\InputObjectTypeConfig;
use Youshido\GraphQL\Type\InputObject\AbstractInputObjectType;
use Youshido\GraphQL\Type\Scalar\IntType;

class BatchParamsType extends AbstractInputObjectType
{
    public function build($config)
    {
        $this->addFields([
            'offset' => new IntType(),
            'limit'  => new IntType(),
        ]);
    }

}