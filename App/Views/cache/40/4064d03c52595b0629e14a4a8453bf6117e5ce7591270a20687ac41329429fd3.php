<?php

/* master.twig */
class __TwigTemplate_1219203dded9ffa7a6af478448c9fda6162627331b262dbe48546d620b7e6647 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!doctype html>
<html lang=\"en\">
<head>
    <meta charset=\"UTF-8\">
    <title>Zanshin</title>
    <link rel=\"stylesheet\" href=\"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css\" />
</head>
<body>

<div class=\"container\">
    ";
        // line 11
        $this->displayBlock('content', $context, $blocks);
        // line 13
        echo "</div>

</body>
</html>
";
    }

    // line 11
    public function block_content($context, array $blocks = array())
    {
        // line 12
        echo "    ";
    }

    public function getTemplateName()
    {
        return "master.twig";
    }

    public function getDebugInfo()
    {
        return array (  45 => 12,  42 => 11,  34 => 13,  32 => 11,  20 => 1,);
    }
}
/* <!doctype html>*/
/* <html lang="en">*/
/* <head>*/
/*     <meta charset="UTF-8">*/
/*     <title>Zanshin</title>*/
/*     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" />*/
/* </head>*/
/* <body>*/
/* */
/* <div class="container">*/
/*     {% block content %}*/
/*     {% endblock %}*/
/* </div>*/
/* */
/* </body>*/
/* </html>*/
/* */
