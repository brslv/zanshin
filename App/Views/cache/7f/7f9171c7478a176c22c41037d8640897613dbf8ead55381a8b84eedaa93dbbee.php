<?php

/* home/index.twig */
class __TwigTemplate_eba0fc707592e827ff8bdc602ea2912acf82bfc7edfef5d9251dc85a38e3e28d extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("master.twig", "home/index.twig", 1);
        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "master.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = array())
    {
        // line 4
        echo "    <div class=\"container\">
        <h1 style=\"margin-top: 100px;\">Welcome abroad, <br /> ";
        // line 5
        echo twig_escape_filter($this->env, (isset($context["salute"]) ? $context["salute"] : null), "html", null, true);
        echo ".</h1>
        <h3>This is ";
        // line 6
        echo twig_escape_filter($this->env, (isset($context["name"]) ? $context["name"] : null), "html", null, true);
        echo ".</h3>
    </div>
";
    }

    public function getTemplateName()
    {
        return "home/index.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  38 => 6,  34 => 5,  31 => 4,  28 => 3,  11 => 1,);
    }
}
/* {% extends "master.twig" %}*/
/* */
/* {% block content %}*/
/*     <div class="container">*/
/*         <h1 style="margin-top: 100px;">Welcome abroad, <br /> {{ salute }}.</h1>*/
/*         <h3>This is {{ name }}.</h3>*/
/*     </div>*/
/* {% endblock %}*/
/* */
