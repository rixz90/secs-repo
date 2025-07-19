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

/* @panels/branchPanel.html.twig */
class __TwigTemplate_ec92c51c2991d41a48089423fdb0889e extends Template
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
        yield "<section>
    <h3>Branch</h3>
    <form>
        <div x-id=\"['input']\">
            <label :for=\"\$id('input')\">Code:</label>
            <input type=\"text\" name=\"code\" :id=\"\$id('input')\" value=\"";
        // line 7
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["branch"] ?? null), "code", [], "any", false, false, false, 7), "html", null, true);
        yield "\" required />
        </div>
        <div x-id=\"['input']\">
            <label :for=\"\$id('input')\">Name:</label>
            <input type=\"text\" name=\"name\" :id=\"\$id('input')\" value=\"";
        // line 11
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["branch"] ?? null), "name", [], "any", false, false, false, 11), "html", null, true);
        yield "\" required />
        </div>
        <div x-id=\"['input']\">
            <label :for=\"\$id('input')\">Location: </label>
            <details class=\"dropdown\" :id=\"\$id('input')\">
                <summary> Select address... </summary>
                ";
        // line 17
        if ((($context["method"] ?? null) == true)) {
            // line 18
            yield "                <ul>
                    ";
            // line 19
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(($context["locations"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["location"]) {
                // line 20
                yield "                    <li>
                        <label>
                            <input type=\"checkbox\" name=\"locations[]\" value=\"";
                // line 22
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["location"], "id", [], "any", false, false, false, 22), "html", null, true);
                yield "\" ";
                yield ((CoreExtension::inFilter($context["location"], CoreExtension::getAttribute($this->env, $this->source,                 // line 23
($context["branch"] ?? null), "locations", [], "any", false, false, false, 23))) ? ("checked") : (""));
                yield " />
                            ";
                // line 24
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["location"], "address", [], "any", false, false, false, 24), "html", null, true);
                yield "
                        </label>
                    </li>
                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['location'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 28
            yield "                </ul>
                ";
        } else {
            // line 30
            yield "                <ul hx-get=\"/locations/location\" hx-swap=\"innerHTML\" hx-target=\"this\" hx-trigger=\"load\"></ul>
                ";
        }
        // line 32
        yield "            </details>
        </div>
        <div class=\"container\" style=\"text-align:center;\">
            ";
        // line 35
        if ((($context["method"] ?? null) == true)) {
            // line 36
            yield "            <input type=\"hidden\" name=\"id\" value=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["branch"] ?? null), "id", [], "any", false, false, false, 36), "html", null, true);
            yield "\" />
            <input type=\"submit\" value=\"Update\" hx-put=\"/branches/branch\" hx-target=\"#response\" hx-swap=\"innerHTML\"
                hx-indicator=\"#indicator\" style=\"width: fit-content;\" />
            ";
        } else {
            // line 40
            yield "            <input type=\"submit\" value=\"Submit\" hx-post=\"/branches/branch\" hx-target=\"#response\" hx-swap=\"innerHTML\"
                hx-indicator=\"#indicator\" style=\"width: fit-content;\" />
            ";
        }
        // line 43
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
        return "@panels/branchPanel.html.twig";
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
        return array (  125 => 43,  120 => 40,  112 => 36,  110 => 35,  105 => 32,  101 => 30,  97 => 28,  87 => 24,  83 => 23,  80 => 22,  76 => 20,  72 => 19,  69 => 18,  67 => 17,  58 => 11,  51 => 7,  44 => 2,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% set branch = branches|first %}
<section>
    <h3>Branch</h3>
    <form>
        <div x-id=\"['input']\">
            <label :for=\"\$id('input')\">Code:</label>
            <input type=\"text\" name=\"code\" :id=\"\$id('input')\" value=\"{{ branch.code }}\" required />
        </div>
        <div x-id=\"['input']\">
            <label :for=\"\$id('input')\">Name:</label>
            <input type=\"text\" name=\"name\" :id=\"\$id('input')\" value=\"{{ branch.name }}\" required />
        </div>
        <div x-id=\"['input']\">
            <label :for=\"\$id('input')\">Location: </label>
            <details class=\"dropdown\" :id=\"\$id('input')\">
                <summary> Select address... </summary>
                {% if method == 'PUT' is defined %}
                <ul>
                    {% for location in locations %}
                    <li>
                        <label>
                            <input type=\"checkbox\" name=\"locations[]\" value=\"{{ location.id }}\" {{ (location in
                                branch.locations)?'checked':''}} />
                            {{location.address }}
                        </label>
                    </li>
                    {% endfor %}
                </ul>
                {% else %}
                <ul hx-get=\"/locations/location\" hx-swap=\"innerHTML\" hx-target=\"this\" hx-trigger=\"load\"></ul>
                {% endif %}
            </details>
        </div>
        <div class=\"container\" style=\"text-align:center;\">
            {% if method == 'PUT' is defined %}
            <input type=\"hidden\" name=\"id\" value=\"{{ branch.id }}\" />
            <input type=\"submit\" value=\"Update\" hx-put=\"/branches/branch\" hx-target=\"#response\" hx-swap=\"innerHTML\"
                hx-indicator=\"#indicator\" style=\"width: fit-content;\" />
            {% else %}
            <input type=\"submit\" value=\"Submit\" hx-post=\"/branches/branch\" hx-target=\"#response\" hx-swap=\"innerHTML\"
                hx-indicator=\"#indicator\" style=\"width: fit-content;\" />
            {% endif %}
            <input type=\"reset\" value=\"Reset\" style=\"width: fit-content;\">
        </div>
    </form>
</section>", "@panels/branchPanel.html.twig", "/var/www/src/views/components/@panels/branchPanel.html.twig");
    }
}
