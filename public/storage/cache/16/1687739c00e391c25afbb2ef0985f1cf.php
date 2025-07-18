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

/* @panels/adminPanel.html.twig */
class __TwigTemplate_56481f7aa8cb53e8ad578a39cfdf061a extends Template
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
        $context["admin"] = Twig\Extension\CoreExtension::first($this->env->getCharset(), ($context["admins"] ?? null));
        // line 2
        yield "<section>
\t<form action=\"\">
\t\t<h3>Administrator</h3>
\t\t<div x-id=\"['input']\">
\t\t\t<label :for=\"\$id('input')\">Name:</label>
\t\t\t<input type=\"text\" name=\"name\" :id=\"\$id('input')\" value=\"";
        // line 7
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["admin"] ?? null), "name", [], "any", false, false, false, 7), "html", null, true);
        yield "\" required />
\t\t</div>
\t\t<div x-id=\"['input']\">
\t\t\t<label :for=\"\$id('input')\">Email: </label>
\t\t\t<input type=\"text\" name=\"email\" :id=\"\$id('input')\" value=\"";
        // line 11
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["admin"] ?? null), "email", [], "any", false, false, false, 11), "html", null, true);
        yield "\" required />
\t\t</div>
\t\t<div x-id=\"['input']\">
\t\t\t<label :for=\"\$id('input')\">Phone Number: </label>
\t\t\t<input type=\"text\" name=\"phone\" :id=\"\$id('input')\" value=\"";
        // line 15
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["admin"] ?? null), "phone", [], "any", false, false, false, 15), "html", null, true);
        yield "\" required />
\t\t</div>
\t\t<div class=\"container\" style=\"text-align:center;\">
\t\t\t";
        // line 18
        if ((($context["method"] ?? null) == true)) {
            // line 19
            yield "\t\t\t<input type=\"hidden\" name=\"id\" value=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["admin"] ?? null), "id", [], "any", false, false, false, 19), "html", null, true);
            yield "\" />
\t\t\t<input type=\"submit\" value=\"Update\" hx-put=\"/users/user\" hx-target=\"#response\" hx-swap=\"innerHTML\"
\t\t\t\thx-indicator=\"#indicator\" style=\"width: fit-content;\" />
\t\t\t";
        } else {
            // line 23
            yield "\t\t\t<input type=\"submit\" value=\"Submit\" hx-post=\"/users/admin\" hx-target=\"#response\" hx-swap=\"innerHTML\"
\t\t\t\thx-indicator=\"#indicator\" style=\"width: fit-content;\" />
\t\t\t";
        }
        // line 26
        yield "\t\t\t<input type=\"reset\" value=\"Reset\" style=\"width: fit-content;\">
\t\t</div>
\t</form>
</section>";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@panels/adminPanel.html.twig";
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
        return array (  86 => 26,  81 => 23,  73 => 19,  71 => 18,  65 => 15,  58 => 11,  51 => 7,  44 => 2,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "@panels/adminPanel.html.twig", "/var/www/src/views/components/@panels/adminPanel.html.twig");
    }
}
