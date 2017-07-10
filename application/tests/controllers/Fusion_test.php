<?php

class Fusion_test extends TestCase
{
    public function test_index()
    {
        $result = $this->request('GET', 'fusion/count_waterpoints/all/all/all/all/all');
        $out = json_decode($result);
        $this->assertTrue(is_numeric($out[0]->count));
    }
}