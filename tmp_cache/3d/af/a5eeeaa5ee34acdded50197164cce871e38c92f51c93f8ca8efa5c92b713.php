<?php

/* connexion.twig */
class __TwigTemplate_3dafa5eeeaa5ee34acdded50197164cce871e38c92f51c93f8ca8efa5c92b713 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("main.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "main.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_title($context, array $blocks = array())
    {
        echo "page de connexion";
    }

    // line 3
    public function block_content($context, array $blocks = array())
    {
        // line 4
        echo "On va mettre le formulaire ici...
";
    }

    public function getTemplateName()
    {
        return "connexion.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  38 => 4,  35 => 3,  29 => 2,);
    }
}
