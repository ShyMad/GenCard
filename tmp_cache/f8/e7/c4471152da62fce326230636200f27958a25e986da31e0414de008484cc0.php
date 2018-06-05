<?php

/* errAction.twig */
class __TwigTemplate_f8e7c4471152da62fce326230636200f27958a25e986da31e0414de008484cc0 extends Twig_Template
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
        echo "erreur action";
    }

    // line 3
    public function block_content($context, array $blocks = array())
    {
        // line 4
        echo "Vous n'êtes pas autorisé à effectuer cette action. Causes possibles, droits insufisants...
";
    }

    public function getTemplateName()
    {
        return "errAction.twig";
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
