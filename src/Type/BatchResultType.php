<?php
/**
 * This file is a part of GraphQLExtensions project.
 *
 * @author Alexandr Viniychuk <a@viniychuk.com>
 * created: 2/21/17 9:51 PM
 */

namespace Youshido\GraphQLExtension\Type;


use Youshido\GraphQL\Config\Object\ObjectTypeConfig;
use Youshido\GraphQL\Type\AbstractType;
use Youshido\GraphQL\Type\ListType\ListType;
use Youshido\GraphQL\Type\Object\AbstractObjectType;
use Youshido\GraphQL\Type\Object\ObjectType;
use Youshido\GraphQL\Type\Scalar\IntType;

class BatchResultType extends AbstractObjectType
{
    private $listItemType;

    public function __construct(AbstractType $type)
    {
        parent::__construct([
            'name'        => sprintf('Batch%sResult', $type->getName()),
            'description' => sprintf('Returns list of type %s in batches', $type->getName())
        ]);
        $this->listItemType = $type;
    }

    public function build($config)
    {
        $config->addFields([
            'batchInfo' => new ObjectType([
                'name' => 'BatchInfoResult',
                'fields' => [
                    'offset'     => new IntType(),
                    'limit'      => new IntType(),
                    'totalCount' => new IntType(),
                ],
            ]),
            'items'     => new ListType($this->listItemType),
        ]);
    }

}