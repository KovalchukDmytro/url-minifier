<?php

namespace Tests\Feature\Http\Controllers;

use Tests\TestCase;

/**
 * Class StatisticsControllerTest
 * @package Tests\Feature\Http\Controllers
 */
class StatisticsControllerTest extends TestCase
{

    /**
     *
     */
    public function testIndex()
    {
        $response = $this->get('/statistics');

        $response->assertStatus(200);
        $response->assertViewIs('pages.statistics');
    }
}
