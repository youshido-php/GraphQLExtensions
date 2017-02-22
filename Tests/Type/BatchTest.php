<?php
/**
 * This file is a part of GraphQLExtensions project.
 *
 * @author Alexandr Viniychuk <a@viniychuk.com>
 * created: 2/21/17 10:45 PM
 */

namespace Youshido\GraphQLExtension\Tests\Type;


use Youshido\GraphQL\Type\Scalar\IntType;
use Youshido\GraphQLExtension\Type\BatchResultType;

class BatchTest extends \PHPUnit_Framework_TestCase
{

    public function testType()
    {
        $type = new BatchResultType(new IntType());
        $this->assertEquals('BatchIntResult', $type->getName());
    }

}
