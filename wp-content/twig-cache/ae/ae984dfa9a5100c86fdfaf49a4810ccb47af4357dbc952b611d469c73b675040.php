<?php

/* @Axisubs/Admin/header/header.twig */
class __TwigTemplate_c0741c17190139050d37ae10712e641d73059e13ed54f9a2a4740be96c68bdc0 extends Twig_Template
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
