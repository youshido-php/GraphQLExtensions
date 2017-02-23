<?php
/**
 * This file is a part of GraphQLExtensions project.
 *
 * @author Alexandr Viniychuk <a@viniychuk.com>
 * created: 2/23/17 4:14 PM
 */

namespace Youshido\GraphQLExtension\Type;


use Youshido\GraphQL\Config\Object\ObjectTypeConfig;
use Youshido\GraphQL\Relay\Connection\Connection;
use Youshido\GraphQL\Relay\Type\PageInfoType;
use Youshido\GraphQL\Type\AbstractType;
use Youshido\GraphQL\Type\ListType\ListType;
use Youshido\GraphQL\Type\NonNullType;
use Youshido\GraphQL\Type\Object\AbstractObjectType;

class CursorResultType extends AbstractObjectType
{

    private $edgeType;

    public function __construct(AbstractType $edgeType)
    {
        parent::__construct([
            'name'        => sprintf('Cursor%sResult', $edgeType->getName()),
            'description' => sprintf('Returns list of type %s in batches', $edgeType->getName())
        ]);
        $this->edgeType = $edgeType;
    }

    public function build($config)
    {
        $config->addFields([
            'pageInfo' => [
                'type'        => new NonNullType(new PageInfoType()),
                'description' => 'Information to aid in pagination.',
                'resolve'     => [__CLASS__, 'getPageInfo'],
            ],
            'edges'    => [
                'type'        => new ListType(Connection::edgeDefinition($this->edgeType)),
                'description' => 'A list of edges.',
                'resolve'     => [__CLASS__, 'getEdges'],
            ]
        ]);
    }

}