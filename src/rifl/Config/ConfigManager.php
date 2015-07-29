<?php
namespace Bear\Config;


use Symfony\Component\Config\Definition\Processor;
use Symfony\Component\Config\FileLocator;
use Zend\Config\Config;

class ConfigManager
{

    /** @var ConfigDefinitionContainer  */
    protected $definitions;
    /** @var FileLocator */
    protected $locator;
    /** @var ConfigLoader */
    protected $configLoader;
    /** @var array  */
    protected $config = [];

    public function __construct(array $configDirs = [], ConfigDefinitionContainer $definitions)
    {
        $this->definitions = $definitions;
        $this->configLoader = new ConfigLoader(new FileLocator($configDirs), new Processor());
    }

    /**
     * Loads configuration from configuration definitions
     */
    public function load()
    {
        $config = [];

        foreach ($this->definitions->getDefinitionList() as $definition) {
            $config[$definition->getRootNode()] = $this->configLoader->loadConfigByDefinition($definition);
        }

        $this->config = $config;
    }

    /**
     * Returns an instance of Zend\Config\Config
     *
     * @return Config
     */
    public function getConfigProvider()
    {
        return new Config($this->config);
    }
}
