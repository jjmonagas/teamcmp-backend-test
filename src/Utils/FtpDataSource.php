<?php
/**
 * Created by PhpStorm.
 * User: jjmonagas
 * Date: 23/9/18
 * Time: 13:21
 */

namespace App\Utils;

use App\Model\DataSourceLoaderInterface;

class FtpDataSource implements DataSourceLoaderInterface
{

    /**
     * @var string
     */
    protected $host;

    /**
     * @var string
     */
    protected $fileName;

    /**
     * FileDataSource constructor.
     * @param string $host
     * @param $fileName
     */
    public function __construct(string $host, string $fileName)
    {
        $this->host = $host;
        $this->fileName = $fileName;
    }


    public function loadData(): string
    {
        $data = null;

        //TODO FTP CONNECTION


        return $data;
    }


}