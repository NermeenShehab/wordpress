<?php
 namespace MailPoetVendor\Doctrine\DBAL\Types; if (!defined('ABSPATH')) exit; use MailPoetVendor\Doctrine\DBAL\ParameterType; use MailPoetVendor\Doctrine\DBAL\Platforms\AbstractPlatform; class IntegerType extends \MailPoetVendor\Doctrine\DBAL\Types\Type implements \MailPoetVendor\Doctrine\DBAL\Types\PhpIntegerMappingType { public function getName() { return \MailPoetVendor\Doctrine\DBAL\Types\Types::INTEGER; } public function getSQLDeclaration(array $column, \MailPoetVendor\Doctrine\DBAL\Platforms\AbstractPlatform $platform) { return $platform->getIntegerTypeDeclarationSQL($column); } public function convertToPHPValue($value, \MailPoetVendor\Doctrine\DBAL\Platforms\AbstractPlatform $platform) { return $value === null ? null : (int) $value; } public function getBindingType() { return \MailPoetVendor\Doctrine\DBAL\ParameterType::INTEGER; } } 