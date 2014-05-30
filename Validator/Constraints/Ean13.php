<?php

namespace Runcom\EanValidationBundle\Validator\Constraints;

use Symfony\Component\Validator\Constraint;

/**
 * Class Ean13
 *
 * @Annotation
 *
 * @package Runcom\EanValidationBundle\Validator\Constraint
 */
class Ean13 extends Constraint
{
    public $message = 'The string "%string%" is not a valid EAN13 code.';
}