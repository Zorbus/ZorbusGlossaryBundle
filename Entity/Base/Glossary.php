<?php

namespace Zorbus\GlossaryBundle\Entity\Base;

use Doctrine\ORM\Mapping as ORM;

/**
 * Zorbus\GlossaryBundle\Entity\Glossary
 */
abstract class Glossary
{
    public function __toString()
    {
        return $this->getTitle();
    }
}