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

/* setting.html.twig */
class __TwigTemplate_668e0f53710698f1c4b6786a57c3484f extends Template
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

    // line 2
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_header(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 3
        yield from $this->load("@common/admin_navbar.html.twig", 3)->unwrap()->yield($context);
        yield from [];
    }

    // line 5
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_content(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 6
        yield "<main class=\"container\" x-data=\"settingView\">
\t<section>
\t\t<div>
\t\t\t<nav>
\t\t\t\t<ul>
\t\t\t\t\t<li>
\t\t\t\t\t\t<a href=\"\" class=\"secondary\" hx-get=\"/branches/\" hx-target=\"#response\" hx-swap=\"innerHTML\"
\t\t\t\t\t\t\thx-indicator=\"#indicator\" @click=\"toggleBra()\">
\t\t\t\t\t\t\tBranch
\t\t\t\t\t\t</a>
\t\t\t\t\t</li>
\t\t\t\t\t<li>
\t\t\t\t\t\t<a href=\"\" class=\"secondary\" hx-get=\"/categories/\" hx-target=\"#response\" hx-swap=\"innerHTML\"
\t\t\t\t\t\t\thx-indicator=\"#indicator\" @click=\"toggleCat()\">
\t\t\t\t\t\t\tCategory
\t\t\t\t\t\t</a>
\t\t\t\t\t</li>
\t\t\t\t\t<li>
\t\t\t\t\t\t<a href=\"\" class=\"secondary\" hx-get=\"/locations/\" hx-target=\"#response\" hx-swap=\"innerHTML\"
\t\t\t\t\t\t\thx-indicator=\"#indicator\" @click=\"toggleLoc()\">
\t\t\t\t\t\t\tLocation
\t\t\t\t\t\t</a>
\t\t\t\t\t</li>
\t\t\t\t\t<li>
\t\t\t\t\t\t<a href=\"\" class=\"secondary\" hx-get=\"/users/admin\" hx-target=\"#response\" hx-swap=\"innnerHTML\"
\t\t\t\t\t\t\thx-indicator=\"#indicator\" @click=\"toggleAdm()\">
\t\t\t\t\t\t\tAdmin
\t\t\t\t\t\t</a>
\t\t\t\t\t</li>
\t\t\t\t</ul>
\t\t\t</nav>
\t\t</div>
\t</section>
\t<hr />
\t<section id=\"response\"></section>
\t<div class=\"flex center\">
\t\t<img id=\"indicator\" class=\"htmx-indicator flex center\" src=\"assets/svg-loaders/three-dots.svg\" />
\t</div>
\t<hr />
\t<section>
\t\t<div x-show=\"adm\" x-collapse>
\t\t\t";
        // line 47
        yield Twig\Extension\CoreExtension::include($this->env, $context, "@panels/adminPanel.html.twig", [], false);
        yield "
\t\t</div>
\t\t<div x-show=\"bra\" x-collapse>
\t\t\t";
        // line 50
        yield Twig\Extension\CoreExtension::include($this->env, $context, "@panels/branchPanel.html.twig", [], false);
        yield "
\t\t</div>
\t\t<div x-show=\"cat\" x-collapse>
\t\t\t";
        // line 53
        yield Twig\Extension\CoreExtension::include($this->env, $context, "@panels/categoryPanel.html.twig", [], false);
        yield "
\t\t</div>
\t\t<div x-show=\"loc\" x-collapse>
\t\t\t";
        // line 56
        yield Twig\Extension\CoreExtension::include($this->env, $context, "@panels/locationPanel.html.twig", [], false);
        yield "
\t\t</div>
\t</section>
</main>
";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "setting.html.twig";
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
        return array (  132 => 56,  126 => 53,  120 => 50,  114 => 47,  71 => 6,  64 => 5,  59 => 3,  52 => 2,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "setting.html.twig", "/var/www/src/views/setting.html.twig");
    }
}
