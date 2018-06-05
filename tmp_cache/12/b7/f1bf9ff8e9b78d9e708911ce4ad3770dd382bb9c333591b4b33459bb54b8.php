<?php

/* main.twig */
class __TwigTemplate_12b7f1bf9ff8e9b78d9e708911ce4ad3770dd382bb9c333591b4b33459bb54b8 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'head' => array($this, 'block_head'),
            'title' => array($this, 'block_title'),
            'content' => array($this, 'block_content'),
            'footer' => array($this, 'block_footer'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html>
    <head>
";
        // line 4
        $this->displayBlock('head', $context, $blocks);
        // line 9
        echo "        </head>
        <body>
            <div id=\"container\">
                <div id=\"header\"></div>
                <div id=\"menu\"></div>
                <div id=\"content\">";
        // line 14
        $this->displayBlock('content', $context, $blocks);
        echo "</div>
                <div id=\"footer\">
";
        // line 16
        $this->displayBlock('footer', $context, $blocks);
        // line 19
        echo "                    </div>
                </div>
            </body>
        </html>";
    }

    // line 4
    public function block_head($context, array $blocks = array())
    {
        // line 5
        echo "            <link rel=\"stylesheet\" href=\"style.css\" />
            <meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">
            <title>";
        // line 7
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
";
    }

    public function block_title($context, array $blocks = array())
    {
    }

    // line 14
    public function block_content($context, array $blocks = array())
    {
    }

    // line 16
    public function block_footer($context, array $blocks = array())
    {
        // line 17
        echo "                        &copy; Copyright 2011 by <a href=\"http://domain.invalid/\">you</a>.
";
    }

    public function getTemplateName()
    {
        return "main.twig";
    }

    public function getDebugInfo()
    {
        return array (  76 => 17,  73 => 16,  68 => 14,  58 => 7,  54 => 5,  51 => 4,  44 => 19,  42 => 16,  37 => 14,  30 => 9,  28 => 4,  23 => 1,  38 => 4,  35 => 3,  29 => 2,);
    }
}
