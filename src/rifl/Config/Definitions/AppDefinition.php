<?php
namespace Bear\Config\Definitions;


use Symfony\Component\Config\Definition\Builder\TreeBuilder;

class AppDefinition implements DefinitionInterface
{
    const ROOT = 'app';
    const NODE_PRODUCTION = 'production';

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
                ->booleanNode(self::NODE_PRODUCTION)->defaultTrue()->end()
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
