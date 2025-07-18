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

/* @layouts/base.html.twig */
class __TwigTemplate_9938e532e2fa293416f1b5bc2f85874c extends Template
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
            'head' => [$this, 'block_head'],
            'header' => [$this, 'block_header'],
            'content' => [$this, 'block_content'],
            'footer' => [$this, 'block_footer'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 1
        yield "<!doctype html><html><head>";
        yield from $this->unwrap()->yieldBlock('head', $context, $blocks);
        yield "<script defer=\"defer\" src=\"bundle_7cae3fae1cddf1a34d6e.js\"></script></head><body><header>";
        yield from $this->unwrap()->yieldBlock('header', $context, $blocks);
        yield "</header>";
        yield from $this->unwrap()->yieldBlock('content', $context, $blocks);
        yield "<footer>";
        yield from $this->unwrap()->yieldBlock('footer', $context, $blocks);
        yield "</footer></body></html>";
        yield from [];
    }

    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_head(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        yield "<title>SECS</title>";
        yield from [];
    }

    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_header(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        yield from [];
    }

    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_content(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        yield from [];
    }

    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_footer(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@layouts/base.html.twig";
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo(): array
    {
        return array (  46 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<!doctype html><html><head>{% block head %}<title>SECS</title>{% endblock %}<script defer=\"defer\" src=\"bundle_7cae3fae1cddf1a34d6e.js\"></script></head><body><header>{% block header %}{% endblock header %}</header>{% block content %}{% endblock content %}<footer>{% block footer %}{% endblock footer %}</footer></body></html>", "@layouts/base.html.twig", "/var/www/src/views/components/@layouts/base.html.twig");
    }
}
