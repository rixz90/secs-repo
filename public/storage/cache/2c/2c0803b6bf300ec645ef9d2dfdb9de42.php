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

/* @tables/semakan.html.twig */
class __TwigTemplate_9124a2151fa7db29a3d12ab52ddd19fd extends Template
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
        yield "<div class=\"overflow-auto\">
    <table class=\"striped\">
        <thead>
            <tr>
                <th scope=\"col\">Title</th>
                <th scope=\"col\">Date Report</th>
                <th scope=\"col\">Category</th>
                <th scope=\"col\">Branch</th>
                <th scope=\"col\">Location</th>
                <th scope=\"col\">Date Completed</th>
                <th scope=\"col\">Status</th>
            </tr>
        </thead>
        <tbody>
            ";
        // line 15
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(($context["complaints"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["c"]) {
            // line 16
            yield "            <tr>
                <td>";
            // line 17
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["c"], "title", [], "any", false, false, false, 17), "html", null, true);
            yield "</td>
                <td>";
            // line 18
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["c"], "createdAt", [], "any", false, false, false, 18)), "html", null, true);
            yield "</td>
                <td>";
            // line 19
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, $context["c"], "catName", [], "any", true, true, false, 19)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, $context["c"], "catName", [], "any", false, false, false, 19), "....")) : ("....")), "html", null, true);
            yield "</td>
                <td>";
            // line 20
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, $context["c"], "braName", [], "any", true, true, false, 20)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, $context["c"], "braName", [], "any", false, false, false, 20), "....")) : ("....")), "html", null, true);
            yield "</td>
                <td>";
            // line 21
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, $context["c"], "address", [], "any", true, true, false, 21)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, $context["c"], "address", [], "any", false, false, false, 21), "....")) : ("....")), "html", null, true);
            yield "</td>
                <td>";
            // line 22
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, $context["c"], "completedAt", [], "any", true, true, false, 22)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, $context["c"], "completedAt", [], "any", false, false, false, 22), "....")) : ("....")), "html", null, true);
            yield "</td>
                <td>";
            // line 23
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, App\Enums\ComplaintStatus::Pending, "tryFrom", [CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["c"], "status", [], "any", false, false, false, 23), "value", [], "any", false, false, false, 23)], "method", false, false, false, 23), "toString", [], "method", false, false, false, 23), "html", null, true);
            yield "</td>
            </tr>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['c'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 26
        yield "            ";
        if (Twig\Extension\CoreExtension::testEmpty(($context["complaints"] ?? null))) {
            // line 27
            yield "            <tr>
                <td colspan=\"10\">
                    <center>...</center>
                </td>
            </tr>
            ";
        }
        // line 33
        yield "        </tbody>
    </table>
</div>";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@tables/semakan.html.twig";
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
        return array (  109 => 33,  101 => 27,  98 => 26,  89 => 23,  85 => 22,  81 => 21,  77 => 20,  73 => 19,  69 => 18,  65 => 17,  62 => 16,  58 => 15,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<div class=\"overflow-auto\">
    <table class=\"striped\">
        <thead>
            <tr>
                <th scope=\"col\">Title</th>
                <th scope=\"col\">Date Report</th>
                <th scope=\"col\">Category</th>
                <th scope=\"col\">Branch</th>
                <th scope=\"col\">Location</th>
                <th scope=\"col\">Date Completed</th>
                <th scope=\"col\">Status</th>
            </tr>
        </thead>
        <tbody>
            {% for c in complaints %}
            <tr>
                <td>{{ c.title }}</td>
                <td>{{ c.createdAt|date() }}</td>
                <td>{{ c.catName|default('....') }}</td>
                <td>{{ c.braName|default('....') }}</td>
                <td>{{ c.address|default('....') }}</td>
                <td>{{ c.completedAt|default('....') }}</td>
                <td>{{ enum(\"App\\\\Enums\\\\ComplaintStatus\").tryFrom(c.status.value).toString() }}</td>
            </tr>
            {% endfor %}
            {% if complaints is empty %}
            <tr>
                <td colspan=\"10\">
                    <center>...</center>
                </td>
            </tr>
            {% endif %}
        </tbody>
    </table>
</div>", "@tables/semakan.html.twig", "/var/www/src/views/components/@tables/semakan.html.twig");
    }
}
