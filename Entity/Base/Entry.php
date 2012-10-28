<?php

namespace Zorbus\GlossaryBundle\Entity\Base;

use Doctrine\ORM\Mapping as ORM;

/**
 * Zorbus\GlossaryBundle\Entity\Entry
 */
abstract class Entry
{
    public function __toString()
    {
        return $this->getLetter() . ': '. $this->getExpression();
    }
}