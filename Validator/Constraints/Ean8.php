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