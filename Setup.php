<?php

namespace CJ\StaffReplies;

use XF\AddOn\AbstractSetup;
use XF\Db\Schema\Alter;

class Setup extends AbstractSetup
{
    /**
     * Install add-on: Adds 'staffonly' ENUM vlaue to message_state and applies global permission
     *
     * @param array $stepParams
     */
    public function install(array $stepParams = [])
    {
        // Add the 'staff_only' column to the 'xf_post' table
        $this->schemaManager()->alterTable('xf_post', function (Alter $table) {
            $enumString = $table->getColumnDefinition('message_state')["Type"];
            $cleanedString = str_replace(["enum(", "'", ")"], "", $enumString);
            $resultArray = explode(",", $cleanedString);
            if (!in_array("staffonly", $resultArray)) {
                $resultArray[] = "staffonly";
            }
            $table->changeColumn('message_state', 'enum')->values($resultArray)->setDefault($resultArray[0]);
        });
    }

    /**
     * Uninstall add-on: Removes 'staffonly' ENUM value and sets "staffonly posts" to a 'deleted' state
     *
     * @param array $stepParams
     */
    public function uninstall(array $stepParams = [])
    {
        // Update staffonly posts to deleted for redundancy
        $this->db()->query("UPDATE xf_post SET message_state = 'deleted' WHERE message_state = 'staffonly'");

        // Remove staffonly from ENUM values
        $this->schemaManager()->alterTable('xf_post', function (Alter $table) {
            $enumString = $table->getColumnDefinition('message_state')["Type"];
            $cleanedString = str_replace(["enum(", "'", ")"], "", $enumString);
            $resultArray = explode(",", $cleanedString);
            $resultArray = array_diff($resultArray, ["staffonly"]);
            $resultArray = array_values($resultArray);
            $table->changeColumn('message_state', 'enum')->values($resultArray)->setDefault($resultArray[0]);
        });
    }

    /**
     * Upgrade add-on: Handles changes for future versions
     *
     * @param array $stepParams
     * @param string|null $previousVersion
     */
    public function upgrade(array $stepParams = [], $previousVersion = null)
    {
        // Upgrade logic if needed in the future
    }
}
