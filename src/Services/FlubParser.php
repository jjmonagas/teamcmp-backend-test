<?php
/**
 * Created by PhpStorm.
 * User: jjmonagas
 * Date: 23/9/18
 * Time: 12:40
 */

namespace App\Services;


use App\Entity\VideoLink;
use App\Model\FlubContentModel;
use App\Model\ParserInterface;
use JMS\Serializer\ArrayTransformerInterface;
use Symfony\Component\Yaml\Yaml;

class FlubParser implements ParserInterface
{

    protected $arrayTransformer;

    /**
     * FlubParser constructor.
     * @param ArrayTransformerInterface $arrayTransformer
     */
    public function __construct(ArrayTransformerInterface $arrayTransformer)
    {
        $this->arrayTransformer = $arrayTransformer;
    }


    public function parse(string $input): array
    {
        $videoLinks = [];
        $data = Yaml::parse($input);

        foreach ($data as $videoLink) {
            $videoData = $this->arrayTransformer->fromArray($videoLink, FlubContentModel::class);
            if ($videoData instanceof FlubContentModel){
                $videoLink = new VideoLink();
                $videoLink->setTitle($videoData->getName());
                $videoLink->setTags($videoData->getLabels());
                $videoLink->setUrl($videoData->getUrl());
                $videoLinks[] = $videoLink;
            }
        }
        return $videoLinks;
    }


}