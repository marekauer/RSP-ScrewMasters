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

/* publication/index.html.twig */
class __TwigTemplate_4eceec44758051e1b9dabcb825ed26aa extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "publication/index.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "publication/index.html.twig"));

        $this->parent = $this->loadTemplate("base.html.twig", "publication/index.html.twig", 1);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 3
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

        // line 4
        yield "<div class=\"container mt-5\">
    <h2 class=\"ml-3\">Seznam článků</h2>
    <div class=\"container mt-5\">
        <div class=\"list-group mt-4 shadow-sm\">
            <a href=\"#\" class=\"list-group-item list-group-item-action d-flex justify-content-between align-items-start\">
                <div class=\"ms-2 me-auto\">
                    <h5 class=\"fw-bold text-primary\">Test title</h5>
                    <p class=\"text-muted\">Test ukázka</p>
                    <small class=\"text-secondary\">Publikováno: 1. 1. 2024</small>
                </div>
                <a href=\"";
        // line 14
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_publication_detail");
        yield "\" class=\"btn btn-outline-primary btn-sm\">
                    <i class=\"bi bi-book\"></i> Přečíst
                </a>
            </a>
        </div>
    </div>

    <nav aria-label=\"Pagination\" class=\"mt-4\">
        <ul class=\"pagination justify-content-center\">
            ";
        // line 40
        yield "        </ul>
    </nav>
</div>
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
        return "publication/index.html.twig";
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
        return array (  100 => 40,  88 => 14,  76 => 4,  63 => 3,  40 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block body %}
<div class=\"container mt-5\">
    <h2 class=\"ml-3\">Seznam článků</h2>
    <div class=\"container mt-5\">
        <div class=\"list-group mt-4 shadow-sm\">
            <a href=\"#\" class=\"list-group-item list-group-item-action d-flex justify-content-between align-items-start\">
                <div class=\"ms-2 me-auto\">
                    <h5 class=\"fw-bold text-primary\">Test title</h5>
                    <p class=\"text-muted\">Test ukázka</p>
                    <small class=\"text-secondary\">Publikováno: 1. 1. 2024</small>
                </div>
                <a href=\"{{ path('app_publication_detail') }}\" class=\"btn btn-outline-primary btn-sm\">
                    <i class=\"bi bi-book\"></i> Přečíst
                </a>
            </a>
        </div>
    </div>

    <nav aria-label=\"Pagination\" class=\"mt-4\">
        <ul class=\"pagination justify-content-center\">
            {# {% if articles.hasPreviousPage %}
                <li class=\"page-item\">
                    <a class=\"page-link\" href=\"{{ path('article_list', { page: articles.previousPage }) }}\">Předchozí</a>
                </li>
            {% endif %}

            {% for page in 1..articles.pageCount %}
                <li class=\"page-item {{ page == articles.currentPage ? 'active' : '' }}\">
                    <a class=\"page-link\" href=\"{{ path('article_list', { page: page }) }}\">{{ page }}</a>
                </li>
            {% endfor %}

            {% if articles.hasNextPage %}
                <li class=\"page-item\">
                    <a class=\"page-link\" href=\"{{ path('article_list', { page: articles.nextPage }) }}\">Další</a>
                </li>
            {% endif %} #}
        </ul>
    </nav>
</div>
{% endblock %}", "publication/index.html.twig", "C:\\Users\\adamp\\OneDrive\\Plocha\\rsp\\templates\\publication\\index.html.twig");
    }
}
