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

/* home/index.html.twig */
class __TwigTemplate_4156063c65c59a7b33b3b28dcd068486 extends Template
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
            'title' => [$this, 'block_title'],
            'body' => [$this, 'block_body'],
        ];
    }

    protected function doGetParent(array $context): bool|string|Template|TemplateWrapper
    {
        // line 1
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "home/index.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "home/index.html.twig"));

        $this->parent = $this->loadTemplate("base.html.twig", "home/index.html.twig", 1);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 3
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_title(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        yield "TechMind";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 5
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_body(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 6
        yield "<div class=\"container my-5\">
    <div class=\"row justify-content-center\">
        <div class=\"col-lg-12\">
            <div class=\"card shadow-lg border-light\">
                <img src=\"https://static.vecteezy.com/system/resources/thumbnails/001/626/459/original/abstract-light-green-particles-wave-background-free-video.jpg\" class=\"card-img-top\" alt=\"Article image\">
                <div class=\"card-body\">
                    <h1 class=\"card-title mb-3\">
                        ";
        // line 13
        if ((isset($context["lastPublicatedSubmission"]) || array_key_exists("lastPublicatedSubmission", $context) ? $context["lastPublicatedSubmission"] : (function () { throw new RuntimeError('Variable "lastPublicatedSubmission" does not exist.', 13, $this->source); })())) {
            // line 14
            yield "                            ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["lastPublicatedSubmission"]) || array_key_exists("lastPublicatedSubmission", $context) ? $context["lastPublicatedSubmission"] : (function () { throw new RuntimeError('Variable "lastPublicatedSubmission" does not exist.', 14, $this->source); })()), "name", [], "any", false, false, false, 14), "html", null, true);
            yield "
                        ";
        } else {
            // line 16
            yield "                            The Power of Technology in Education
                        ";
        }
        // line 18
        yield "                    </h1>
                    <p class=\"text-muted mb-3\">
                        ";
        // line 20
        if ((isset($context["lastPublicatedSubmission"]) || array_key_exists("lastPublicatedSubmission", $context) ? $context["lastPublicatedSubmission"] : (function () { throw new RuntimeError('Variable "lastPublicatedSubmission" does not exist.', 20, $this->source); })())) {
            // line 21
            yield "                            Autor: <strong>";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["lastPublicatedSubmission"]) || array_key_exists("lastPublicatedSubmission", $context) ? $context["lastPublicatedSubmission"] : (function () { throw new RuntimeError('Variable "lastPublicatedSubmission" does not exist.', 21, $this->source); })()), "email", [], "any", false, false, false, 21), "html", null, true);
            yield "</strong> | ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, (isset($context["lastPublicatedSubmission"]) || array_key_exists("lastPublicatedSubmission", $context) ? $context["lastPublicatedSubmission"] : (function () { throw new RuntimeError('Variable "lastPublicatedSubmission" does not exist.', 21, $this->source); })()), "publicatedAt", [], "any", false, false, false, 21), "d.m.Y", "Europe/Prague"), "html", null, true);
            yield "
                        ";
        } else {
            // line 23
            yield "                            Autor: <strong>John Doe</strong> | November 15, 2024
                        ";
        }
        // line 25
        yield "                    </p>
                </div>
                <div class=\"card-footer text-center\">
                    <a href=\"/uploads/";
        // line 28
        (((isset($context["lastPublicatedSubmission"]) || array_key_exists("lastPublicatedSubmission", $context) ? $context["lastPublicatedSubmission"] : (function () { throw new RuntimeError('Variable "lastPublicatedSubmission" does not exist.', 28, $this->source); })())) ? (yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["lastPublicatedSubmission"]) || array_key_exists("lastPublicatedSubmission", $context) ? $context["lastPublicatedSubmission"] : (function () { throw new RuntimeError('Variable "lastPublicatedSubmission" does not exist.', 28, $this->source); })()), "filename", [], "any", false, false, false, 28), "html", null, true)) : (yield "#"));
        yield "\" class=\"btn btn-primary btn-lg rounded-pill px-4 py-2\" target=\"_blank\">Přečíst (PDF)</a>
                </div>
                <div class=\"mt-4 text-center\">
                    <a href=\"";
        // line 31
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_psub");
        yield "\" class=\"btn btn-warning btn-lg rounded-pill px-4 py-2 mb-2\">Zobrazit více článků</a>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .card {
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
    .card-img-top {
        object-fit: cover;
        height: 400px;
    }
    .card-body {
        padding: 30px;
    }
    .card-title {
        font-size: 2.5rem;
        font-weight: bold;
        color: #343a40;
    }
    .card-text {
        font-size: 1.125rem;
        color: #6c757d;
    }
    .card-footer {
        background-color: #f8f9fa;
        border-top: 1px solid #ddd;
    }
</style>

<section class=\"py-1\">
    <div class=\"container\">
        <div class=\"row\">
            <i>Školní projekt VŠPJ, ScrewMasters</i>
        </div>
    </div>
</section>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "home/index.html.twig";
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
        return array (  150 => 31,  144 => 28,  139 => 25,  135 => 23,  127 => 21,  125 => 20,  121 => 18,  117 => 16,  111 => 14,  109 => 13,  100 => 6,  87 => 5,  64 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}TechMind{% endblock %}

{% block body %}
<div class=\"container my-5\">
    <div class=\"row justify-content-center\">
        <div class=\"col-lg-12\">
            <div class=\"card shadow-lg border-light\">
                <img src=\"https://static.vecteezy.com/system/resources/thumbnails/001/626/459/original/abstract-light-green-particles-wave-background-free-video.jpg\" class=\"card-img-top\" alt=\"Article image\">
                <div class=\"card-body\">
                    <h1 class=\"card-title mb-3\">
                        {% if lastPublicatedSubmission %}
                            {{ lastPublicatedSubmission.name }}
                        {% else %}
                            The Power of Technology in Education
                        {% endif %}
                    </h1>
                    <p class=\"text-muted mb-3\">
                        {% if lastPublicatedSubmission %}
                            Autor: <strong>{{ lastPublicatedSubmission.email }}</strong> | {{ lastPublicatedSubmission.publicatedAt|date('d.m.Y', 'Europe/Prague') }}
                        {% else %}
                            Autor: <strong>John Doe</strong> | November 15, 2024
                        {% endif %}
                    </p>
                </div>
                <div class=\"card-footer text-center\">
                    <a href=\"/uploads/{{ lastPublicatedSubmission ? lastPublicatedSubmission.filename : '#' }}\" class=\"btn btn-primary btn-lg rounded-pill px-4 py-2\" target=\"_blank\">Přečíst (PDF)</a>
                </div>
                <div class=\"mt-4 text-center\">
                    <a href=\"{{ path('app_psub') }}\" class=\"btn btn-warning btn-lg rounded-pill px-4 py-2 mb-2\">Zobrazit více článků</a>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .card {
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
    .card-img-top {
        object-fit: cover;
        height: 400px;
    }
    .card-body {
        padding: 30px;
    }
    .card-title {
        font-size: 2.5rem;
        font-weight: bold;
        color: #343a40;
    }
    .card-text {
        font-size: 1.125rem;
        color: #6c757d;
    }
    .card-footer {
        background-color: #f8f9fa;
        border-top: 1px solid #ddd;
    }
</style>

<section class=\"py-1\">
    <div class=\"container\">
        <div class=\"row\">
            <i>Školní projekt VŠPJ, ScrewMasters</i>
        </div>
    </div>
</section>
{% endblock %}
", "home/index.html.twig", "C:\\Users\\Uživatel\\Desktop\\Programing\\VŠPJ\\RSP\\RSP-ScrewMasters\\rsp\\templates\\home\\index.html.twig");
    }
}
