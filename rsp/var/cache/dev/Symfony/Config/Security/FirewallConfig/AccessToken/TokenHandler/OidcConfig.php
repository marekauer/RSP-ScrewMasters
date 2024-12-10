<?php

namespace Symfony\Config\Security\FirewallConfig\AccessToken\TokenHandler;

require_once __DIR__.\DIRECTORY_SEPARATOR.'Oidc'.\DIRECTORY_SEPARATOR.'AlgorithmConfig.php';

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class OidcConfig 
{
    private $claim;
    private $audience;
    private $issuers;
    private $algorithm;
    private $algorithms;
    private $key;
    private $keyset;
    private $_usedProperties = [];

    /**
     * Claim which contains the user identifier (e.g.: sub, email..).
     * @default 'sub'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function claim($value): static
    {
        $this->_usedProperties['claim'] = true;
        $this->claim = $value;

        return $this;
    }

    /**
     * Audience set in the token, for validation purpose.
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function audience($value): static
    {
        $this->_usedProperties['audience'] = true;
        $this->audience = $value;

        return $this;
    }

    /**
     * @param ParamConfigurator|list<ParamConfigurator|mixed> $value
     *
     * @return $this
     */
    public function issuers(ParamConfigurator|array $value): static
    {
        $this->_usedProperties['issuers'] = true;
        $this->issuers = $value;

        return $this;
    }

    /**
     * Algorithm used to sign the token.
     * @deprecated The "algorithm" option is deprecated and will be removed in 8.0. Use the "algorithms" option instead.
    */
    public function algorithm(array $value = []): \Symfony\Config\Security\FirewallConfig\AccessToken\TokenHandler\Oidc\AlgorithmConfig
    {
        if (null === $this->algorithm) {
            $this->_usedProperties['algorithm'] = true;
            $this->algorithm = new \Symfony\Config\Security\FirewallConfig\AccessToken\TokenHandler\Oidc\AlgorithmConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "algorithm()" has already been initialized. You cannot pass values the second time you call algorithm().');
        }

        return $this->algorithm;
    }

    /**
     * @param ParamConfigurator|list<ParamConfigurator|mixed> $value
     *
     * @return $this
     */
    public function algorithms(ParamConfigurator|array $value): static
    {
        $this->_usedProperties['algorithms'] = true;
        $this->algorithms = $value;

        return $this;
    }

    /**
     * JSON-encoded JWK used to sign the token (must contain a "kty" key).
     * @default null
     * @param ParamConfigurator|mixed $value
     * @deprecated The "key" option is deprecated and will be removed in 8.0. Use the "keyset" option instead.
     * @return $this
     */
    public function key($value): static
    {
        $this->_usedProperties['key'] = true;
        $this->key = $value;

        return $this;
    }

    /**
     * JSON-encoded JWKSet used to sign the token (must contain a list of valid keys).
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function keyset($value): static
    {
        $this->_usedProperties['keyset'] = true;
        $this->keyset = $value;

        return $this;
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('claim', $value)) {
            $this->_usedProperties['claim'] = true;
            $this->claim = $value['claim'];
            unset($value['claim']);
        }

        if (array_key_exists('audience', $value)) {
            $this->_usedProperties['audience'] = true;
            $this->audience = $value['audience'];
            unset($value['audience']);
        }

        if (array_key_exists('issuers', $value)) {
            $this->_usedProperties['issuers'] = true;
            $this->issuers = $value['issuers'];
            unset($value['issuers']);
        }

        if (array_key_exists('algorithm', $value)) {
            $this->_usedProperties['algorithm'] = true;
            $this->algorithm = new \Symfony\Config\Security\FirewallConfig\AccessToken\TokenHandler\Oidc\AlgorithmConfig($value['algorithm']);
            unset($value['algorithm']);
        }

        if (array_key_exists('algorithms', $value)) {
            $this->_usedProperties['algorithms'] = true;
            $this->algorithms = $value['algorithms'];
            unset($value['algorithms']);
        }

        if (array_key_exists('key', $value)) {
            $this->_usedProperties['key'] = true;
            $this->key = $value['key'];
            unset($value['key']);
        }

        if (array_key_exists('keyset', $value)) {
            $this->_usedProperties['keyset'] = true;
            $this->keyset = $value['keyset'];
            unset($value['keyset']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['claim'])) {
            $output['claim'] = $this->claim;
        }
        if (isset($this->_usedProperties['audience'])) {
            $output['audience'] = $this->audience;
        }
        if (isset($this->_usedProperties['issuers'])) {
            $output['issuers'] = $this->issuers;
        }
        if (isset($this->_usedProperties['algorithm'])) {
            $output['algorithm'] = $this->algorithm->toArray();
        }
        if (isset($this->_usedProperties['algorithms'])) {
            $output['algorithms'] = $this->algorithms;
        }
        if (isset($this->_usedProperties['key'])) {
            $output['key'] = $this->key;
        }
        if (isset($this->_usedProperties['keyset'])) {
            $output['keyset'] = $this->keyset;
        }

        return $output;
    }

}
