<?php
namespace Bear\Config;


use Bear\Config\Definitions\DefinitionInterface;
use Symfony\Component\Config\Definition\Processor;
use Symfony\Component\Config\FileLocatorInterface;
use Symfony\Component\Yaml\Yaml;

class ConfigLoader
{
    /** @var FileLocatorInterface  */
    protected $locator;
    /** @var Processor  */
    protected $processor;

    public function __construct(FileLocatorInterface $locator, Processor $processor)
    {
        $this->locator = $locator;
        $this->processor = $processor;
    }

    /**
     * @param DefinitionInterface $definition
     * @return array
     */
    public function loadConfigByDefinition(DefinitionInterface $definition)
    {
        $configFile = $this->locator->locate($definition->getRootNode() . '.yml', null, true);
        $configData = Yaml::parse($configFile);
        return $this->processor->processConfiguration(
            $definition,
            $configData
        );
    }
}