<?php

namespace Zorbus\GlossaryBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class BlockController extends Controller
{
    public function defaultAction($block)
    {
        $parameters = json_decode($block->getParameters());
        $glossary = $this->getDoctrine()->getRepository('ZorbusGlossaryBundle:Glossary')->find($parameters->glossary_id);
        $entries = array();
        $letters = array();
        if ($glossary)
        {
            $allEntries = $glossary->getEntries();
            foreach ($allEntries as $entry)
            {
                $hash = md5($entry->getLetter());
                $entries[$hash][] = $entry;
                $letters[$hash] = $entry->getLetter();
            }
        }

        return $this->render('ZorbusGlossaryBundle:Block:default.html.twig', array(
            'block' => $block, 'glossary' => $glossary, 'entries' => $entries, 'letters' => $letters
        ));
    }
    public function allAction($block)
    {
        $parameters = json_decode($block->getParameters());
        $glossary = $this->getDoctrine()->getRepository('ZorbusGlossaryBundle:Glossary')->find($parameters->glossary_id);
        $entries = array();
        $letters = array();
        if ($glossary)
        {
            foreach (str_split($glossary->getLetters(), 1) as $letter)
            {
                $hash = md5($letter);
                $letters[$hash] = $letter;
            }

            $allEntries = $glossary->getEntries();
            foreach ($allEntries as $entry)
            {
                $hash = md5($entry->getLetter());
                $entries[$hash][] = $entry;
            }
        }
        return $this->render('ZorbusGlossaryBundle:Block:all.html.twig', array(
            'block' => $block, 'glossary' => $glossary, 'entries' => $entries, 'letters' => $letters
        ));
    }
}
