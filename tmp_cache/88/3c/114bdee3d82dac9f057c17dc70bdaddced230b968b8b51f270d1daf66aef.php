<?php

/* errPage.twig */
class __TwigTemplate_883c114bdee3d82dac9f057c17dc70bdaddced230b968b8b51f270d1daf66aef extends Twig_Template
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
        echo "page non trouvée";
    }

    // line 3
    public function block_content($context, array $blocks = array())
    {
        // line 4
        echo "La page que vous demandez n'existe pas...
";
    }

    public function getTemplateName()
    {
        return "errPage.twig";
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
