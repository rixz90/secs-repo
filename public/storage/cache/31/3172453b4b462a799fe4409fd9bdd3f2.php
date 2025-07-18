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

/* @common/actionButton.html.twig */
class __TwigTemplate_7f9ab0651795c4421803daa8a829df18 extends Template
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

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 1
        yield "<details class=\"dropdown\" style=\"margin-top: 1rem;\">
    <summary role=\"button\" class=\"outline secondary\" style=\"min-width:max-content\">
        <svg style=\"width: 1.35rem;height:1.35rem\">
            <use xlink:href=\"assets/images/sprite.svg#icon-menu\"></use>
        </svg>
        Action
    </summary>
    <ul>
        <li><a href=\"/\" hx-get=\"/";
        // line 9
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["controller"] ?? null), "html", null, true);
        yield "/edit/";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["id"] ?? null), "html", null, true);
        yield "\" hx-target=\"#response\" hx-swap=\"innerHTML\"
                hx-indicator=\"#indicator\">
                <svg style=\"width: 1.25rem;height:1.25rem;padding-bottom:5px;margin-left:9px;\">
                    <use xlink:href=\"assets/images/sprite.svg#icon-squared-plus\"></use>
                </svg>
                Update
            </a></li>
        <li>
            <form action=\"\">
                <input type=\"hidden\" name=\"id\" value=\"";
        // line 18
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["id"] ?? null), "html", null, true);
        yield "\">
                <a href=\"/\" hx-delete=\"/";
        // line 19
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["controller"] ?? null), "html", null, true);
        yield "/";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["method"] ?? null), "html", null, true);
        yield "\" hx-target=\"#response\" hx-swap=\"innerHTML\"
                    hx-indicator=\"#indicator\">
                    <svg style=\"width: 1.25rem;height:1.25rem;padding-bottom:5px;\">
                        <use xlink:href=\"assets/images/sprite.svg#icon-squared-minus\"></use>
                    </svg>
                    Delete
                </a>
            </form>
        </li>
    </ul>
</details>
<style>
    th,
    td {
        text-align: center;
    }
</style>";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@common/actionButton.html.twig";
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
        return array (  70 => 19,  66 => 18,  52 => 9,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<details class=\"dropdown\" style=\"margin-top: 1rem;\">
    <summary role=\"button\" class=\"outline secondary\" style=\"min-width:max-content\">
        <svg style=\"width: 1.35rem;height:1.35rem\">
            <use xlink:href=\"assets/images/sprite.svg#icon-menu\"></use>
        </svg>
        Action
    </summary>
    <ul>
        <li><a href=\"/\" hx-get=\"/{{ controller }}/edit/{{ id }}\" hx-target=\"#response\" hx-swap=\"innerHTML\"
                hx-indicator=\"#indicator\">
                <svg style=\"width: 1.25rem;height:1.25rem;padding-bottom:5px;margin-left:9px;\">
                    <use xlink:href=\"assets/images/sprite.svg#icon-squared-plus\"></use>
                </svg>
                Update
            </a></li>
        <li>
            <form action=\"\">
                <input type=\"hidden\" name=\"id\" value=\"{{ id }}\">
                <a href=\"/\" hx-delete=\"/{{ controller }}/{{ method }}\" hx-target=\"#response\" hx-swap=\"innerHTML\"
                    hx-indicator=\"#indicator\">
                    <svg style=\"width: 1.25rem;height:1.25rem;padding-bottom:5px;\">
                        <use xlink:href=\"assets/images/sprite.svg#icon-squared-minus\"></use>
                    </svg>
                    Delete
                </a>
            </form>
        </li>
    </ul>
</details>
<style>
    th,
    td {
        text-align: center;
    }
</style>", "@common/actionButton.html.twig", "/var/www/src/views/components/@common/actionButton.html.twig");
    }
}
