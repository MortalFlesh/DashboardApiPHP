<?php

namespace MF\Dashboard\ApiBundle\Repository;

use Doctrine\ORM\EntityRepository;
use MF\Dashboard\ApiBundle\Entity\Template;

class TemplateRepository extends EntityRepository
{
    /**
     * @param Template $template
     */
    public function save(Template $template)
    {
        $this->_em->persist($template);
        $this->_em->flush();
    }
}
