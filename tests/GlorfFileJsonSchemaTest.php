<?php
/**
 * Created by PhpStorm.
 * User: jjmonagas
 * Date: 23/9/18
 * Time: 20:48
 */

namespace App\Tests;


use Symfony\Bundle\FrameworkBundle\Tests\TestCase;

class GlorfFileJsonSchemaTest extends TestCase
{

    public function testJsonSchema() {

        $jsonFile = __DIR__.'/../feed-exports/glorf.json';

        $this->assertFileExists($jsonFile);

        $data = file_get_contents($jsonFile);

        $jsonData = json_decode($data, true);

        $this->assertArrayHasKey('videos', $jsonData);

        foreach ($jsonData['videos'] as $link) {
            $this->assertArrayHasKey('url', $link);
            $this->assertArrayHasKey('title', $link);
        }

    }


}