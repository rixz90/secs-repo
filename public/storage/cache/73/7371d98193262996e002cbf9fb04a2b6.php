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

/* report.html.twig */
class __TwigTemplate_9dac7f03992d9db02fa2caf4366b8294 extends Template
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
        yield "<main class=\"container\">
    <details>
        <summary role=\"button\" class=\"outline secondary\">Search Filter</summary>
        <section>
            <label for=\"date\">Generate Date:</label>
            <input type=\"date\" name=\"date\" id=\"date\">
            <label for=\"name\">User ID:</label>
            <input type=\"text\" name=\"user_id\" id=\"user_id\">
            <label for=\"branch\">Branch:</label>
            <select name=\"branch\" id=\"branch\">
                <option value=\"\" disabled selected>Choose Branch</option>
                ";
        // line 17
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(($context["branches"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["b"]) {
            // line 18
            yield "                <option value=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["b"], "id", [], "any", false, false, false, 18), "html", null, true);
            yield "\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["b"], "name", [], "any", false, false, false, 18), "html", null, true);
            yield "</option>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['b'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 20
        yield "            </select>
            <label for=\"status\">Status:</label>
            <fieldset class=\"flex\">
                <select name=\"status\" id=\"status\">
                    <option disabled selected>Status</option>
                    ";
        // line 25
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, App\Enums\ComplaintStatus::Pending, "cases", [], "any", false, false, false, 25));
        foreach ($context['_seq'] as $context["_key"] => $context["c"]) {
            // line 26
            yield "                    <option value=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["c"], "value", [], "any", false, false, false, 26), "html", null, true);
            yield "\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["c"], "name", [], "any", false, false, false, 26), "html", null, true);
            yield "</option>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['c'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 28
        yield "                </select>
                <button name=\"submit\" style=\"margin-left: 10px;\">Generate</button>
            </fieldset>
        </section>
    </details>
    <hr />
    <section hx-get=\"/complaints/table/semakan\" hx-trigger=\"load delay:1s\" hx-swap=\"innerHTML\"
        hx-indicator=\"#indicator\">
    </section>
    <div class=\"flex center\">
        <img id=\"indicator\" class=\"htmx-indicator\" src=\"assets/svg-loaders/three-dots.svg\" />
    </div>
</main>
";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "report.html.twig";
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
        return array (  121 => 28,  110 => 26,  106 => 25,  99 => 20,  88 => 18,  84 => 17,  71 => 6,  64 => 5,  59 => 3,  52 => 2,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "report.html.twig", "/var/www/src/views/report.html.twig");
    }
}
