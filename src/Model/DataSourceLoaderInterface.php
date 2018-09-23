<?php
/**
 * Created by PhpStorm.
 * User: jjmonagas
 * Date: 23/9/18
 * Time: 1:24
 */

namespace App\Model;


interface DataSourceLoaderInterface
{

    public function loadData(): ?string;

}