<?php

namespace Runcom\EanValidationBundle\Validator\Constraints;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

/**
 * Class Ean8Validator
 *
 * @package Runcom\EanValidationBundle\Validator\Constraint
 */
class Ean8Validator extends ConstraintValidator
{
    /**
     * @param mixed $value
     * @param Constraint $constraint
     */
    public function validate($value, Constraint $constraint)
    {
        $checkDigit = substr((string) $value, strlen((string) $value) - 1, strlen((string) $value));

        if (!preg_match('/^[0-9]{8}$/', $value, $matches) || $this->getEan8CheckDigit($value) != $checkDigit) {
            $this->context->addViolation(
                $constraint->message,
                array('%string%' => $value)
            );
        }
    }

    /**
     * @param $value
     * @return float
     */
    private function getEan8CheckDigit($value)
    {
        $evenSum = 0;
        $oddSum = 0;
        $digits = str_split( substr((string) $value, 0, -1) );

        foreach ($digits as $index => $digit) {
            if (!($index & 1)) {
                $evenSum += $digit * 3;
            } else {
                $oddSum += $digit;
            }
        }

        $total = $evenSum + $oddSum;

        return ((ceil($total / 10)) * 10) - $total;
    }
}