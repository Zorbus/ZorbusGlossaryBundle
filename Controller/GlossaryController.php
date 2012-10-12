<?php

namespace Zorbus\GlossaryBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class GlossaryController extends Controller
{
    public function indexAction()
    {
        $alphabet = $this->container->getParameter('zorbus_glossary_alphabet');

        $letters = str_split($alphabet);

        if (!$this->container->getParameter('zorbus_glossary_show_empty')){
            $letters = $this->getDoctrine()->getRepository('ZorbusGlossaryBundle:Glossary')->getEntriesWithLetters($letters);
        }

        return $this->render('ZorbusGlossaryBundle:Glossary:index.html.twig', array('letters' => $letters));
    }
    public function headerAction()
    {
        $alphabet = $this->container->getParameter('zorbus_glossary_alphabet');

        $letters = str_split($alphabet);

        if (!$this->container->getParameter('zorbus_glossary_show_empty')){
            $letters = $this->getDoctrine()->getRepository('ZorbusGlossaryBundle:Glossary')->getEntriesWithLetters($letters);
        }

        return $this->render('ZorbusGlossaryBundle:Glossary:header.html.twig', array('letters' => $letters));
    }
    public function letterAction($letter)
    {
        $entries = $this->getDoctrine()->getRepository('ZorbusGlossaryBundle:Glossary')->getEntriesByLetter($letter);

        return $this->render('ZorbusGlossaryBundle:Glossary:letter.html.twig', array('entries' => $entries, 'letter' => $letter));
    }
    public function entryAction($slug)
    {
        $entry = $this->getDoctrine()->getRepository('ZorbusGlossaryBundle:Glossary')->getEntry($slug);

        return $this->render('ZorbusGlossaryBundle:Glossary:entry.html.twig', array('entry' => $entry));
    }
}
