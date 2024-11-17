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

/* dashboard/index.html.twig */
class __TwigTemplate_1bc81e1e21b14d262ae2593fb96bbd12 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "dashboard/index.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "dashboard/index.html.twig"));

        $this->parent = $this->loadTemplate("base.html.twig", "dashboard/index.html.twig", 1);
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
        yield "<div class=\"container-fluid\">
    <div class=\"row\">
        <nav id=\"sidebarMenu\" class=\"col-md-3 col-lg-2 d-md-block bg-light sidebar collapse vh-100\">
            <div class=\"position-sticky\">
                <ul class=\"nav flex-column\">
                    <li class=\"nav-item\">
                        <a class=\"nav-link text-dark\" href=\"";
        // line 10
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_profile_edit");
        yield "\">
                            <i class=\"bi bi-person-circle\"></i>
                            Uživatelský profil
                        </a>
                    </li>
                    <li class=\"nav-item\">
                        <a class=\"nav-link text-dark\" href=\"#\">
                            <i class=\"bi bi-bag-dash\"></i>
                            Úkoly a notifikace
                        </a>
                    </li>
                    <li class=\"nav-item\">
                        <a class=\"nav-link text-dark\" href=\"#\">
                            <i class=\"bi bi-wrench\"></i>
                            Helpdesk
                        </a>
                    </li>
                    ";
        // line 27
        if ($this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_REVIEWER")) {
            // line 28
            yield "                        <li class=\"nav-item\">
                            <a class=\"nav-link text-dark\" href=\"#\">
                                <i class=\"bi bi-bi-chat-left-text\"></i>
                                Napsat recenzi
                            </a>
                        </li>
                    ";
        }
        // line 35
        yield "                    ";
        if ($this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_ADMIN")) {
            // line 36
            yield "                        <li class=\"nav-item\">
                            <a class=\"nav-link text-dark\" href=\"#\">
                                <i class=\"bi bi-database\"></i>
                                Admin panel
                            </a>
                        </li>
                    ";
        }
        // line 43
        yield "                </ul>
            </div>
        </nav>

        <main class=\"col-md-9 ms-sm-auto col-lg-10 px-md-4\">
            <!-- Flashes -->
            ";
        // line 49
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 49, $this->source); })()), "flashes", [], "any", false, false, false, 49));
        foreach ($context['_seq'] as $context["label"] => $context["messages"]) {
            // line 50
            yield "                <div class=\"alert alert-";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["label"], "html", null, true);
            yield "\">
                    ";
            // line 51
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable($context["messages"]);
            foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
                // line 52
                yield "                        <p>";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["message"], "html", null, true);
                yield "</p>
                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['message'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 54
            yield "                </div>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['label'], $context['messages'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 56
        yield "            ";
        if ($this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_ADMINISTRATOR")) {
            // line 57
            yield "                Vítejte ADMINE, <a href=\"#\">Přejít do administrace</a>
            ";
        }
        // line 59
        yield "            ";
        if ($this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_REVIEWER")) {
            // line 60
            yield "                Vítejte recenzente, <a href=\"#\">Napsat recenzi</a>
            ";
        }
        // line 62
        yield "            ";
        if ($this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_AUTHOR")) {
            // line 63
            yield "                ";
            yield from             $this->loadTemplate("dashboard/author.html.twig", "dashboard/index.html.twig", 63)->unwrap()->yield(CoreExtension::merge($context, ["form" => (isset($context["createsubmissionform"]) || array_key_exists("createsubmissionform", $context) ? $context["createsubmissionform"] : (function () { throw new RuntimeError('Variable "createsubmissionform" does not exist.', 63, $this->source); })()), "submissions" => (isset($context["submissions"]) || array_key_exists("submissions", $context) ? $context["submissions"] : (function () { throw new RuntimeError('Variable "submissions" does not exist.', 63, $this->source); })())]));
            // line 64
            yield "            ";
        }
        // line 65
        yield "            ";
        if ($this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_EDITOR")) {
            // line 66
            yield "                ";
            yield from             $this->loadTemplate("dashboard/editor.html.twig", "dashboard/index.html.twig", 66)->unwrap()->yield(CoreExtension::merge($context, ["submissions" => (isset($context["submissions"]) || array_key_exists("submissions", $context) ? $context["submissions"] : (function () { throw new RuntimeError('Variable "submissions" does not exist.', 66, $this->source); })())]));
            // line 67
            yield "            ";
        }
        // line 68
        yield "            ";
        if ($this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_EDITORCHIEF")) {
            // line 69
            yield "                ";
            yield from             $this->loadTemplate("dashboard/editorchief.html.twig", "dashboard/index.html.twig", 69)->unwrap()->yield(CoreExtension::merge($context, ["submissions" => (isset($context["submissions"]) || array_key_exists("submissions", $context) ? $context["submissions"] : (function () { throw new RuntimeError('Variable "submissions" does not exist.', 69, $this->source); })())]));
            // line 70
            yield "            ";
        }
        // line 71
        yield "        </main>
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
        return "dashboard/index.html.twig";
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
        return array (  205 => 71,  202 => 70,  199 => 69,  196 => 68,  193 => 67,  190 => 66,  187 => 65,  184 => 64,  181 => 63,  178 => 62,  174 => 60,  171 => 59,  167 => 57,  164 => 56,  157 => 54,  148 => 52,  144 => 51,  139 => 50,  135 => 49,  127 => 43,  118 => 36,  115 => 35,  106 => 28,  104 => 27,  84 => 10,  76 => 4,  63 => 3,  40 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block body %}
<div class=\"container-fluid\">
    <div class=\"row\">
        <nav id=\"sidebarMenu\" class=\"col-md-3 col-lg-2 d-md-block bg-light sidebar collapse vh-100\">
            <div class=\"position-sticky\">
                <ul class=\"nav flex-column\">
                    <li class=\"nav-item\">
                        <a class=\"nav-link text-dark\" href=\"{{ path('app_profile_edit') }}\">
                            <i class=\"bi bi-person-circle\"></i>
                            Uživatelský profil
                        </a>
                    </li>
                    <li class=\"nav-item\">
                        <a class=\"nav-link text-dark\" href=\"#\">
                            <i class=\"bi bi-bag-dash\"></i>
                            Úkoly a notifikace
                        </a>
                    </li>
                    <li class=\"nav-item\">
                        <a class=\"nav-link text-dark\" href=\"#\">
                            <i class=\"bi bi-wrench\"></i>
                            Helpdesk
                        </a>
                    </li>
                    {% if is_granted('ROLE_REVIEWER') %}
                        <li class=\"nav-item\">
                            <a class=\"nav-link text-dark\" href=\"#\">
                                <i class=\"bi bi-bi-chat-left-text\"></i>
                                Napsat recenzi
                            </a>
                        </li>
                    {% endif %}
                    {% if is_granted('ROLE_ADMIN') %}
                        <li class=\"nav-item\">
                            <a class=\"nav-link text-dark\" href=\"#\">
                                <i class=\"bi bi-database\"></i>
                                Admin panel
                            </a>
                        </li>
                    {% endif %}
                </ul>
            </div>
        </nav>

        <main class=\"col-md-9 ms-sm-auto col-lg-10 px-md-4\">
            <!-- Flashes -->
            {% for label, messages in app.flashes %}
                <div class=\"alert alert-{{ label }}\">
                    {% for message in messages %}
                        <p>{{ message }}</p>
                    {% endfor %}
                </div>
            {% endfor %}
            {% if is_granted('ROLE_ADMINISTRATOR') %}
                Vítejte ADMINE, <a href=\"#\">Přejít do administrace</a>
            {% endif %}
            {% if is_granted('ROLE_REVIEWER') %}
                Vítejte recenzente, <a href=\"#\">Napsat recenzi</a>
            {% endif %}
            {% if is_granted('ROLE_AUTHOR') %}
                {% include 'dashboard/author.html.twig' with {'form': createsubmissionform, 'submissions': submissions} %}
            {% endif %}
            {% if is_granted('ROLE_EDITOR') %}
                {% include 'dashboard/editor.html.twig' with {'submissions': submissions} %}
            {% endif %}
            {% if is_granted('ROLE_EDITORCHIEF') %}
                {% include 'dashboard/editorchief.html.twig' with {'submissions': submissions} %}
            {% endif %}
        </main>
    </div>
</div>
{% endblock %}", "dashboard/index.html.twig", "C:\\Users\\adamp\\OneDrive\\Plocha\\rsp\\templates\\dashboard\\index.html.twig");
    }
}
