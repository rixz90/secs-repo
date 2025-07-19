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

/* @tables/admin.html.twig */
class __TwigTemplate_26e93a82d85cbcf7aa157cabff927fcb extends Template
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
\t<table class=\"striped\" style=\"margin-bottom: 4rem;\">
\t\t<thead>
\t\t\t<tr>
\t\t\t\t<th scope=\"col\">Name</th>
\t\t\t\t<th scope=\"col\">Email</th>
\t\t\t\t<th scope=\"col\">Staff</th>
\t\t\t\t<th scope=\"col\">Student</th>
\t\t\t\t<th scope=\"col\">Action</th>
\t\t\t</tr>
\t\t</thead>
\t\t<tbody>
\t\t\t";
        // line 13
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(($context["admins"] ?? null));
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
        foreach ($context['_seq'] as $context["_key"] => $context["u"]) {
            // line 14
            yield "\t\t\t<tr>
\t\t\t\t<td>";
            // line 15
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["u"], "name", [], "any", false, false, false, 15), "html", null, true);
            yield "</td>
\t\t\t\t<td>";
            // line 16
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["u"], "email", [], "any", false, false, false, 16), "html", null, true);
            yield "</td>
\t\t\t\t<td>";
            // line 17
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, $context["u"], "employeeId", [], "any", true, true, false, 17)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, $context["u"], "employeeId", [], "any", false, false, false, 17), "...")) : ("...")), "html", null, true);
            yield "</td>
\t\t\t\t<td>";
            // line 18
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, $context["u"], "studentId", [], "any", true, true, false, 18)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, $context["u"], "studentId", [], "any", false, false, false, 18), "...")) : ("...")), "html", null, true);
            yield "</td>
\t\t\t\t<td class=\"flex center\">
\t\t\t\t\t";
            // line 20
            yield from $this->load("@common/actionButton.html.twig", 20)->unwrap()->yield(CoreExtension::merge($context, ["controller" => "users", "method" => "user", "id" => CoreExtension::getAttribute($this->env, $this->source,             // line 21
$context["u"], "id", [], "any", false, false, false, 21)]));
            // line 22
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
        unset($context['_seq'], $context['_key'], $context['u'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 25
        yield "\t\t\t";
        if (Twig\Extension\CoreExtension::testEmpty(($context["admins"] ?? null))) {
            // line 26
            yield "\t\t\t<tr>
\t\t\t\t<td colspan=\"10\">
\t\t\t\t\t<center>...</center>
\t\t\t\t</td>
\t\t\t</tr>
\t\t\t";
        }
        // line 32
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
        return "@tables/admin.html.twig";
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
        return array (  123 => 32,  115 => 26,  112 => 25,  96 => 22,  94 => 21,  93 => 20,  88 => 18,  84 => 17,  80 => 16,  76 => 15,  73 => 14,  56 => 13,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<div class=\"overflow-auto\" style=\"min-height:40vh\">
\t<table class=\"striped\" style=\"margin-bottom: 4rem;\">
\t\t<thead>
\t\t\t<tr>
\t\t\t\t<th scope=\"col\">Name</th>
\t\t\t\t<th scope=\"col\">Email</th>
\t\t\t\t<th scope=\"col\">Staff</th>
\t\t\t\t<th scope=\"col\">Student</th>
\t\t\t\t<th scope=\"col\">Action</th>
\t\t\t</tr>
\t\t</thead>
\t\t<tbody>
\t\t\t{% for u in admins %}
\t\t\t<tr>
\t\t\t\t<td>{{ u.name }}</td>
\t\t\t\t<td>{{ u.email }}</td>
\t\t\t\t<td>{{ u.employeeId| default('...')}}</td>
\t\t\t\t<td>{{ u.studentId| default('...')}}</td>
\t\t\t\t<td class=\"flex center\">
\t\t\t\t\t{% include \"@common/actionButton.html.twig\" with {'controller':'users','method':'user',
\t\t\t\t\t'id': u.id} %}
\t\t\t\t</td>
\t\t\t</tr>
\t\t\t{% endfor %}
\t\t\t{% if admins is empty %}
\t\t\t<tr>
\t\t\t\t<td colspan=\"10\">
\t\t\t\t\t<center>...</center>
\t\t\t\t</td>
\t\t\t</tr>
\t\t\t{% endif %}
\t\t</tbody>
\t</table>
</div>", "@tables/admin.html.twig", "/var/www/src/views/components/@tables/admin.html.twig");
    }
}
