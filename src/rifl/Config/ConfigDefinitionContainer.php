<?php
namespace rifl\Config;


use rifl\Config\Definitions\DefinitionInterface;

class ConfigDefinitionContainer
{
    /**
     * @var DefinitionInterface[]
     */
    private $definitionList = [];

    public function addDefinition(DefinitionInterface $definition)
    {
        $this->definitionList[spl_object_hash($definition)] = $definition;
    }

    /**
     * @return DefinitionInterface[]
     */
    public function getDefinitionList()
    {
        return $this->definitionList;
    }
}
