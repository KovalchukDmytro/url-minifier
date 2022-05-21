<?php

namespace Tests\Unit\Helpers;

use App\Helpers\UrlFormatHelper;
use PHPUnit\Framework\TestCase;

/**
 * Class UrlFormatHelperTest
 * @package Tests\Unit\Helpers
 */
class UrlFormatHelperTest extends TestCase
{
    /**
     *
     */
    public function testEncodeURL()
    {
        $inputData = 'https://www.google.com.ua/';
        $expectedData = 'aHR0cHM6Ly93d3cuZ29vZ2xlLmNvbS51YQ==';

        $functionResult = UrlFormatHelper::encodeURL($inputData);

        $this->assertEquals($expectedData, $functionResult);
    }

    /**
     *
     */
    public function testDecodeURL()
    {
        $inputData = 'aHR0cHM6Ly93d3cuZ29vZ2xlLmNvbS51YQ==';
        $expectedData = 'https://www.google.com.ua';

        $functionResult = UrlFormatHelper::decodeURL($inputData);

        $this->assertEquals($expectedData, $functionResult);
    }
}
