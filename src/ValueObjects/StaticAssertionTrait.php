<?php
/**
 * Created by PhpStorm.
 * User: Marcin
 * Date: 2019-11-02
 * Time: 23:07
 */

namespace App\ValueObjects;


use App\Exceptions\AssertionException;

trait StaticAssertionTrait
{
    public static function assert($condition)
    {
        if (!is_bool($condition)) {
            throw new AssertionException('Condition passed to assert function must be boolean');
        }

        if (!$condition) {
            throw new AssertionException('Assertion failed');
        }

        return true;
    }

    public static function assertInstanceOf($object, $class)
    {
        if (is_array($class)) {
            $res = false;
            foreach ($class as $item) {
                if ($object instanceof $item) {
                    $res = true;
                }
            }
            if (!$res) {
                self::assert(false);
            }
        } else {
            return self::assert($object instanceof $class);
        }
    }

    public static function assertNip($value)
    {
        $value = preg_replace('/[^0-9]+/', '', $value);

        if (strlen($value) !== 10) {
            throw new AssertionException('Value isnt valid NIP');
        }

        $arrSteps = array(6, 5, 7, 2, 3, 4, 5, 6, 7);
        $intSum = 0;

        for ($i = 0; $i < 9; $i++) {
            $intSum += $arrSteps[$i] * $value[$i];
        }

        $int = $intSum % 11;
        $intControlNr = $int === 10 ? 0 : $int;

        if ($intControlNr == $value[9]) {
            return true;
        }

        throw new AssertionException('Value isnt valid NIP');
    }
}