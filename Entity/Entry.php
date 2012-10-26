<?php

namespace Zorbus\GlossaryBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Zorbus\GlossaryBundle\Entity\Entry
 */
class Entry
{
    /**
     * @var integer $id
     */
    private $id;

    /**
     * @var string $letter
     */
    private $letter;

    /**
     * @var string $expression
     */
    private $expression;

    /**
     * @var string $definition
     */
    private $definition;

    /**
     * @var string $slug
     */
    private $slug;

    /**
     * @var boolean $enabled
     */
    private $enabled;

    /**
     * @var \DateTime $created_at
     */
    private $created_at;

    /**
     * @var \DateTime $updated_at
     */
    private $updated_at;

    /**
     * @var Zorbus\GlossaryBundle\Entity\Glossary
     */
    private $glossary;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set letter
     *
     * @param string $letter
     * @return Entry
     */
    public function setLetter($letter)
    {
        $this->letter = $letter;
    
        return $this;
    }

    /**
     * Get letter
     *
     * @return string 
     */
    public function getLetter()
    {
        return $this->letter;
    }

    /**
     * Set expression
     *
     * @param string $expression
     * @return Entry
     */
    public function setExpression($expression)
    {
        $this->expression = $expression;
    
        return $this;
    }

    /**
     * Get expression
     *
     * @return string 
     */
    public function getExpression()
    {
        return $this->expression;
    }

    /**
     * Set definition
     *
     * @param string $definition
     * @return Entry
     */
    public function setDefinition($definition)
    {
        $this->definition = $definition;
    
        return $this;
    }

    /**
     * Get definition
     *
     * @return string 
     */
    public function getDefinition()
    {
        return $this->definition;
    }

    /**
     * Set slug
     *
     * @param string $slug
     * @return Entry
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;
    
        return $this;
    }

    /**
     * Get slug
     *
     * @return string 
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Set enabled
     *
     * @param boolean $enabled
     * @return Entry
     */
    public function setEnabled($enabled)
    {
        $this->enabled = $enabled;
    
        return $this;
    }

    /**
     * Get enabled
     *
     * @return boolean 
     */
    public function getEnabled()
    {
        return $this->enabled;
    }

    /**
     * Set created_at
     *
     * @param \DateTime $createdAt
     * @return Entry
     */
    public function setCreatedAt($createdAt)
    {
        $this->created_at = $createdAt;
    
        return $this;
    }

    /**
     * Get created_at
     *
     * @return \DateTime 
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * Set updated_at
     *
     * @param \DateTime $updatedAt
     * @return Entry
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updated_at = $updatedAt;
    
        return $this;
    }

    /**
     * Get updated_at
     *
     * @return \DateTime 
     */
    public function getUpdatedAt()
    {
        return $this->updated_at;
    }

    /**
     * Set glossary
     *
     * @param Zorbus\GlossaryBundle\Entity\Glossary $glossary
     * @return Entry
     */
    public function setGlossary(\Zorbus\GlossaryBundle\Entity\Glossary $glossary = null)
    {
        $this->glossary = $glossary;
    
        return $this;
    }

    /**
     * Get glossary
     *
     * @return Zorbus\GlossaryBundle\Entity\Glossary 
     */
    public function getGlossary()
    {
        return $this->glossary;
    }
}