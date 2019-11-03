<?php
/**
 * Created by PhpStorm.
 * User: Marcin
 * Date: 2019-11-02
 * Time: 23:19
 */

namespace App\ValueObjects;


class Nip extends AbstractValueObject
{
    /** @var string */
    protected $value;

    /**
     * Nip constructor.
     * @param $value
     */
    public function __construct($value)
    {
        $this->assertNip($value);
        $this->value = $value;
    }


    /**
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }

    public function __toString()
    {
        return (string)$this->getValue();
    }
}