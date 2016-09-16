<?php

namespace MF\Dashboard\ApiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 */
class Item
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @var int
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     * @var string
     */
    private $name;

    /**
     * @ORM\Column(type="string")
     * @var string
     */
    private $url;

    /**
     * @ORM\Column(type="integer")
     * @var int
     */
    private $top;

    /**
     * @ORM\Column(type="integer", name="`left`")
     * @var int
     */
    private $left;

    /**
     * @ORM\Column(type="integer")
     * @var int
     */
    private $height;

    /**
     * @ORM\Column(type="integer")
     * @var int
     */
    private $width;

    /**
     * @ORM\Column(type="integer")
     * @var int
     */
    private $refreshRate;

    /**
     * @ORM\ManyToOne(targetEntity="MF\Dashboard\ApiBundle\Entity\Template", inversedBy="items")
     * @var Template
     */
    private $template;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param string $url
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }

    /**
     * @return int
     */
    public function getTop()
    {
        return $this->top;
    }

    /**
     * @param int $top
     */
    public function setTop($top)
    {
        $this->top = $top;
    }

    /**
     * @return int
     */
    public function getLeft()
    {
        return $this->left;
    }

    /**
     * @param int $left
     */
    public function setLeft($left)
    {
        $this->left = $left;
    }

    /**
     * @return int
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * @param int $height
     */
    public function setHeight($height)
    {
        $this->height = $height;
    }

    /**
     * @return int
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * @param int $width
     */
    public function setWidth($width)
    {
        $this->width = $width;
    }

    /**
     * @return int
     */
    public function getRefreshRate()
    {
        return $this->refreshRate;
    }

    /**
     * @param int $refreshRate
     */
    public function setRefreshRate($refreshRate)
    {
        $this->refreshRate = $refreshRate;
    }

    /**
     * @return Template
     */
    public function getTemplate()
    {
        return $this->template;
    }

    /**
     * @param Template $template
     */
    public function setTemplate(Template $template)
    {
        $this->template = $template;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return [
            'id' => $this->getId(),
            'name' => $this->getName(),
            'url' => $this->getUrl(),
            'top' => $this->getTop(),
            'left' => $this->getLeft(),
            'height' => $this->getHeight(),
            'width' => $this->getWidth(),
            'refreshRate' => $this->getRefreshRate(),
        ];
    }
}
