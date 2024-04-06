<?php
namespace Gappy\Tests;

use Glowgaia\Gappy\GaiaAquariumAttribute;
use PHPUnit\Framework\TestCase;

class GaiaAquariumAttributeTest extends TestCase{
    public function test_there_are_only_5_attributes(){
        $attributes = GaiaAquariumAttribute::get();

        $this->assertCount(5, $attributes);
    }
    public function test_you_can_get_the_first_attribute(){
        $attribute = GaiaAquariumAttribute::get(1);

        $name = $attribute->keys()[0];
        $value = $attribute->first();

        $this->assertSame('max_health', $name);
        $this->assertSame('32766', $value);
    }
}