<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\CoreExtension;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;
use Twig\TemplateWrapper;

/* admin.html.twig */
class __TwigTemplate_ec8d58d3b3ae60fc70a88c7903770f29 extends Template
{
    private Source $source;
    /**
     * @var array<string, Template>
     */
    private array $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'header' => [$this, 'block_header'],
            'content' => [$this, 'block_content'],
        ];
    }

    protected function doGetParent(array $context): bool|string|Template|TemplateWrapper
    {
        // line 1
        return "@layouts/base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $this->parent = $this->load("@layouts/base.html.twig", 1);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_header(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 4
        yield from $this->load("@common/admin_navbar.html.twig", 4)->unwrap()->yield($context);
        yield from [];
    }

    // line 7
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_content(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 8
        yield "<main class=\"container\">
\t<section class=\"flex flex-direction row-reverse\">
\t\t<form class=\"searchbox\">
\t\t\t<fieldset role=\"group\">
\t\t\t\t<input type=\"search\" name=\"search\" placeholder=\"Search\" aria-label=\"Search\" />
\t\t\t</fieldset>
\t\t</form>
\t</section>
\t<hr />
\t<section hx-get=\"/complaints/table/admin\" hx-trigger=\"load delay:500ms\" hx-swap=\"innerHTML\"
\t\thx-indicator=\"#indicator\" id=\"response\">
\t</section>
\t<div class=\"flex center\">
\t\t<img id=\"indicator\" class=\"htmx-indicator\" src=\"assets/svg-loaders/three-dots.svg\" />
\t</div>
</main>
";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "admin.html.twig";
    }

    /**
     * @codeCoverageIgnore
     */
    public function isTraitable(): bool
    {
        return false;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo(): array
    {
        return array (  71 => 8,  64 => 7,  59 => 4,  52 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends '@layouts/base.html.twig' %}

{% block header %}
{% include '@common/admin_navbar.html.twig' %}
{% endblock %}

{% block content %}
<main class=\"container\">
\t<section class=\"flex flex-direction row-reverse\">
\t\t<form class=\"searchbox\">
\t\t\t<fieldset role=\"group\">
\t\t\t\t<input type=\"search\" name=\"search\" placeholder=\"Search\" aria-label=\"Search\" />
\t\t\t</fieldset>
\t\t</form>
\t</section>
\t<hr />
\t<section hx-get=\"/complaints/table/admin\" hx-trigger=\"load delay:500ms\" hx-swap=\"innerHTML\"
\t\thx-indicator=\"#indicator\" id=\"response\">
\t</section>
\t<div class=\"flex center\">
\t\t<img id=\"indicator\" class=\"htmx-indicator\" src=\"assets/svg-loaders/three-dots.svg\" />
\t</div>
</main>
{% endblock %}", "admin.html.twig", "/var/www/src/views/admin.html.twig");
    }
}
