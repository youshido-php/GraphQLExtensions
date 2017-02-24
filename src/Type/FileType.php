<?php
/**
 * This file is a part of GraphQLExtensions project.
 *
 * @author Alexandr Viniychuk <a@viniychuk.com>
 * created: 2/21/17 10:50 PM
 */

namespace Youshido\GraphQLExtension\Type;


use Youshido\GraphQL\Config\Object\ObjectTypeConfig;
use Youshido\GraphQL\Type\Object\AbstractObjectType;
use Youshido\GraphQL\Type\Scalar\DateTimeType;
use Youshido\GraphQL\Type\Scalar\IdType;
use Youshido\GraphQL\Type\Scalar\IntType;
use Youshido\GraphQL\Type\Scalar\StringType;

class FileType extends AbstractObjectType
{
    public function build($config)
    {
        $config->addFields([
            'id'        => new IdType(),
            'title'     => [
                'type'        => new StringType(),
                'description' => 'Can be used to store a more descriptive title',
            ],
            'createdAt' => new DateTimeType('c'),
            'updatedAt' => new DateTimeType('c'),
            'url'       => new StringType(),
            'size'      => new IntType(),
            'name'      => new StringType(),
            'extension' => new StringType(),
        ]);
    }


}