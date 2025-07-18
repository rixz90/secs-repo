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

/* @lists/locationList.html.twig */
class __TwigTemplate_375aef4e1bdbc7b222153da439567c0b extends Template
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
        $context["branch"] = Twig\Extension\CoreExtension::first($this->env->getCharset(), ($context["branches"] ?? null));
        // line 2
        $context["complaint"] = Twig\Extension\CoreExtension::first($this->env->getCharset(), ($context["complaints"] ?? null));
        // line 3
        yield "
";
        // line 4
        if ((CoreExtension::getAttribute($this->env, $this->source, ($context["branch"] ?? null), "id", [], "any", false, false, false, 4) == CoreExtension::getAttribute($this->env, $this->source, Twig\Extension\CoreExtension::first($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, ($context["complaint"] ?? null), "branches", [], "any", false, false, false, 4)), "id", [], "any", false, false, false, 4))) {
            // line 5
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, ($context["branch"] ?? null), "locations", [], "any", false, false, false, 5));
            foreach ($context['_seq'] as $context["_key"] => $context["location"]) {
                // line 6
                yield "<li>
    <label>
        <input type=\"checkbox\" name=\"locations[]\" value=\"";
                // line 8
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["location"], "id", [], "any", false, false, false, 8), "html", null, true);
                yield "\" ";
                yield ((CoreExtension::inFilter($context["location"], CoreExtension::getAttribute($this->env, $this->source, ($context["complaint"] ?? null), "locations", [], "any", false, false, false, 8))) ? ("checked") : (""));
                // line 9
                yield " /> ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["location"], "address", [], "any", false, false, false, 9), "html", null, true);
                yield "
    </label>
</li>
";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['location'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
        } else {
            // line 14
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, ($context["branch"] ?? null), "locations", [], "any", false, false, false, 14));
            foreach ($context['_seq'] as $context["_key"] => $context["location"]) {
                // line 15
                yield "<li>
    <label>
        <input type=\"checkbox\" name=\"locations[]\" value=\"";
                // line 17
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["location"], "id", [], "any", false, false, false, 17), "html", null, true);
                yield "\" /> ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["location"], "address", [], "any", false, false, false, 17), "html", null, true);
                yield "
    </label>
</li>
";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['location'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
        }
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@lists/locationList.html.twig";
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
        return array (  83 => 17,  79 => 15,  75 => 14,  63 => 9,  59 => 8,  55 => 6,  51 => 5,  49 => 4,  46 => 3,  44 => 2,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "@lists/locationList.html.twig", "/var/www/src/views/components/@lists/locationList.html.twig");
    }
}
