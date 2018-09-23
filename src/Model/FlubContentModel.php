<?php
/**
 * Created by PhpStorm.
 * User: jjmonagas
 * Date: 23/9/18
 * Time: 2:04
 */

namespace App\Model;

use JMS\Serializer\Annotation\Type;

class FlubContentModel
{

    /**
     * @Type("string")
     * @var string
     */
    protected $labels;

    /**
     * @Type("string")
     * @var string
     */
    protected $url;

    /**
     * @Type("string")
     * @var string
     */
    protected $name;

    /**
     * @return string
     */
    public function getLabels(): ?string
    {
        return $this->labels;
    }

    /**
     * @param string $labels
     * @return FlubContentModel
     */
    public function setLabels(string $labels): FlubContentModel
    {
        $this->labels = $labels;
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
     * @return FlubContentModel
     */
    public function setUrl(string $url): FlubContentModel
    {
        $this->url = $url;
        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return FlubContentModel
     */
    public function setName(string $name): FlubContentModel
    {
        $this->name = $name;
        return $this;
    }

}