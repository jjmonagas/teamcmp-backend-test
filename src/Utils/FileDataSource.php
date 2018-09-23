<?php
/**
 * Created by PhpStorm.
 * User: jjmonagas
 * Date: 23/9/18
 * Time: 13:21
 */

namespace App\Utils;


use App\Model\DataSourceLoaderInterface;
use Symfony\Component\Filesystem\Filesystem;

class FileDataSource implements DataSourceLoaderInterface
{

    /**
     * @var string
     */
    protected $pathToFile;

    /**
     * @var
     */
    protected $fileName;

    /**
     * FileDataSource constructor.
     * @param string $pathToFile
     * @param $fileName
     */
    public function __construct(string $pathToFile, $fileName)
    {
        $this->pathToFile = $pathToFile;
        $this->fileName = $fileName;
    }


    public function loadData(): ?string
    {
        $data = null;
        $fileSystem = new Filesystem();

        if ($fileSystem->exists([$this->pathToFile, $this->getFullPath()])) {
            $data = file_get_contents($this->getFullPath());
        }
        return $data;
    }


    protected function getFullPath() :string {
        return $this->pathToFile . '/' . $this->fileName;
    }

}