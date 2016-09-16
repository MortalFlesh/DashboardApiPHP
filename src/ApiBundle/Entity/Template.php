<?php

namespace MF\Dashboard\ApiBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="MF\Dashboard\ApiBundle\Repository\TemplateRepository")
 */
class Template
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
     * @ORM\OneToMany(targetEntity="MF\Dashboard\ApiBundle\Entity\Item", mappedBy="template", cascade={"persist", "remove"}, fetch="EXTRA_LAZY")
     * @var Item[]|Collection
     */
    private $items;

    public function __construct()
    {
        $this->items = new ArrayCollection();
    }

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
     * @return Collection|Item[]
     */
    public function getItems()
    {
        return $this->items;
    }

    /**
     * @param Collection|Item[] $items
     */
    public function setItems(Collection $items)
    {
        $this->items = $items;
    }

    /**
     * @param Item $item
     */
    public function addItem(Item $item)
    {
        $item->setTemplate($this);

        $items = $this->getItems();
        $items->add($item);

        $this->setItems($items);
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return [
            'id' => $this->getId(),
            'name' => $this->getName(),
        ];
    }
}
