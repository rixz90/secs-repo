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

/* 404.html.twig */
class __TwigTemplate_02a6cac9e86473bec7d9deefc4396dae extends Template
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
            'content' => [$this, 'block_content'],
        ];
    }

    protected function doGetParent(array $context): bool|string|Template|TemplateWrapper
    {
        // line 1
        return "@layouts/base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $this->parent = $this->load("@layouts/base.html.twig", 1);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_content(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 4
        yield "\t<body>
\t\t<div id=\"notfound\">
\t\t\t<div class=\"notfound\">
\t\t\t\t<div class=\"notfound-404\">
\t\t\t\t\t<h3>Oops! Page not found</h3>
\t\t\t\t\t<h1><span>4</span><span>0</span><span>4</span></h1>
\t\t\t\t</div>
\t\t\t\t<h2>we are sorry, but the page you requested was not found</h2>
\t\t\t</div>
\t\t</div>
\t</body>
\t<style>
\t\t* { -webkit-box-sizing: border-box; box-sizing: border-box; }

\t\tbody { padding: 0; margin: 0; }

\t\t#notfound { position: relative; height: 100vh; max-height: 90vh; }

\t\t#notfound .notfound { position: absolute; left: 50%; top: 50%; -webkit-transform: translate(-50%, -50%);
\t\t-ms-transform: translate(-50%, -50%); transform: translate(-50%, -50%); }

\t\t.notfound { max-width: 520px; width: 100%; line-height: 1.4; text-align: center; }

\t\t.notfound .notfound-404 { position: relative; height: 240px; }

\t\t.notfound .notfound-404 h1 { font-family: 'Montserrat', sans-serif; position: absolute; left: 50%; top: 50%;
\t\t-webkit-transform: translate(-50%, -50%); -ms-transform: translate(-50%, -50%); transform: translate(-50%, -50%);
\t\tfont-size: 252px; font-weight: 900; margin: 0px; color: #262626; text-transform: uppercase; letter-spacing: -40px;
\t\tmargin-left: -20px; }

\t\t.notfound .notfound-404 h1>span { text-shadow: -8px 0px 0px #fff; }

\t\t.notfound .notfound-404 h3 { font-family: 'Cabin', sans-serif; position: relative; font-size: 16px; font-weight:
\t\t700; text-transform: uppercase; color: #262626; margin: 0px; letter-spacing: 3px; padding-left: 6px; }

\t\t.notfound h2 { font-family: 'Cabin', sans-serif; font-size: 20px; font-weight: 400; text-transform: uppercase;
\t\tcolor: #000; margin-top: 0px; margin-bottom: 25px; }

\t\t@media only screen and (max-width: 767px) { .notfound .notfound-404 { height: 200px; }

\t\t.notfound .notfound-404 h1 { font-size: 200px; } }

\t\t@media only screen and (max-width: 480px) { .notfound .notfound-404 { height: 162px; }

\t\t.notfound .notfound-404 h1 { font-size: 162px; height: 150px; line-height: 162px; }

\t\t.notfound h2 { font-size: 16px; } }
\t</style>
";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "404.html.twig";
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
        return array (  58 => 4,  51 => 3,  40 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "404.html.twig", "/var/www/src/views/404.html.twig");
    }
}
