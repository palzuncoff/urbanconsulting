<?php

/* @Axisubs/Site/plans/subscribe_button.twig */
class __TwigTemplate_fd21ad393fec50a7d516c0c5a5944c091af0822f25efa9109d1f7d1b3482491a extends Twig_Template
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
        echo "<a class=\"axisubs-btn\" href=\"";
        echo twig_escape_filter($this->env, (isset($context["plan_url"]) ? $context["plan_url"] : null), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : null), "subscribe_btn_text", array(), "array"), "html", null, true);
        echo "</a>
";
    }

    public function getTemplateName()
    {
        return "@Axisubs/Site/plans/subscribe_button.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  19 => 1,);
    }
}
/* <a class="axisubs-btn" href="{{ plan_url }}">{{ data['subscribe_btn_text'] }}</a>*/
/* */
