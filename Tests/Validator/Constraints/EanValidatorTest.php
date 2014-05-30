<?php
/**
 * Copyright (C) 2014 Antonio Murdaca <me@runcom.ninja>
 *
 * This file is part of RuncomEanValidationBundle.
 *
 * RuncomEanValidationBundle is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * RuncomEanValidationBundle is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with RuncomEanValidationBundle. If not, see <http://www.gnu.org/licenses/>.
 */

namespace Runcom\EanValidationBundle\Tests\Validator\Constraints;

use Runcom\EanValidationBundle\Validator\Constraints\Ean;
use Runcom\EanValidationBundle\Validator\Constraints\EanValidator;

/**
 * Class EanValidatorTest
 *
 * @package Runcom\EanValidationBundle\Tests\Validator\Constraints
 */
class EanValidatorTest extends \PHPUnit_Framework_TestCase
{
    protected $context;
    protected $validator;

    protected function setUp()
    {
        $this->context = $this->getMock('Symfony\Component\Validator\ExecutionContext', array(), array(), '', false);
        $this->validator = new EanValidator();
        $this->validator->initialize($this->context);
    }

    protected function tearDown()
    {
        $this->context = null;
        $this->validator = null;
    }

    /**
     * @dataProvider getValidValues
     */
    public function testValidValues($data)
    {
        $this->context->expects($this->never())
            ->method('addViolation');

        $this->validator->validate($data, new Ean());
    }

    /**
     * @dataProvider getInvalidValues
     */
    public function testInvalidValues($data)
    {
        $constraint = new Ean(array(
            'message' => 'myMessage'
        ));

        $this->context->expects($this->once())
            ->method('addViolation')
            ->with('myMessage');

        $this->validator->validate($data, $constraint);
    }

    public function getValidValues()
    {
        return array(
            array('2412345678901'),
            array('1234567890128'),
            array('5012345678900'),
            array('65833254'),
            array('96385074'),
            array('54490109'),
        );
    }

    public function getInvalidValues()
    {
        return array(
            array(0),
            array(0.0),
            array(1234),
            array(5012345678901),
            array('2412345678903'),
            array(65833253),
            array('96385077'),
            array(null),
            array(''),
            array(false),
        );
    }
}