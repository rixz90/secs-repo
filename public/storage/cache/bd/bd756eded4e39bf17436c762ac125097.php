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

/* aduan.html.twig */
class __TwigTemplate_0c1591b1fcf10ee4bb8652a3be8c1b99 extends Template
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
        yield from $this->load("@common/user_navbar.html.twig", 4)->unwrap()->yield($context);
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
    <h2>Lodge Complaint</h2>
    <hr />
    <section x-data=\"aduanView\">
        <details class=\"dropdown\" x-ref=\"dropdown\">
            <summary x-html=\"val\"></summary>
            <ul>
                <li>
                    <label>
                        <input type=\"radio\" name=\"isType\" value=\"Student\" @click=\"toggleStudent\"
                            hx-get=\"/complaints/form/ng\" hx-target=\"#target\" hx-swap=\"innerHTML\"
                            hx-indicator=\"#indicator\" />Student
                    </label>
                </li>
                <li>
                    <label>
                        <input type=\"radio\" name=\"isType\" value=\"Staff\" @click=\"toggleStaff\"
                            hx-get=\"/complaints/form/ng\" hx-target=\"#target\" hx-swap=\"innerHTML\"
                            hx-indicator=\"#indicator\" />Staff
                    </label>
                </li>
                <li>
                    <label>
                        <input type=\"radio\" name=\"isType\" value=\"Guest\" @click=\"student=false, staff=false, 
                                    \$refs.dropdown.open=false,
                                    val='Guest',
                                    showForm=true
                                \" hx-get=\"/complaints/form/g\" hx-target=\"#target\" hx-swap=\"innerHTML\"
                            hx-indicator=\"#indicator\" />Guest
                    </label>
                </li>
            </ul>
        </details>
        <hr />
        <section x-show=\"showForm\" x-transition id=\"target\"></section>
        <div class=\"flex center\">
            <img id=\"indicator\" class=\"htmx-indicator\" src=\"assets/svg-loaders/three-dots.svg\" />
        </div>
    </section>
</main>
";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "aduan.html.twig";
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
{% include '@common/user_navbar.html.twig' %}
{% endblock %}

{% block content %}
<main class=\"container\">
    <h2>Lodge Complaint</h2>
    <hr />
    <section x-data=\"aduanView\">
        <details class=\"dropdown\" x-ref=\"dropdown\">
            <summary x-html=\"val\"></summary>
            <ul>
                <li>
                    <label>
                        <input type=\"radio\" name=\"isType\" value=\"Student\" @click=\"toggleStudent\"
                            hx-get=\"/complaints/form/ng\" hx-target=\"#target\" hx-swap=\"innerHTML\"
                            hx-indicator=\"#indicator\" />Student
                    </label>
                </li>
                <li>
                    <label>
                        <input type=\"radio\" name=\"isType\" value=\"Staff\" @click=\"toggleStaff\"
                            hx-get=\"/complaints/form/ng\" hx-target=\"#target\" hx-swap=\"innerHTML\"
                            hx-indicator=\"#indicator\" />Staff
                    </label>
                </li>
                <li>
                    <label>
                        <input type=\"radio\" name=\"isType\" value=\"Guest\" @click=\"student=false, staff=false, 
                                    \$refs.dropdown.open=false,
                                    val='Guest',
                                    showForm=true
                                \" hx-get=\"/complaints/form/g\" hx-target=\"#target\" hx-swap=\"innerHTML\"
                            hx-indicator=\"#indicator\" />Guest
                    </label>
                </li>
            </ul>
        </details>
        <hr />
        <section x-show=\"showForm\" x-transition id=\"target\"></section>
        <div class=\"flex center\">
            <img id=\"indicator\" class=\"htmx-indicator\" src=\"assets/svg-loaders/three-dots.svg\" />
        </div>
    </section>
</main>
{% endblock %}", "aduan.html.twig", "/var/www/src/views/aduan.html.twig");
    }
}
