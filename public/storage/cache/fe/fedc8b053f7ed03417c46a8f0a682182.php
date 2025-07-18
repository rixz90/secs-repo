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
class __TwigTemplate_6c227b936b9515fa5707fc23fef1ab63 extends Template
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
        yield "<!doctype html>
<html>
\t<head>
\t\t";
        // line 4
        yield from $this->unwrap()->yieldBlock('head', $context, $blocks);
        // line 7
        yield "\t<script defer src=\"bundle_7550ec0397b99a0bd362.js\"></script></head>
\t<body>
\t\t<header>";
        // line 9
        yield from $this->unwrap()->yieldBlock('header', $context, $blocks);
        yield "</header>
\t\t";
        // line 10
        yield from $this->unwrap()->yieldBlock('content', $context, $blocks);
        // line 11
        yield "\t\t<footer>";
        yield from $this->unwrap()->yieldBlock('footer', $context, $blocks);
        yield "</footer>
\t</body>
</html>
";
        yield from [];
    }

    // line 4
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_head(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 5
        yield "\t\t<title>SECS</title>
\t\t";
        yield from [];
    }

    // line 9
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_header(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        yield from [];
    }

    // line 10
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_content(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        yield from [];
    }

    // line 11
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
        return array (  106 => 11,  96 => 10,  86 => 9,  80 => 5,  73 => 4,  63 => 11,  61 => 10,  57 => 9,  53 => 7,  51 => 4,  46 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "@layouts/base.html.twig", "/var/www/src/views/components/@layouts/base.html.twig");
    }
}
