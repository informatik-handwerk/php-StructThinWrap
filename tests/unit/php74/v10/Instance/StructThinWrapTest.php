<?php

namespace ihde\php\StructThinWrap\codeception\php74\v10\Instance;

use ihde\php\StructThinWrap\codeception\UnitTester;
use ihde\php74\StructThinWrap\v10\Inline\I_StructThinWrapAPI;
use ihde\php74\StructThinWrap\v10\Instance\StructThinWrap;

class StructThinWrapTest
    extends \Codeception\Test\Unit {
    
    protected UnitTester $tester;
    
    /**
     * @return void
     */
    public function testInstantiation(): void {
        $api = $this->createStub(I_StructThinWrapAPI::class);
        $api->method("canWorkWith")
            ->willReturn(true);
        
        $struct = [];
        $instance = new StructThinWrap($api, $struct);
        
        self::assertSame($struct, $instance->struct());
    }
    
    
}
