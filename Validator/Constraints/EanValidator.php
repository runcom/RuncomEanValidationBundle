<?php
/**
 * Copyright (C) 2014 Antonio Murdaca <me@runcom.ninja>
 *
 * This file is part of RuncomEanValidationBundle.
 *
 * $3 is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * $3 is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with $3. If not, see <http://www.gnu.org/licenses/>.
 */

namespace Runcom\EanValidationBundle\Validator\Constraints;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

/**
 * Class EanValidator
 *
 * @package Runcom\EanValidationBundle\Validator\Constraint
 */
class EanValidator extends ConstraintValidator
{
    /**
     * @param mixed $value
     * @param Constraint $constraint
     */
    public function validate($value, Constraint $constraint)
    {
        $checkDigit = substr((string) $value, strlen((string) $value) - 1, strlen((string) $value));

        if ((!preg_match('/^[0-9]{8,13}$/', $value, $matches)
                || $this->getEanCheckDigit($value) != $checkDigit)) {
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
    private function getEanCheckDigit($value)
    {
        $evenSum = 0;
        $oddSum = 0;
        $digits = str_split(substr((string) $value, 0, -1));

        foreach ($digits as $index => $digit) {
            if ($index & 1) {
                $evenSum += strlen((string) $value) == 8 ? $digit : $digit * 3;
            } else {
                $oddSum += strlen((string) $value) == 8 ? $digit * 3 : $digit;
            }
        }

        $total = $evenSum + $oddSum;

        return ((ceil($total / 10)) * 10) - $total;
    }
}