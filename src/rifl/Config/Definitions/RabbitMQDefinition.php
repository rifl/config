<?php
namespace Bear\Config\Definitions;


use Symfony\Component\Config\Definition\Builder\TreeBuilder;

class RabbitMQDefinition implements DefinitionInterface
{
    const ROOT = 'rabbitmq';
    const NODE_HOST = 'host';
    const NODE_USERNAME = 'username';
    const NODE_PASSWORD = 'password';
    const NODE_PORT = 'port';
    const NODE_VHOST = 'vhost';

    /**
     * Generates the configuration tree builder.
     *
     * @return \Symfony\Component\Config\Definition\Builder\TreeBuilder The tree builder
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root(self::ROOT);

        $rootNode->performNoDeepMerging();

        $rootNode
            ->children()
            ->scalarNode(self::NODE_HOST)->end()
            ->scalarNode(self::NODE_PORT)->end()
            ->scalarNode(self::NODE_USERNAME)->end()
            ->scalarNode(self::NODE_PASSWORD)->end()
            ->scalarNode(self::NODE_VHOST)->end()
            ->end();

        return $treeBuilder;
    }

    /**
     * Returns the root node of the configuration tree
     *
     * @return mixed
     */
    public function getRootNode()
    {
        return self::ROOT;
    }


}