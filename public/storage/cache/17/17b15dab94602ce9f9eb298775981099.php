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

/* @forms/non-guest.html.twig */
class __TwigTemplate_758463b26afd282217a3562af42c189a extends Template
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
            'personal' => [$this, 'block_personal'],
        ];
    }

    protected function doGetParent(array $context): bool|string|Template|TemplateWrapper
    {
        // line 1
        return "@forms/base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $this->parent = $this->load("@forms/base.html.twig", 1);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_personal(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 3
        yield "<div x-show=\"";
        yield (((($tmp = (!(null === CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["complaint"] ?? null), "user", [], "any", false, false, false, 3), "employeeId", [], "any", false, false, false, 3)))) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("true") : ("staff"));
        yield "\" x-transition x-id=\"['input']\">
    <label :for=\"\$id('input')\">Staff ID : </label>
    <input type=\"text\" name=\"employeeId\" :id=\"\$id('input')\" value=\"";
        // line 5
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["complaint"] ?? null), "user", [], "any", false, false, false, 5), "employeeId", [], "any", false, false, false, 5), "html", null, true);
        yield "\" />
</div>
<div x-show=\"";
        // line 7
        yield (((($tmp = (!(null === CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["complaint"] ?? null), "user", [], "any", false, false, false, 7), "studentId", [], "any", false, false, false, 7)))) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("true") : ("student"));
        yield "\" x-transition x-id=\"['input']\">
    <label :for=\"\$id('input')\">Student ID : </label>
    <input type=\"text\" name=\"studentId\" :id=\"\$id('input')\" value=\"";
        // line 9
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["complaint"] ?? null), "user", [], "any", false, false, false, 9), "studentId", [], "any", false, false, false, 9), "html", null, true);
        yield "\" />
</div>
";
        // line 11
        yield from $this->yieldParentBlock("personal", $context, $blocks);
        yield "
";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@forms/non-guest.html.twig";
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
        return array (  79 => 11,  74 => 9,  69 => 7,  64 => 5,  58 => 3,  51 => 2,  40 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends \"@forms/base.html.twig\" %}
{% block personal %}
<div x-show=\"{{ (complaint.user.employeeId is not null)? 'true' : 'staff' }}\" x-transition x-id=\"['input']\">
    <label :for=\"\$id('input')\">Staff ID : </label>
    <input type=\"text\" name=\"employeeId\" :id=\"\$id('input')\" value=\"{{ complaint.user.employeeId }}\" />
</div>
<div x-show=\"{{ (complaint.user.studentId is not null)? 'true' : 'student' }}\" x-transition x-id=\"['input']\">
    <label :for=\"\$id('input')\">Student ID : </label>
    <input type=\"text\" name=\"studentId\" :id=\"\$id('input')\" value=\"{{ complaint.user.studentId }}\" />
</div>
{{ parent() }}
{% endblock %}", "@forms/non-guest.html.twig", "/var/www/src/views/components/@forms/non-guest.html.twig");
    }
}
