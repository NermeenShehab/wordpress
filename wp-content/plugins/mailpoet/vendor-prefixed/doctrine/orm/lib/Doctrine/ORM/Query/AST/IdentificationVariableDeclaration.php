<?php
 namespace MailPoetVendor\Doctrine\ORM\Query\AST; if (!defined('ABSPATH')) exit; class IdentificationVariableDeclaration extends \MailPoetVendor\Doctrine\ORM\Query\AST\Node { public $rangeVariableDeclaration = null; public $indexBy = null; public $joins = []; public function __construct($rangeVariableDecl, $indexBy, array $joins) { $this->rangeVariableDeclaration = $rangeVariableDecl; $this->indexBy = $indexBy; $this->joins = $joins; } public function dispatch($sqlWalker) { return $sqlWalker->walkIdentificationVariableDeclaration($this); } } 