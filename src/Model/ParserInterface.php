<?php
/**
 * Created by PhpStorm.
 * User: jjmonagas
 * Date: 23/9/18
 * Time: 12:06
 */

namespace App\Model;


interface ParserInterface
{
    public function parse(string $input): array;
}