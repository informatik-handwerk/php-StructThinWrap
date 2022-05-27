<?php

namespace ihde\php\StructThinWrap\codeception\php74\v10\Inline;

use ihde\php\StructThinWrap\codeception\UnitTester;
use ihde\php74\StructThinWrap\v10\Inline\I_StructThinWrapAPI;
use ihde\php74\StructThinWrap\v10\Inline\StructThinWrapAPI_object_getSet;

class StructThinWrapAPI_object_getSetTest
    extends \Codeception\Test\Unit {
    
    protected UnitTester $tester;
    
    /**
     * @return void
     */
    public function testInstantiation(): void {
        $propsEmpty = [];
        $propsSome = ["a"];
        
        
        $instance = StructThinWrapAPI_object_getSet::instance($propsEmpty);
        self::assertInstanceOf(I_StructThinWrapAPI::class, $instance);
        self::assertInstanceOf(StructThinWrapAPI_object_getSet::class, $instance);
        
        $instance2 = StructThinWrapAPI_object_getSet::instance($propsEmpty);
        self::assertSame($instance, $instance2);
        
        $instance3 = StructThinWrapAPI_object_getSet::instance($propsSome);
        self::assertNotSame($instance, $instance3);
    }
    
    
}
