<?php

namespace Ign\BootstrapBundle\Twig;

use Symfony\Component\HttpFoundation\Session\Session;
use Twig_Extension;
use Twig_SimpleFunction;

class BootstrapExtension extends Twig_Extension
{
    /**
     *
     * @var Session
     */
    protected $session;
    
    public function __construct(Session $session) {
        $this->session = $session;
    }

    public function getFunctions() {
        return [
            new Twig_SimpleFunction('alert', [$this, 'alert'], ['is_safe' => ['html']]),
            new Twig_SimpleFunction('flashAlert', [$this, 'flashAlert'], ['is_safe' => ['html']]),
        ];
    }
    
    public function alert($msg)
    {
        return <<<HTML
<div class="alert alert-success">
$msg  
</div>
HTML;
    }
    
    public function flashAlert($type)
    {
        $html = '';
        
        foreach ($this->session->getFlashBag()->get($type) as $message) {
            $html .= $this->alert($message);
        }
        
        return $html;
    }
    
    public function getName()
    {
        return 'bootstrap_extension';
    }

}
