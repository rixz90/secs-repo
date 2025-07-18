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

/* @tables/category.html.twig */
class __TwigTemplate_ab44b0608e60669e957b854ef899e1ad extends Template
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
\t\t\t\t<th scope=\"col\">Name</th>
\t\t\t\t<th scope=\"col\">Action</th>
\t\t\t</tr>
\t\t</thead>
\t\t<tbody>
\t\t\t";
        // line 10
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(($context["categories"] ?? null));
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
            // line 11
            yield "\t\t\t<tr>
\t\t\t\t<td>";
            // line 12
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["c"], "name", [], "any", false, false, false, 12), "html", null, true);
            yield "</td>
\t\t\t\t<td class=\"flex center\">
\t\t\t\t\t";
            // line 14
            yield from $this->load("@common/actionButton.html.twig", 14)->unwrap()->yield(CoreExtension::merge($context, ["controller" => "categories", "method" => "category", "id" => CoreExtension::getAttribute($this->env, $this->source,             // line 15
$context["c"], "id", [], "any", false, false, false, 15)]));
            // line 16
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
        // line 19
        yield "\t\t\t";
        if (Twig\Extension\CoreExtension::testEmpty(($context["categories"] ?? null))) {
            // line 20
            yield "\t\t\t<tr>
\t\t\t\t<td colspan=\"10\">
\t\t\t\t\t<center>...</center>
\t\t\t\t</td>
\t\t\t</tr>
\t\t\t";
        }
        // line 26
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
        return "@tables/category.html.twig";
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
        return array (  108 => 26,  100 => 20,  97 => 19,  81 => 16,  79 => 15,  78 => 14,  73 => 12,  70 => 11,  53 => 10,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "@tables/category.html.twig", "/var/www/src/views/components/@tables/category.html.twig");
    }
}
