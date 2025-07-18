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

/* @tables/complaint.html.twig */
class __TwigTemplate_f51628cac73d5e2894feacf579915019 extends Template
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
        yield "<div class=\"overflow-auto\" style=\"min-height:40vh\">
\t<table class=\"striped\">
\t\t<thead>
\t\t\t<tr>
\t\t\t\t<th scope=\"col\">Title</th>
\t\t\t\t<th scope=\"col\">Description</th>
\t\t\t\t<th scope=\"col\">Created At</th>
\t\t\t\t<th scope=\"col\">Updated At</th>
\t\t\t\t<th scope=\"col\">Completed At</th>
\t\t\t\t<th scope=\"col\">Status</th>
\t\t\t\t<th scope=\"col\">Action</th>
\t\t\t</tr>
\t\t</thead>
\t\t<tbody>
\t\t\t";
        // line 15
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(($context["complaints"] ?? null));
        $context['loop'] = [
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        ];
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof \Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["_key"] => $context["c"]) {
            // line 16
            yield "\t\t\t<tr>
\t\t\t\t<td>";
            // line 17
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["c"], "title", [], "any", false, false, false, 17), "html", null, true);
            yield "</td>
\t\t\t\t<td>";
            // line 18
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["c"], "description", [], "any", false, false, false, 18), "html", null, true);
            yield "</td>
\t\t\t\t<td>";
            // line 19
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["c"], "createdAt", [], "any", false, false, false, 19)), "html", null, true);
            yield "</td>

\t\t\t\t";
            // line 21
            if ((null === CoreExtension::getAttribute($this->env, $this->source, $context["c"], "updatedAt", [], "any", false, false, false, 21))) {
                // line 22
                yield "\t\t\t\t<td>
\t\t\t\t\t<center>...</center>
\t\t\t\t</td>
\t\t\t\t";
            } else {
                // line 26
                yield "\t\t\t\t<td> ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["c"], "updatedAt", [], "any", false, false, false, 26)), "html", null, true);
                yield " </td>
\t\t\t\t";
            }
            // line 28
            yield "\t\t\t\t";
            if ((null === CoreExtension::getAttribute($this->env, $this->source, $context["c"], "completedAt", [], "any", false, false, false, 28))) {
                // line 29
                yield "\t\t\t\t<td>
\t\t\t\t\t<center>...</center>
\t\t\t\t</td>
\t\t\t\t";
            } else {
                // line 33
                yield "\t\t\t\t<td>";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["c"], "completedAt", [], "any", false, false, false, 33)), "html", null, true);
                yield "</td>
\t\t\t\t";
            }
            // line 35
            yield "\t\t\t\t<td>";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, App\Enums\ComplaintStatus::Pending, "tryFrom", [CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["c"], "status", [], "any", false, false, false, 35), "value", [], "any", false, false, false, 35)], "method", false, false, false, 35), "toString", [], "method", false, false, false, 35), "html", null, true);
            yield "</td>

\t\t\t\t<td class=\"flex center\">
\t\t\t\t\t";
            // line 38
            yield from $this->load("@common/actionButton.html.twig", 38)->unwrap()->yield(CoreExtension::merge($context, ["controller" => "complaints", "method" => "complaint", "id" => CoreExtension::getAttribute($this->env, $this->source,             // line 39
$context["c"], "id", [], "any", false, false, false, 39)]));
            // line 40
            yield "\t\t\t\t</td>
\t\t\t</tr>
\t\t\t";
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['revindex0'], $context['loop']['revindex'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['c'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 43
        yield "\t\t\t";
        if (Twig\Extension\CoreExtension::testEmpty(($context["complaints"] ?? null))) {
            // line 44
            yield "\t\t\t<tr>
\t\t\t\t<td colspan=\"10\">
\t\t\t\t\t<center>...</center>
\t\t\t\t</td>
\t\t\t</tr>
\t\t\t";
        }
        // line 50
        yield "\t\t</tbody>
\t</table>
</div>";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@tables/complaint.html.twig";
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
        return array (  157 => 50,  149 => 44,  146 => 43,  130 => 40,  128 => 39,  127 => 38,  120 => 35,  114 => 33,  108 => 29,  105 => 28,  99 => 26,  93 => 22,  91 => 21,  86 => 19,  82 => 18,  78 => 17,  75 => 16,  58 => 15,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "@tables/complaint.html.twig", "/var/www/src/views/components/@tables/complaint.html.twig");
    }
}
