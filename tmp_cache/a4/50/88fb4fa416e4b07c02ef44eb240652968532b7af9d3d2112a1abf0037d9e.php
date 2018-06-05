<?php

/* contact.twig */
class __TwigTemplate_a45088fb4fa416e4b07c02ef44eb240652968532b7af9d3d2112a1abf0037d9e extends Twig_Template
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
        echo "Ceci est la page de contact";
    }

    // line 3
    public function block_content($context, array $blocks = array())
    {
        // line 4
        echo "Bienvenu ";
        if (isset($context["pseudo"])) { $_pseudo_ = $context["pseudo"]; } else { $_pseudo_ = null; }
        echo twig_escape_filter($this->env, $_pseudo_, "html", null, true);
        echo " sur mon site. Ceci est la page de contacts.
";
    }

    public function getTemplateName()
    {
        return "contact.twig";
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
