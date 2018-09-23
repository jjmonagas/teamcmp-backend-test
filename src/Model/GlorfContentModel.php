<?php
/**
 * Created by PhpStorm.
 * User: jjmonagas
 * Date: 23/9/18
 * Time: 2:04
 */

namespace App\Model;

use JMS\Serializer\Annotation\Type;

class GlorfContentModel
{

    /**
     * @Type("array")
     * @var array
     */
    protected $tags;

    /**
     * @Type("string")
     * @var string
     */
    protected $url;

    /**
     * @Type("string")
     * @var string
     */
    protected $title;

    /**
     * @return array
     */
    public function getTags(): ?array
    {
        return $this->tags;
    }

    /**
     * @param array $tags
     * @return GlorfContentModel
     */
    public function setTags(array $tags): GlorfContentModel
    {
        $this->tags = $tags;
        return $this;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @param string $url
     * @return GlorfContentModel
     */
    public function setUrl(string $url): GlorfContentModel
    {
        $this->url = $url;
        return $this;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return GlorfContentModel
     */
    public function setTitle(string $title): GlorfContentModel
    {
        $this->title = $title;
        return $this;
    }


}