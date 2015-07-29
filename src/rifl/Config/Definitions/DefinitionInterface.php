<?php
namespace rifl\Config\Definitions;


use Symfony\Component\Config\Definition\ConfigurationInterface;

interface DefinitionInterface extends ConfigurationInterface
{

    /**
     * Returns the root node of the configuration tree
     *
     * @return mixed
     */
    public function getRootNode();
}
