<?php

class Subscription_test extends TestCase
{

	public function test_get_subscribers(){

		$output = $this->request('GET', 'sub/getsubno');
		$expected = null;
		$this->assertEquals($expected, $output);

	}
}
