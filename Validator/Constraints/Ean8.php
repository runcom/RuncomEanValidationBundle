<?php

namespace Runcom\EanValidationBundle\Validator\Constraints;

use Symfony\Component\Validator\Constraint;

/**
 * Class Ean8
 *
 * @Annotation
 *
 * @package Runcom\EanValidationBundle\Validator\Constraint
 */
class Ean8 extends Constraint
{
    public $message = 'The string "%string%" is not a valid EAN8 code.';
}