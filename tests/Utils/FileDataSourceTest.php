<?php

namespace App\Tests\Utils;

use PHPUnit\Framework\TestCase;

class FileDataSourceTest extends TestCase
{
    /**
     * @dataProvider directoriesProvider
     */
    public function testDirectoryExists(string $pathToFeeds)
    {
        $this->assertDirectoryExists(__DIR__.'/../..'. $pathToFeeds);
    }

    /**
     * @dataProvider fileNamesProvider
     */
    public function testFileExists(string $pathToFeeds, string $fileName)
    {
        $this->assertFileExists(__DIR__.'/../..'. $pathToFeeds.'/'.$fileName);
    }

    public function directoriesProvider() {
        return [['/feed-exports']];
    }

    public function fileNamesProvider() {
        return [
            ['/feed-exports', 'flub.yaml'],
            ['/feed-exports', 'glorf.json']
        ];
    }
}
