<?php
/**
 * This file is a part of GraphQLExtensions project.
 *
 * @author Alexandr Viniychuk <a@viniychuk.com>
 * created: 2/28/17 10:09 PM
 */

namespace Youshido\GraphQLExtension\Type;


use Youshido\GraphQL\Config\Object\ObjectTypeConfig;
use Youshido\GraphQL\Type\Object\AbstractObjectType;
use Youshido\GraphQL\Type\Scalar\IntType;

class PagingInfoType extends AbstractObjectType
{
    public function build($config)
    {
        $config->addFields([
            'offset'     => new IntType(),
            'limit'      => new IntType(),
            'totalCount' => new IntType(),
        ]);
    }
}