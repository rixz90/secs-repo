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

/* @common/user_navbar.html.twig */
class __TwigTemplate_ab7a52943806e3215b14663c6d412655 extends Template
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
        yield "<div class=\"container\">
    <a href=\"/\" class=\"primary\">
        <svg style=\"width: 1.35rem;height:1.35rem\">
            <use xlink:href=\"assets/images/sprite.svg#icon-list\"></use>
        </svg>
        Home
    </a>
    <nav>
        <ul>
            <li><a href=\"/aduan\" class=\"secondary\">Create</a></li>
            <li><a href=\"/semakan\" class=\"secondary\">Review</a></li>
        </ul>
        <ul class=\"icons\">
            <li>
                <a href=\"/login\" class=\"secondary\">
                    <svg style=\"width: 1.35rem;height:1.35rem\">
                        <use xlink:href=\"assets/images/sprite.svg#icon-login\"></use>
                    </svg>
                    Login
                </a>
            </li>
        </ul>
    </nav>
</div>";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@common/user_navbar.html.twig";
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo(): array
    {
        return array (  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "@common/user_navbar.html.twig", "/var/www/src/views/components/@common/user_navbar.html.twig");
    }
}
