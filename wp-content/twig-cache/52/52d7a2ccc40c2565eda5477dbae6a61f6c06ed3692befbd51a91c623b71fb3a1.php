<?php

/* @Axisubs/Admin/header/header.twig */
class __TwigTemplate_95cd0833fd6940693cecab3c93918c3b0f74d35ecc804f1919cbd47ae32a00fa extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<div class=\"axisubs\">
    <div class=\"head-title\"><span> Axis Subscriptions </span><small>version ";
        // line 2
        echo twig_escape_filter($this->env, (isset($context["plugin_version"]) ? $context["plugin_version"] : null), "html", null, true);
        echo "</small></div>
</div>";
    }

    public function getTemplateName()
    {
        return "@Axisubs/Admin/header/header.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  22 => 2,  19 => 1,);
    }
}
/* <div class="axisubs">*/
/*     <div class="head-title"><span> Axis Subscriptions </span><small>version {{ plugin_version }}</small></div>*/
/* </div>*/
