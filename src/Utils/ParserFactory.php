<?php
/**
 * Created by PhpStorm.
 * User: jjmonagas
 * Date: 23/9/18
 * Time: 1:11
 */

namespace App\Utils;


use App\Entity\DataSource;
use App\Model\ParserInterface;
use App\Services\FlubParser;
use App\Services\GlorfParser;

class ParserFactory
{

    protected $glorfParser;
    protected $flubParser;

    /**
     * ParserFactory constructor.
     * @param GlorfParser $glorfParser
     * @param FlubParser $flubParser
     */
    public function __construct(GlorfParser $glorfParser, FlubParser $flubParser)
    {
        $this->glorfParser = $glorfParser;
        $this->flubParser = $flubParser;
    }

    public function createParserFromSource(string $source) :ParserInterface {
        switch ($source) {
            case DataSource::FLUB_DATA_SOURCE_COMMAND_NAME:
                return $this->createFlubParser();
                break;
            case DataSource::GLORF_DATA_SOURCE_COMMAND_NAME:
                return $this->createGlorfParser();
                break;
        }
    }


    public function createGlorfParser() :ParserInterface {
        return $this->glorfParser;
    }

    public function createFlubParser() :ParserInterface {
        return $this->flubParser;
    }


}