<?php

namespace Galahad\Aire\Tests\Unit;

use Galahad\Aire\Tests\TestCase;

class GroupTest extends TestCase
{
	public function test_an_input_can_be_grouped()
	{
		$input = $this->aire()->input();
		
		$this->assertSelectorExists($input, 'div > input[type="text"]');
		$this->assertSelectorClassNames($input, 'div', ['p-2', 'm-2']);
	}
	
	public function test_a_group_can_have_a_label() : void
	{
		$input = $this->aire()
			->input('foo')
			->id('bar')
			->label('Foo Input');
		
		$this->assertSelectorText($input, 'div > label', 'Foo Input');
		$this->assertSelectorAttribute($input, 'div > label', 'for', 'bar');
	}
	
	public function test_setting_the_id_on_a_labelled_group_input_sets_for_tag_on_label() : void
	{
		$input = $this->aire()
			->input()
			->label('Foo Input');
		
		$this->assertSelectorAttributeMissing($input, 'div > label', 'for');
		
		$input->id('bar');
		
		$this->assertSelectorAttribute($input, 'div > label', 'for', 'bar');
	}
}
