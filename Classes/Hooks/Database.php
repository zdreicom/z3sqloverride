<?php
declare(strict_types=1);
namespace Z3\Z3sqloverride\Hooks;

/**
 * Class Database
 *
 */
class Database
{
    public function loadAdditionalDatabaseFiles(array $sqlstring): array
    {
        // Find all ext_tables.sql of loaded extensions
        foreach ((array)$GLOBALS['TYPO3_LOADED_EXT'] as $extensionConfiguration) {
            if (!is_array($extensionConfiguration) && !$extensionConfiguration instanceof \ArrayAccess) {
                continue;
            }
            if (isset($extensionConfiguration['ext_tables.sql'])) {
                $additionalExtTablesFile = substr($extensionConfiguration['ext_tables.sql'], 0, -4) . '_override.sql';
                if (file_exists($additionalExtTablesFile)) {
                    $sqlstring[] = file_get_contents($additionalExtTablesFile);
                }
            }
        }
        return [$sqlstring];
    }
}
