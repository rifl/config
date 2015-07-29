<?php
namespace rifl\Config\Definitions;


use Symfony\Component\Config\Definition\Builder\TreeBuilder;

class DoctrineDefinition implements DefinitionInterface
{
    const ROOT = 'doctrine';
    const NODE_ADAPTER = 'adapter';
    const NODE_CONNECTION = 'connection';
    const NODE_HOST = 'host';
    const NODE_USERNAME = 'username';
    const NODE_PASSWORD = 'password';
    const NODE_DATABASE = 'database';
    const NODE_CONFIGURATION = 'configuration';
    const NODE_AUTOGENERATE_PROXIES = 'autogenerate_proxies';

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
                ->scalarNode(self::NODE_ADAPTER)->end()
                ->booleanNode(self::NODE_AUTOGENERATE_PROXIES)->defaultFalse()->end()
                ->arrayNode(self::NODE_CONNECTION)
                    ->children()
                        ->scalarNode(self::NODE_HOST)->end()
                        ->scalarNode(self::NODE_USERNAME)->end()
                        ->scalarNode(self::NODE_PASSWORD)->end()
                        ->scalarNode(self::NODE_DATABASE)->end()
                    ->end()
                ->end()
            ->end()
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
