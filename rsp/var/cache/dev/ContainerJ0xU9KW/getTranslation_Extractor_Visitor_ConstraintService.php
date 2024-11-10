<?php

namespace ContainerJ0xU9KW;


use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getTranslation_Extractor_Visitor_ConstraintService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private 'translation.extractor.visitor.constraint' shared service.
     *
     * @return \Symfony\Component\Translation\Extractor\Visitor\ConstraintVisitor
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'vendor'.\DIRECTORY_SEPARATOR.'symfony'.\DIRECTORY_SEPARATOR.'translation'.\DIRECTORY_SEPARATOR.'Extractor'.\DIRECTORY_SEPARATOR.'Visitor'.\DIRECTORY_SEPARATOR.'AbstractVisitor.php';
        include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'vendor'.\DIRECTORY_SEPARATOR.'nikic'.\DIRECTORY_SEPARATOR.'php-parser'.\DIRECTORY_SEPARATOR.'lib'.\DIRECTORY_SEPARATOR.'PhpParser'.\DIRECTORY_SEPARATOR.'NodeVisitor.php';
        include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'vendor'.\DIRECTORY_SEPARATOR.'symfony'.\DIRECTORY_SEPARATOR.'translation'.\DIRECTORY_SEPARATOR.'Extractor'.\DIRECTORY_SEPARATOR.'Visitor'.\DIRECTORY_SEPARATOR.'ConstraintVisitor.php';

        return $container->privates['translation.extractor.visitor.constraint'] = new \Symfony\Component\Translation\Extractor\Visitor\ConstraintVisitor(['All', 'AtLeastOneOf', 'Bic', 'Blank', 'Callback', 'CardScheme', 'Charset', 'Choice', 'Cidr', 'Collection', 'Compound', 'Count', 'Country', 'CssColor', 'Currency', 'DateTime', 'Date', 'DivisibleBy', 'Email', 'EqualTo', 'ExpressionSyntax', 'Expression', 'File', 'GreaterThanOrEqual', 'GreaterThan', 'Hostname', 'Iban', 'IdenticalTo', 'Image', 'Ip', 'IsFalse', 'IsNull', 'IsTrue', 'Isbn', 'Isin', 'Issn', 'Json', 'Language', 'Length', 'LessThanOrEqual', 'LessThan', 'Locale', 'Luhn', 'MacAddress', 'NoSuspiciousCharacters', 'NotBlank', 'NotCompromisedPassword', 'NotEqualTo', 'NotIdenticalTo', 'NotNull', 'PasswordStrength', 'Range', 'Regex', 'Sequentially', 'Time', 'Timezone', 'Type', 'Ulid', 'Unique', 'Url', 'Uuid', 'Valid', 'When', 'Expression', 'Email', 'NotCompromisedPassword', 'When', 'NoSuspiciousCharacters', 'UniqueEntity', 'UserPassword']);
    }
}
