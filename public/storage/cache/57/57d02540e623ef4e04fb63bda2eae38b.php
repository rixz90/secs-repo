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

/* @common/admin_navbar.html.twig */
class __TwigTemplate_4a82059851638de3b730315edfaaac9f extends Template
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
    <a href=\"/\" class=\"secondary\" style=\"text-decoration:none\">
        <svg style=\"width: 2rem;height:2rem\">
            <use xlink:href=\"assets/images/sprite.svg#icon-home\"></use>
        </svg>
    </a>
    <nav>
        <ul>
            <li>
                <details class=\"dropdown\">
                    <summary>
                        <svg style=\"width: 1.35rem;height:1.35rem\">
                            <use xlink:href=\"assets/images/sprite.svg#icon-list\"></use>
                        </svg>
                        Menu
                    </summary>
                    <ul dir=\"rtl\">
                        <li><a href=\"/admin\">Manage</a></li>
                        <li><a href=\"/report\">Report</a></li>
                        <li>
                            <a href=\"/setting\">
                                Setting
                            </a>
                        </li>
                    </ul>
                </details>
            </li>
        </ul>
        <ul class=\"icons\">
            <li>
                <a href=\"/\" class=\"secondary\">
                    <svg style=\"width: 1.5rem;height:1.6rem\">
                        <use xlink:href=\"assets/images/sprite.svg#icon-log-out\"></use>
                    </svg>
                    Logout
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
        return "@common/admin_navbar.html.twig";
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
        return new Source("<div class=\"container\">
    <a href=\"/\" class=\"secondary\" style=\"text-decoration:none\">
        <svg style=\"width: 2rem;height:2rem\">
            <use xlink:href=\"assets/images/sprite.svg#icon-home\"></use>
        </svg>
    </a>
    <nav>
        <ul>
            <li>
                <details class=\"dropdown\">
                    <summary>
                        <svg style=\"width: 1.35rem;height:1.35rem\">
                            <use xlink:href=\"assets/images/sprite.svg#icon-list\"></use>
                        </svg>
                        Menu
                    </summary>
                    <ul dir=\"rtl\">
                        <li><a href=\"/admin\">Manage</a></li>
                        <li><a href=\"/report\">Report</a></li>
                        <li>
                            <a href=\"/setting\">
                                Setting
                            </a>
                        </li>
                    </ul>
                </details>
            </li>
        </ul>
        <ul class=\"icons\">
            <li>
                <a href=\"/\" class=\"secondary\">
                    <svg style=\"width: 1.5rem;height:1.6rem\">
                        <use xlink:href=\"assets/images/sprite.svg#icon-log-out\"></use>
                    </svg>
                    Logout
                </a>
            </li>
        </ul>
    </nav>
</div>", "@common/admin_navbar.html.twig", "/var/www/src/views/components/@common/admin_navbar.html.twig");
    }
}
