<?php

namespace Runcom\EanValidationBundle\Tests\Validator\Constraints;

use Runcom\EanValidationBundle\Validator\Constraints\Ean13;
use Runcom\EanValidationBundle\Validator\Constraints\Ean13Validator;

/**
 * Class Ean13ValidatorTest
 *
 * @package Runcom\EanValidationBundle\Tests\Validator\Constraints
 */
class Ean13ValidatorTest extends \PHPUnit_Framework_TestCase
{
    protected $context;
    protected $validator;

    protected function setUp()
    {
        $this->context = $this->getMock('Symfony\Component\Validator\ExecutionContext', array(), array(), '', false);
        $this->validator = new Ean13Validator();
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

        $this->validator->validate($data, new Ean13());
    }

    /**
     * @dataProvider getInvalidValues
     */
    public function testInvalidValues($data)
    {
        $constraint = new Ean13(array(
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
            array(null),
            array(''),
            array(false),
        );
    }
}