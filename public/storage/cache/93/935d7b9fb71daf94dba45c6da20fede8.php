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

/* @tables/branch.html.twig */
class __TwigTemplate_afa8e63fc6f0465b81f943102cfeeb86 extends Template
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
\t\t\t\t<th scope=\"col\">Code</th>
\t\t\t\t<th scope=\"col\">Name</th>
\t\t\t\t<th scope=\"col\">Action</th>
\t\t\t</tr>
\t\t</thead>
\t\t<tbody>
\t\t\t";
        // line 11
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(($context["branches"] ?? null));
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
        foreach ($context['_seq'] as $context["_key"] => $context["b"]) {
            // line 12
            yield "\t\t\t<tr>
\t\t\t\t<td>";
            // line 13
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["b"], "code", [], "any", false, false, false, 13), "html", null, true);
            yield "</td>
\t\t\t\t<td>";
            // line 14
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["b"], "name", [], "any", false, false, false, 14), "html", null, true);
            yield "</td>
\t\t\t\t<td class=\"flex center\">
\t\t\t\t\t";
            // line 16
            yield from $this->load("@common/actionButton.html.twig", 16)->unwrap()->yield(CoreExtension::merge($context, ["controller" => "branches", "method" => "branch", "id" => CoreExtension::getAttribute($this->env, $this->source,             // line 17
$context["b"], "id", [], "any", false, false, false, 17)]));
            // line 18
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
        unset($context['_seq'], $context['_key'], $context['b'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 21
        yield "\t\t\t";
        if (Twig\Extension\CoreExtension::testEmpty(($context["branches"] ?? null))) {
            // line 22
            yield "\t\t\t<tr>
\t\t\t\t<td colspan=\"10\">
\t\t\t\t\t<center>...</center>
\t\t\t\t</td>
\t\t\t</tr>
\t\t\t";
        }
        // line 28
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
        return "@tables/branch.html.twig";
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
        return array (  113 => 28,  105 => 22,  102 => 21,  86 => 18,  84 => 17,  83 => 16,  78 => 14,  74 => 13,  71 => 12,  54 => 11,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "@tables/branch.html.twig", "/var/www/src/views/components/@tables/branch.html.twig");
    }
}
