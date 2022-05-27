<?php

namespace ihde\php\StructThinWrap\codeception\php74\v10\Inline;

use ihde\php\StructThinWrap\codeception\UnitTester;
use ihde\php74\StructThinWrap\v10\Inline\I_StructThinWrapAPI;
use ihde\php74\StructThinWrap\v10\Inline\StructThinWrapAPI_array;

class StructThinWrapAPI_arrayTest
    extends \Codeception\Test\Unit {
    
    protected UnitTester $tester;
    
    /**
     * @return void
     */
    public function testInstantiation(): void {
        $instance = StructThinWrapAPI_array::instance();
        self::assertInstanceOf(I_StructThinWrapAPI::class, $instance);
        self::assertInstanceOf(StructThinWrapAPI_array::class, $instance);
    }
    
    
}
