<?php
/**
 * Created by PhpStorm.
 * User: jjmonagas
 * Date: 23/9/18
 * Time: 1:15
 */

namespace App\Entity;


class VideoLink
{

    /**
     * @var string
     */
    protected $title;

    /**
     * @var string
     */
    protected $tags;

    /**
     * @var string
     */
    protected $url;

    /**
     * @var \DateTime
     */
    protected $createdAt;

    /**
     * VideoLink constructor.
     */
    public function __construct()
    {
        $this->createdAt = new \DateTime('now');
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
     * @return VideoLink
     */
    public function setTitle(string $title): VideoLink
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return string
     */
    public function getTags(): ?string
    {
        return $this->tags;
    }

    /**
     * @param string $tags
     * @return VideoLink
     */
    public function setTags(?string $tags): VideoLink
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
     * @return VideoLink
     */
    public function setUrl(string $url): VideoLink
    {
        $this->url = $url;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedAt(): \DateTime
    {
        return $this->createdAt;
    }

    /**
     * @param \DateTime $createdAt
     * @return VideoLink
     */
    public function setCreatedAt(\DateTime $createdAt): VideoLink
    {
        $this->createdAt = $createdAt;
        return $this;
    }


    public function persist() {
        return 'Persisting data to Database...';
    }

}