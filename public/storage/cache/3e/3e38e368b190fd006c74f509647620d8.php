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

/* @forms/base.html.twig */
class __TwigTemplate_a7c36756a3d748eab4d6a84edf621eb8 extends Template
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
            'personal' => [$this, 'block_personal'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 1
        $context["complaint"] = Twig\Extension\CoreExtension::first($this->env->getCharset(), ($context["complaints"] ?? null));
        // line 2
        yield "<section>
    <form action=\"/complaints/complaint\" method=\"post\">
        <section>
            ";
        // line 5
        yield from $this->unwrap()->yieldBlock('personal', $context, $blocks);
        // line 19
        yield "        </section>
        <hr />
        <section>
            <h3 class=\"h3\">Complaint Information</h3>
            <div x-id=\"['input']\">
                <label :for=\"\$id('input')\">UiTM Branch: </label>
                <select name=\"branch\" id=\"branch\" :id=\"\$id('input')\" ";
        // line 25
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["complaint"] ?? null), "id", [], "any", false, false, false, 25)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            yield " hx-get=\"/complaints/location\"
                    ";
        } else {
            // line 26
            yield " hx-get=\"/branches/location\" ";
        }
        yield " hx-trigger=\"load, change\" hx-swap=\"innerHTML\"
                    hx-target=\"#list\" hx-include=\"find option[selected],[name='id']\" hx-indicator=\"#indicator\">
                    <option value=\"";
        // line 28
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["form"] ?? null), "branchId", [], "any", false, false, false, 28), "html", null, true);
        yield "\" disabled selected>Choose Branch</option>
                    ";
        // line 29
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(($context["branches"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["branch"]) {
            // line 30
            yield "                    <option value=";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["branch"], "id", [], "any", false, false, false, 30), "html", null, true);
            yield " ";
            yield ((CoreExtension::inFilter($context["branch"], CoreExtension::getAttribute($this->env, $this->source, ($context["complaint"] ?? null), "branches", [], "any", false, false, false, 30))) ? ("selected") : (""));
            yield ">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["branch"], "name", [], "any", false, false, false, 30), "html", null, true);
            yield "
                    </option>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['branch'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 33
        yield "                </select>
            </div>
            <div x-id=\"['input']\">
                <label :for=\"\$id('input')\">Location: </label>
                <details class=\"dropdown\" :id=\"\$id('input')\">
                    <summary> Select address <img id=\"indicator\" class=\"htmx-indicator\"
                            src=\"assets/svg-loaders/three-dots.svg\" style=\"margin-top:5px;width: 1rem;height:0.5rem;\" />
                    </summary>
                    <ul id=\"list\"></ul>
                </details>
            </div>

            <div x-id=\"['input']\">
                <label :for=\"\$id('input')\">Category: </label>
                <select name=\"category\" :id=\"\$id('input')\" required>
                    <option value=\"";
        // line 48
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["form"] ?? null), "categoryId", [], "any", false, false, false, 48), "html", null, true);
        yield "\" disabled selected>Choose Category</option>
                    ";
        // line 49
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(($context["categories"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["category"]) {
            // line 50
            yield "                    <option value=";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["category"], "id", [], "any", false, false, false, 50), "html", null, true);
            yield " ";
            yield ((CoreExtension::inFilter($context["category"], CoreExtension::getAttribute($this->env, $this->source, ($context["complaint"] ?? null), "categories", [], "any", false, false, false, 50))) ? ("selected") : (""));
            yield ">
                        ";
            // line 51
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["category"], "name", [], "any", false, false, false, 51), "html", null, true);
            yield "
                    </option>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['category'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 54
        yield "                </select>
            </div>
        </section>
        <hr />
        <section>
            <div x-id=\"['input']\">
                <label :for=\"\$id('input')\">Title : </label>
                <input type=\"text\" name=\"title\" :id=\"\$id('input')\" value=\"";
        // line 61
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["complaint"] ?? null), "title", [], "any", false, false, false, 61), "html", null, true);
        yield "\" required />
            </div>
            <div x-id=\"['input']\">
                <label :for=\"\$id('input')\">Details : </label>
                <textarea name=\"desc\" :id=\"\$id('input')\" cols=\"30\" rows=\"10\"
                    required>";
        // line 66
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["complaint"] ?? null), "description", [], "any", false, false, false, 66), "html", null, true);
        yield "</textarea>
            </div>
            <div x-id=\"['input']\">
                <label :for=\"\$id('input')\">Attachment : </label>
                <input type=\"file\" name=\"image\" :id=\"\$id('input')\" aria-describedby=\"file-helper\" value=\"\" />
                <small id=\"file-helpher\">*Format PDF or Image(jpg, png, jpeg)only</small>
                <button class=\"button-remove\">Remove</button>
            </div>
            <div class=\"container\" style=\"text-align:center;\">
                ";
        // line 75
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["complaint"] ?? null), "id", [], "any", false, false, false, 75)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 76
            yield "                <input type=\"hidden\" name=\"id\" value=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["complaint"] ?? null), "id", [], "any", false, false, false, 76), "html", null, true);
            yield "\" />
                <input type=\"submit\" value=\"Update\" hx-put=\"/complaints/complaint\" hx-target=\"#response\"
                    hx-swap=\"innerHTML\" hx-indicator=\"#indicator\" style=\"width: fit-content;\" />
                ";
        } else {
            // line 80
            yield "                <input type=\"submit\" value=\"Submit\" hx-post=\"/complaints/complaint\" hx-target=\"#target\"
                    hx-swap=\"innerHTML\" hx-indicator=\"#indicator\" style=\"width: fit-content;\" />
                ";
        }
        // line 83
        yield "                <input type=\"reset\" value=\"Reset\" style=\"width: fit-content;\" />
            </div>
        </section>
    </form>
</section>";
        yield from [];
    }

    // line 5
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_personal(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 6
        yield "            <div x-id=\"['input']\">
                <label :for=\"\$id('input')\">Name : </label>
                <input type=\"text\" name=\"name\" :id=\"\$id('input')\" value=\"";
        // line 8
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["complaint"] ?? null), "user", [], "any", false, false, false, 8), "name", [], "any", false, false, false, 8), "html", null, true);
        yield "\" required />
            </div>
            <div x-id=\"['input']\">
                <label :for=\"\$id('input')\">Email: </label>
                <input type=\"text\" name=\"email\" :id=\"\$id('input')\" value=\"";
        // line 12
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["complaint"] ?? null), "user", [], "any", false, false, false, 12), "email", [], "any", false, false, false, 12), "html", null, true);
        yield "\" required />
            </div>
            <div x-id=\"['input']\">
                <label :for=\"\$id('input')\">Phone Number: </label>
                <input type=\"text\" name=\"phone\" :id=\"\$id('input')\" value=\"";
        // line 16
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["complaint"] ?? null), "user", [], "any", false, false, false, 16), "phone", [], "any", false, false, false, 16), "html", null, true);
        yield "\" required />
            </div>
            ";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@forms/base.html.twig";
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
        return array (  212 => 16,  205 => 12,  198 => 8,  194 => 6,  187 => 5,  178 => 83,  173 => 80,  165 => 76,  163 => 75,  151 => 66,  143 => 61,  134 => 54,  125 => 51,  118 => 50,  114 => 49,  110 => 48,  93 => 33,  79 => 30,  75 => 29,  71 => 28,  65 => 26,  60 => 25,  52 => 19,  50 => 5,  45 => 2,  43 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% set complaint = complaints|first %}
<section>
    <form action=\"/complaints/complaint\" method=\"post\">
        <section>
            {% block personal %}
            <div x-id=\"['input']\">
                <label :for=\"\$id('input')\">Name : </label>
                <input type=\"text\" name=\"name\" :id=\"\$id('input')\" value=\"{{ complaint.user.name }}\" required />
            </div>
            <div x-id=\"['input']\">
                <label :for=\"\$id('input')\">Email: </label>
                <input type=\"text\" name=\"email\" :id=\"\$id('input')\" value=\"{{ complaint.user.email }}\" required />
            </div>
            <div x-id=\"['input']\">
                <label :for=\"\$id('input')\">Phone Number: </label>
                <input type=\"text\" name=\"phone\" :id=\"\$id('input')\" value=\"{{ complaint.user.phone }}\" required />
            </div>
            {% endblock %}
        </section>
        <hr />
        <section>
            <h3 class=\"h3\">Complaint Information</h3>
            <div x-id=\"['input']\">
                <label :for=\"\$id('input')\">UiTM Branch: </label>
                <select name=\"branch\" id=\"branch\" :id=\"\$id('input')\" {% if complaint.id %} hx-get=\"/complaints/location\"
                    {% else %} hx-get=\"/branches/location\" {% endif %} hx-trigger=\"load, change\" hx-swap=\"innerHTML\"
                    hx-target=\"#list\" hx-include=\"find option[selected],[name='id']\" hx-indicator=\"#indicator\">
                    <option value=\"{{ form.branchId }}\" disabled selected>Choose Branch</option>
                    {% for branch in branches %}
                    <option value={{ branch.id }} {{ branch in complaint.branches ? 'selected' : '' }}>{{ branch.name }}
                    </option>
                    {% endfor %}
                </select>
            </div>
            <div x-id=\"['input']\">
                <label :for=\"\$id('input')\">Location: </label>
                <details class=\"dropdown\" :id=\"\$id('input')\">
                    <summary> Select address <img id=\"indicator\" class=\"htmx-indicator\"
                            src=\"assets/svg-loaders/three-dots.svg\" style=\"margin-top:5px;width: 1rem;height:0.5rem;\" />
                    </summary>
                    <ul id=\"list\"></ul>
                </details>
            </div>

            <div x-id=\"['input']\">
                <label :for=\"\$id('input')\">Category: </label>
                <select name=\"category\" :id=\"\$id('input')\" required>
                    <option value=\"{{ form.categoryId }}\" disabled selected>Choose Category</option>
                    {% for category in categories %}
                    <option value={{ category.id }} {{ category in complaint.categories ? 'selected' : '' }}>
                        {{ category.name }}
                    </option>
                    {% endfor %}
                </select>
            </div>
        </section>
        <hr />
        <section>
            <div x-id=\"['input']\">
                <label :for=\"\$id('input')\">Title : </label>
                <input type=\"text\" name=\"title\" :id=\"\$id('input')\" value=\"{{ complaint.title }}\" required />
            </div>
            <div x-id=\"['input']\">
                <label :for=\"\$id('input')\">Details : </label>
                <textarea name=\"desc\" :id=\"\$id('input')\" cols=\"30\" rows=\"10\"
                    required>{{ complaint.description }}</textarea>
            </div>
            <div x-id=\"['input']\">
                <label :for=\"\$id('input')\">Attachment : </label>
                <input type=\"file\" name=\"image\" :id=\"\$id('input')\" aria-describedby=\"file-helper\" value=\"\" />
                <small id=\"file-helpher\">*Format PDF or Image(jpg, png, jpeg)only</small>
                <button class=\"button-remove\">Remove</button>
            </div>
            <div class=\"container\" style=\"text-align:center;\">
                {% if complaint.id %}
                <input type=\"hidden\" name=\"id\" value=\"{{ complaint.id }}\" />
                <input type=\"submit\" value=\"Update\" hx-put=\"/complaints/complaint\" hx-target=\"#response\"
                    hx-swap=\"innerHTML\" hx-indicator=\"#indicator\" style=\"width: fit-content;\" />
                {% else %}
                <input type=\"submit\" value=\"Submit\" hx-post=\"/complaints/complaint\" hx-target=\"#target\"
                    hx-swap=\"innerHTML\" hx-indicator=\"#indicator\" style=\"width: fit-content;\" />
                {% endif %}
                <input type=\"reset\" value=\"Reset\" style=\"width: fit-content;\" />
            </div>
        </section>
    </form>
</section>", "@forms/base.html.twig", "/var/www/src/views/components/@forms/base.html.twig");
    }
}
