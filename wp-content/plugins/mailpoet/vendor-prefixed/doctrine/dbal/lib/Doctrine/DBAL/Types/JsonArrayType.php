<?php
 namespace MailPoetVendor\Doctrine\DBAL\Types; if (!defined('ABSPATH')) exit; use MailPoetVendor\Doctrine\DBAL\Platforms\AbstractPlatform; use function is_resource; use function json_decode; use function stream_get_contents; class JsonArrayType extends \MailPoetVendor\Doctrine\DBAL\Types\JsonType { public function convertToPHPValue($value, \MailPoetVendor\Doctrine\DBAL\Platforms\AbstractPlatform $platform) { if ($value === null || $value === '') { return []; } $value = \is_resource($value) ? \stream_get_contents($value) : $value; return \json_decode($value, \true); } public function getName() { return \MailPoetVendor\Doctrine\DBAL\Types\Types::JSON_ARRAY; } public function requiresSQLCommentHint(\MailPoetVendor\Doctrine\DBAL\Platforms\AbstractPlatform $platform) { return \true; } } 