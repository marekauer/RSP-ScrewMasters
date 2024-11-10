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

/* publication/publication_detail.html.twig */
class __TwigTemplate_6d12f5fcf9ccc8312fdf5d5c97ea7869 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "publication/publication_detail.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "publication/publication_detail.html.twig"));

        $this->parent = $this->loadTemplate("base.html.twig", "publication/publication_detail.html.twig", 1);
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
    <div class=\"card shadow-sm border-0\">
        <div class=\"card-body\">
            <h3 class=\"card-title text-primary\">Article Title</h3>
            <h6 class=\"card-subtitle mb-3 text-muted\">Publikováno: 1. 1. 2024</h6>
            <p class=\"card-text text-justify\">
                Lorem ipsum dolor sit amet consectetur adipisicing elit.
                Laudantium, id corporis reiciendis cupiditate architecto deserunt
                placeat nostrum necessitatibus sequi voluptate assumenda at sunt
                natus doloremque perferendis odio enim ab molestiae ullam earum
                nesciunt! Beatae delectus commodi quas dolores modi dolorem expedita
                labore facere blanditiis error a natus maiores iste, sint accusantium
                nam nobis atque possimus ipsam sed recusandae vero porro.
                Voluptatum et tenetur ut laudantium corrupti tempore, veritatis
                ex suscipit illum enim perspiciatis, eligendi error neque beatae
                in itaque maiores ab autem, ipsa maxime?
                Laborum minus laudantium inventore expedita iste, totam ipsa quas?
                Unde suscipit explicabo dolores ab voluptatibus a!
            </p>
        </div>
    </div>
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
        return "publication/publication_detail.html.twig";
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
        return array (  76 => 4,  63 => 3,  40 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block body %}
<div class=\"container mt-5\">
    <div class=\"card shadow-sm border-0\">
        <div class=\"card-body\">
            <h3 class=\"card-title text-primary\">Article Title</h3>
            <h6 class=\"card-subtitle mb-3 text-muted\">Publikováno: 1. 1. 2024</h6>
            <p class=\"card-text text-justify\">
                Lorem ipsum dolor sit amet consectetur adipisicing elit.
                Laudantium, id corporis reiciendis cupiditate architecto deserunt
                placeat nostrum necessitatibus sequi voluptate assumenda at sunt
                natus doloremque perferendis odio enim ab molestiae ullam earum
                nesciunt! Beatae delectus commodi quas dolores modi dolorem expedita
                labore facere blanditiis error a natus maiores iste, sint accusantium
                nam nobis atque possimus ipsam sed recusandae vero porro.
                Voluptatum et tenetur ut laudantium corrupti tempore, veritatis
                ex suscipit illum enim perspiciatis, eligendi error neque beatae
                in itaque maiores ab autem, ipsa maxime?
                Laborum minus laudantium inventore expedita iste, totam ipsa quas?
                Unde suscipit explicabo dolores ab voluptatibus a!
            </p>
        </div>
    </div>
</div>
{% endblock %}", "publication/publication_detail.html.twig", "C:\\Users\\adamp\\OneDrive\\Plocha\\rsp\\templates\\publication\\publication_detail.html.twig");
    }
}
