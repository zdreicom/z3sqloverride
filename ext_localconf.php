<?php
defined('TYPO3_MODE') || die('Access denied.');

$signalSlot = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Extbase\SignalSlot\Dispatcher::class);
$signalSlot->connect(
    \TYPO3\CMS\Install\Service\SqlExpectedSchemaService::class,
    'tablesDefinitionIsBeingBuilt',
    \Z3\Z3sqloverride\Hooks\Database::class,
    'loadAdditionalDatabaseFiles'
);
