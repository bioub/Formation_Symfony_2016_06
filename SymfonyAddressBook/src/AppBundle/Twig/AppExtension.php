<?php


namespace AppBundle\Twig;

class AppExtension extends \Twig_Extension
{
    /**
     *
     * @var \AppBundle\Manager\SocieteManager
     */
    protected $societeManager;
    
    public function __construct(\AppBundle\Manager\SocieteManager $societeManager) {
        $this->societeManager = $societeManager;
    }

    
    public function getFunctions() {
        return [
            new \Twig_SimpleFunction('menuContactParSociete', [$this, 'menuContactParSociete'], ['is_safe' => ['html']])
        ];
    }
    
    public function menuContactParSociete()
    {
        $societes = $this->societeManager->getAll();
        
        $html = '';
        
        foreach ($societes as $societe) {
            $html .= '<li><a href="#">' . strip_tags($societe->getNom()) . '</a></li>';
        }
        
        return $html;
    }
    
    public function getName()
    {
        return 'app_extension';
    }
}
