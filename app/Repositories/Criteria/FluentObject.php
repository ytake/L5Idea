<?php
namespace App\Repositories\Criteria;

use App\Entities\Entityable;
use Illuminate\Support\Fluent;

/**
 * Class FluentObject
 * @package App\Repositories\Criteria
 * @author yuuki.takezawa<yuuki.takezawa@comnect.jp.net>
 */
class FluentObject
{

    /** @var string  */
    protected $identity;

    /**
     * @param \stdClass $data
     * @param Entityable $entity
     * @return Entityable
     */
    protected function getData(\stdClass $data, Entityable $entity)
    {
        $identity = $this->identity;
        $this->setIdentity($entity, $data->$identity);
        unset($data->$identity);
        foreach ($data as $prop => $val) {
            $entity->$prop = $val;
        }
        return $entity;
    }

    /**
     * @param $item
     * @param $id
     * @return mixed
     */
    private function setIdentity($item, $id)
    {
        $reflection = new \ReflectionClass($item);
        try {
            $property = $reflection->getProperty($this->identity);
            $property->setAccessible(true);
            $property->setValue($item, $id);
            return $item;
        } catch(\ReflectionException $e) {
            return $item;
        }
    }

    /**
     * @param Entityable $entity
     * @return array
     */
    public function data(Entityable $entity)
    {
        return (new Fluent($entity))->getAttributes();
    }
}