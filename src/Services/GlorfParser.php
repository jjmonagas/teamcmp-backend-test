<?php
/**
 * Created by PhpStorm.
 * User: jjmonagas
 * Date: 23/9/18
 * Time: 12:40
 */

namespace App\Services;


use App\Entity\VideoLink;
use App\Model\GlorfContentModel;
use App\Model\ParserInterface;
use JMS\Serializer\ArrayTransformerInterface;

class GlorfParser implements ParserInterface
{

    protected $arrayTransformer;

    /**
     * GlorfParser constructor.
     */
    public function __construct(ArrayTransformerInterface $arrayTransformer)
    {
        $this->arrayTransformer = $arrayTransformer;
    }

    public function parse(string $input): array
    {
        $videoLinks = [];
        $jsonData = json_decode($input, true);

        if (array_key_exists('videos', $jsonData)) {
            foreach ($jsonData['videos'] as $videoLink) {
                $videoData = $this->arrayTransformer->fromArray($videoLink, GlorfContentModel::class);
                if ($videoData instanceof GlorfContentModel) {
                    $videoLink = new VideoLink();
                    $videoLink->setTitle($videoData->getTitle());
                    if ($videoData->getTags() !== null && \count($videoData->getTags()) > 0) {
                        $videoLink->setTags(implode(',', $videoData->getTags()));
                    }
                    $videoLink->setUrl($videoData->getUrl());
                    $videoLinks[] = $videoLink;
                }
            }
        }
        return $videoLinks;
    }


}