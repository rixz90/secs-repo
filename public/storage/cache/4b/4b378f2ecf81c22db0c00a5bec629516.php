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

/* @panels/categoryPanel.html.twig */
class __TwigTemplate_2fae5ab3e1d51cb75d47751ada2a1349 extends Template
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
        $context["category"] = Twig\Extension\CoreExtension::first($this->env->getCharset(), ($context["categories"] ?? null));
        // line 2
        yield "<section>
    <form action=\"\">
        <h3>Category</h3>
        <div x-id=\"['input']\">
            <label :for=\"\$id('input')\">Name:</label>
            <input type=\"text\" name=\"name\" :id=\"\$id('input')\" value=\"";
        // line 7
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["category"] ?? null), "name", [], "any", false, false, false, 7), "html", null, true);
        yield "\" required />
        </div>
        <div class=\"container\" style=\"text-align:center;\">
            ";
        // line 10
        if ((($context["method"] ?? null) == true)) {
            // line 11
            yield "            <input type=\"hidden\" name=\"id\" value=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["category"] ?? null), "id", [], "any", false, false, false, 11), "html", null, true);
            yield "\" />
            <input type=\"submit\" value=\"Update\" hx-put=\"/categories/category\" hx-target=\"#response\" hx-swap=\"innerHTML\"
                hx-indicator=\"#indicator\" style=\"width: fit-content;\" />
            ";
        } else {
            // line 15
            yield "            <input type=\"submit\" value=\"Submit\" hx-post=\"/categories/category\" hx-target=\"#response\" hx-swap=\"innerHTML\"
                hx-indicator=\"#indicator\" style=\"width: fit-content;\" />
            ";
        }
        // line 18
        yield "            <input type=\"reset\" value=\"Reset\" style=\"width: fit-content;\">
        </div>
    </form>
</section>";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@panels/categoryPanel.html.twig";
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
        return array (  72 => 18,  67 => 15,  59 => 11,  57 => 10,  51 => 7,  44 => 2,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% set category = categories|first %}
<section>
    <form action=\"\">
        <h3>Category</h3>
        <div x-id=\"['input']\">
            <label :for=\"\$id('input')\">Name:</label>
            <input type=\"text\" name=\"name\" :id=\"\$id('input')\" value=\"{{ category.name }}\" required />
        </div>
        <div class=\"container\" style=\"text-align:center;\">
            {% if method == 'PUT' is defined %}
            <input type=\"hidden\" name=\"id\" value=\"{{ category.id }}\" />
            <input type=\"submit\" value=\"Update\" hx-put=\"/categories/category\" hx-target=\"#response\" hx-swap=\"innerHTML\"
                hx-indicator=\"#indicator\" style=\"width: fit-content;\" />
            {% else %}
            <input type=\"submit\" value=\"Submit\" hx-post=\"/categories/category\" hx-target=\"#response\" hx-swap=\"innerHTML\"
                hx-indicator=\"#indicator\" style=\"width: fit-content;\" />
            {% endif %}
            <input type=\"reset\" value=\"Reset\" style=\"width: fit-content;\">
        </div>
    </form>
</section>", "@panels/categoryPanel.html.twig", "/var/www/src/views/components/@panels/categoryPanel.html.twig");
    }
}
