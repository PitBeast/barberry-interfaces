<?php
namespace Barberry\Direction;
use Mockery as m;

class DirectionAbstractTest extends \PHPUnit_Framework_TestCase {

    public function testTransfersStringCommandToConverter() {
        $direction = new TestDirection('string_command');
        $direction->getConverter()->shouldReceive('convert')
            ->with('010101', anInstanceOf('\\Barberry\\Plugin\\InterfaceCommand')
        );

        $direction->convert('010101');
    }
}

//==================================================================================================

class TestDirection extends DirectionAbstract {
    public function init($commandString = null) {
        $this->converter = m::mock();
        $this->command = m::mock('\\Barberry\\Plugin\\InterfaceCommand');
    }

    /**
     * @return \Mockery\MockInterface
     */
    public function getConverter() {
        return $this->converter;
    }
}