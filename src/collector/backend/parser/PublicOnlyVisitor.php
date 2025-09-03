<?php declare(strict_types = 1);
namespace TheSeer\phpDox\Collector\Backend;

use PhpParserSG\Node;
use PhpParserSG\Node\Stmt as NodeType;
use PhpParserSG\NodeVisitorAbstract;

class PublicOnlyVisitor extends NodeVisitorAbstract {
    /**
     * @return int|Node
     */
    public function enterNode(Node $node) {
        if (($node instanceof NodeType\Property ||
                $node instanceof NodeType\ClassMethod ||
                $node instanceof NodeType\ClassConst) && !$node->isPublic()) {
            return new NodeType\Nop();
        }

        return $node;
    }
}
