<?php
/**
 * Created by PhpStorm.
 * User: Marcin
 * Date: 2019-11-02
 * Time: 23:32
 */

namespace App\Form\DataTransformer;


use App\Exceptions\AssertionException;
use App\ValueObjects\Nip;
use Symfony\Component\Form\DataTransformerInterface;
use Symfony\Component\Form\Exception\TransformationFailedException;

class NipTransformer implements DataTransformerInterface
{
    /**
     * @param Nip|null $value
     * @return string|null
     */
    public function transform($value)
    {
        if (!$value) {
            return null;
        }

        return (string)$value;
    }

    /**
     * @param Nip|null $value
     * @return Nip|null
     */
    public function reverseTransform($value)
    {
        if (!$value) {
            return null;
        }

        try {
            return new Nip($value);
        } catch (AssertionException $exception){
            throw new TransformationFailedException($exception->getMessage());
        }
    }

}