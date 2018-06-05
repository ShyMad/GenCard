<?php

/* deconnexion.twig */
class __TwigTemplate_2773180e5296778be0dde20bfd0fee1bc59d5db90436a079fff62e7127ef5b4d extends Twig_Template
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
        echo "page de deconnexion";
    }

    // line 3
    public function block_content($context, array $blocks = array())
    {
        // line 4
        echo "Au revoir ";
        if (isset($context["pseudo"])) { $_pseudo_ = $context["pseudo"]; } else { $_pseudo_ = null; }
        echo twig_escape_filter($this->env, $_pseudo_, "html", null, true);
        echo ". C'dest la page de déconnexion....
";
    }

    public function getTemplateName()
    {
        return "deconnexion.twig";
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
