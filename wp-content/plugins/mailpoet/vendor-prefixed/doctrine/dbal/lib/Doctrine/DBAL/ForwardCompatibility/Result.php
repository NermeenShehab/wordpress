<?php
 namespace MailPoetVendor\Doctrine\DBAL\ForwardCompatibility; if (!defined('ABSPATH')) exit; use MailPoetVendor\Doctrine\DBAL\Driver; use MailPoetVendor\Doctrine\DBAL\Exception; use MailPoetVendor\Doctrine\DBAL\Exception\NoKeyValue; use MailPoetVendor\Doctrine\DBAL\ParameterType; use MailPoetVendor\Doctrine\Deprecations\Deprecation; use IteratorAggregate; use PDO; use Traversable; use function array_shift; use function method_exists; class Result implements \IteratorAggregate, \MailPoetVendor\Doctrine\DBAL\ForwardCompatibility\DriverStatement, \MailPoetVendor\Doctrine\DBAL\ForwardCompatibility\DriverResultStatement { private $stmt; public static function ensure(\MailPoetVendor\Doctrine\DBAL\Driver\ResultStatement $stmt) : \MailPoetVendor\Doctrine\DBAL\ForwardCompatibility\Result { if ($stmt instanceof \MailPoetVendor\Doctrine\DBAL\ForwardCompatibility\Result) { return $stmt; } return new \MailPoetVendor\Doctrine\DBAL\ForwardCompatibility\Result($stmt); } public function __construct(\MailPoetVendor\Doctrine\DBAL\Driver\ResultStatement $stmt) { $this->stmt = $stmt; } public function getIterator() { return $this->stmt; } public function closeCursor() { return $this->stmt->closeCursor(); } public function columnCount() { return $this->stmt->columnCount(); } public function setFetchMode($fetchMode, $arg2 = null, $arg3 = null) { return $this->stmt->setFetchMode($fetchMode, $arg2, $arg3); } public function fetch($fetchMode = null, $cursorOrientation = \PDO::FETCH_ORI_NEXT, $cursorOffset = 0) { \MailPoetVendor\Doctrine\Deprecations\Deprecation::triggerIfCalledFromOutside('doctrine/dbal', 'https://github.com/doctrine/dbal/pull/4019', 'Result::fetch() is deprecated, use Result::fetchNumeric(), fetchAssociative() or fetchOne() instead.'); return $this->stmt->fetch($fetchMode, $cursorOrientation, $cursorOffset); } public function fetchAll($fetchMode = null, $fetchArgument = null, $ctorArgs = null) { \MailPoetVendor\Doctrine\Deprecations\Deprecation::triggerIfCalledFromOutside('doctrine/dbal', 'https://github.com/doctrine/dbal/pull/4019', 'Result::fetchAll() is deprecated, use Result::fetchAllNumeric(), fetchAllAssociative() or ' . 'fetchFirstColumn() instead.'); return $this->stmt->fetchAll($fetchMode, $fetchArgument, $ctorArgs); } public function fetchColumn($columnIndex = 0) { \MailPoetVendor\Doctrine\Deprecations\Deprecation::triggerIfCalledFromOutside('doctrine/dbal', 'https://github.com/doctrine/dbal/pull/4019', 'Result::fetchColumn() is deprecated, use Result::fetchOne() instead.'); return $this->stmt->fetchColumn($columnIndex); } public function fetchNumeric() { return $this->stmt->fetch(\PDO::FETCH_NUM); } public function fetchAssociative() { return $this->stmt->fetch(\PDO::FETCH_ASSOC); } public function fetchOne() { $row = $this->fetchNumeric(); if ($row === \false) { return \false; } return $row[0]; } public function fetchAllNumeric() : array { $rows = []; while (($row = $this->fetchNumeric()) !== \false) { $rows[] = $row; } return $rows; } public function fetchAllAssociative() : array { $rows = []; while (($row = $this->fetchAssociative()) !== \false) { $rows[] = $row; } return $rows; } public function fetchAllKeyValue() : array { $this->ensureHasKeyValue(); $data = []; foreach ($this->fetchAllNumeric() as [$key, $value]) { $data[$key] = $value; } return $data; } public function fetchAllAssociativeIndexed() : array { $data = []; foreach ($this->fetchAllAssociative() as $row) { $data[\array_shift($row)] = $row; } return $data; } public function fetchFirstColumn() : array { $rows = []; while (($row = $this->fetchOne()) !== \false) { $rows[] = $row; } return $rows; } public function iterateNumeric() : \Traversable { while (($row = $this->fetchNumeric()) !== \false) { (yield $row); } } public function iterateAssociative() : \Traversable { while (($row = $this->fetchAssociative()) !== \false) { (yield $row); } } public function iterateKeyValue() : \Traversable { $this->ensureHasKeyValue(); foreach ($this->iterateNumeric() as [$key, $value]) { (yield $key => $value); } } public function iterateAssociativeIndexed() : \Traversable { foreach ($this->iterateAssociative() as $row) { (yield \array_shift($row) => $row); } } public function iterateColumn() : \Traversable { while (($value = $this->fetchOne()) !== \false) { (yield $value); } } public function rowCount() { if (\method_exists($this->stmt, 'rowCount')) { return $this->stmt->rowCount(); } throw \MailPoetVendor\Doctrine\DBAL\Exception::notSupported('rowCount'); } public function free() : void { $this->closeCursor(); } private function ensureHasKeyValue() : void { $columnCount = $this->columnCount(); if ($columnCount < 2) { throw \MailPoetVendor\Doctrine\DBAL\Exception\NoKeyValue::fromColumnCount($columnCount); } } public function bindValue($param, $value, $type = \MailPoetVendor\Doctrine\DBAL\ParameterType::STRING) { \MailPoetVendor\Doctrine\Deprecations\Deprecation::triggerIfCalledFromOutside('doctrine/dbal', 'https://github.com/doctrine/dbal/pull/4019', 'Result::bindValue() is deprecated, no replacement.'); if ($this->stmt instanceof \MailPoetVendor\Doctrine\DBAL\Driver\Statement) { return $this->stmt->bindValue($param, $value, $type); } throw \MailPoetVendor\Doctrine\DBAL\Exception::notSupported('bindValue'); } public function bindParam($param, &$variable, $type = \MailPoetVendor\Doctrine\DBAL\ParameterType::STRING, $length = null) { \MailPoetVendor\Doctrine\Deprecations\Deprecation::triggerIfCalledFromOutside('doctrine/dbal', 'https://github.com/doctrine/dbal/pull/4019', 'Result::bindParam() is deprecated, no replacement.'); if ($this->stmt instanceof \MailPoetVendor\Doctrine\DBAL\Driver\Statement) { return $this->stmt->bindParam($param, $variable, $type, $length); } throw \MailPoetVendor\Doctrine\DBAL\Exception::notSupported('bindParam'); } public function errorCode() { \MailPoetVendor\Doctrine\Deprecations\Deprecation::triggerIfCalledFromOutside('doctrine/dbal', 'https://github.com/doctrine/dbal/pull/4019', 'Result::errorCode() is deprecated, the error information is available via exceptions.'); if ($this->stmt instanceof \MailPoetVendor\Doctrine\DBAL\Driver\Statement) { return $this->stmt->errorCode(); } throw \MailPoetVendor\Doctrine\DBAL\Exception::notSupported('errorCode'); } public function errorInfo() { \MailPoetVendor\Doctrine\Deprecations\Deprecation::triggerIfCalledFromOutside('doctrine/dbal', 'https://github.com/doctrine/dbal/pull/4019', 'Result::errorInfo() is deprecated, the error information is available via exceptions.'); if ($this->stmt instanceof \MailPoetVendor\Doctrine\DBAL\Driver\Statement) { return $this->stmt->errorInfo(); } throw \MailPoetVendor\Doctrine\DBAL\Exception::notSupported('errorInfo'); } public function execute($params = null) { \MailPoetVendor\Doctrine\Deprecations\Deprecation::triggerIfCalledFromOutside('doctrine/dbal', 'https://github.com/doctrine/dbal/pull/4019', 'Result::execute() is deprecated, no replacement.'); if ($this->stmt instanceof \MailPoetVendor\Doctrine\DBAL\Driver\Statement) { return $this->stmt->execute($params); } throw \MailPoetVendor\Doctrine\DBAL\Exception::notSupported('execute'); } } 