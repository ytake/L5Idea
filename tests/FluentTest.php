<?php

class FluentTest extends \PHPUnit_Framework_TestCase
{
    /** @var TestFluent  */
    protected $fluent;
    protected function setUp()
    {
        $this->fluent = new TestFluent();
    }

    public function testConvertArray()
    {
        $convert = $this->fluent->data(new \App\Entities\EntryEntity());
        $this->assertInternalType('array', $convert);
        $this->assertArrayNotHasKey('entry_id', $convert);
        $this->assertArrayHasKey('content', $convert);
        $this->assertArrayHasKey('title', $convert);
    }

    public function testGetData()
    {
        // getData($data, Entityable $entity)
        $reflectionMethod = $this->getProtectMethod($this->fluent, 'getData');
        $std = new stdClass();
        $std->test_id = 1;
        $std->content = 'testing';
        $invoke = $reflectionMethod->invokeArgs($this->fluent, [$std, new TestEntity]);
        $this->assertInstanceOf('TestEntity', $invoke);
    }
    /**
     * @param $class
     * @param $name
     * @return \ReflectionMethod
     */
    protected function getProtectMethod($class, $name)
    {
        $class = new \ReflectionClass($class);
        $method = $class->getMethod($name);
        $method->setAccessible(true);
        return $method;
    }
    /**
     * @param $class
     * @param $name
     * @return \ReflectionProperty
     */
    protected function getProtectProperty($class, $name)
    {
        $class = new \ReflectionClass($class);
        $property = $class->getProperty($name);
        $property->setAccessible(true);
        return $property;
    }
}

class TestEntity implements \App\Entities\Entityable
{
    private $test_id;

    public $content;
}

class TestFluent extends \App\Repositories\Criteria\FluentObject
{
    /** @var string  */
    protected $identity = 'test_id';

}
