<?php

namespace Youshido\GraphQLExtension\Type\Sorting;


use Youshido\GraphQL\Type\AbstractType;
use Youshido\GraphQL\Type\Enum\EnumType;
use Youshido\GraphQL\Type\InputObject\AbstractInputObjectType;

class SortingParamsType extends AbstractInputObjectType
{

    /** @var AbstractType */
    private $type;

    /** @var array */
    private $fields;

    /** @var  string */
    private $prefix;

    public function __construct(AbstractType $type, array $fields)
    {
        $this->type   = $type;
        $this->fields = $fields;
        $this->prefix = sprintf("%sSorting", $type->getName());

        parent::__construct([
            'name' => $this->prefix . 'Params'
        ]);
    }

    public function build($config)
    {
        $config->addFields([
            'field' => [
                'type'         => new EnumType([
                    'name'   => $this->prefix . 'Fields',
                    'values' => array_map(function ($field) {
                        return [
                            'name'  => $field,
                            'value' => $field,
                        ];
                    }, $this->fields)
                ]),
                'description'  => 'Field to sort by: ' . implode(', ', $this->fields),
                'defaultValue' => 'id',
            ],
            'order' => new SortingOrderType()
        ]);
    }


}