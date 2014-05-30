<?php

namespace Runcom\EanValidationBundle\Tests\Validator\Constraints;

use Runcom\EanValidationBundle\Validator\Constraints\Ean8;
use Runcom\EanValidationBundle\Validator\Constraints\Ean8Validator;

/**
 * Class Ean13ValidatorTest
 *
 * @package Runcom\EanValidationBundle\Tests\Validator\Constraints
 */
class Ean8ValidatorTest extends \PHPUnit_Framework_TestCase
{
    protected $context;
    protected $validator;

    protected function setUp()
    {
        $this->context = $this->getMock('Symfony\Component\Validator\ExecutionContext', array(), array(), '', false);
        $this->validator = new Ean8Validator();
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

        $this->validator->validate($data, new Ean8());
    }

    /**
     * @dataProvider getInvalidValues
     */
    public function testInvalidValues($data)
    {
        $constraint = new Ean8(array(
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
            array(65833253),
            array('96385077'),
            array(null),
            array(''),
            array(false),
        );
    }
}