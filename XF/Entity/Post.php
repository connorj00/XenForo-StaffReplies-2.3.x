<?php

namespace CJ\StaffReplies\XF\Entity;

use XF\Mvc\Entity\Entity;
use XF\Mvc\Entity\Structure;

class Post extends XFCP_Post
{
    /**
     * Adds the 'staff_only' field to Post entity
     *
     * @param Structure $structure
     * @return Structure
     */
    public static function getStructure(Structure $structure)
    {
        $structure = parent::getStructure($structure);
        if (!in_array("staffonly", $structure->columns['message_state']['allowedValues'])) {
            $structure->columns['message_state']['allowedValues'][] = "staffonly";
        }
        return $structure;
    }

    /**
     * Permission check for viewing post
     */
    public function canView(&$error = null)
    {
        $origValue = parent::canView($error);

        // Remove staff-only posts from profile latest activity
        $visitor = \XF::visitor();
		$nodeId = $this->Thread->node_id;
        if ($origValue && $this->message_state == 'staffonly' && !$visitor->hasNodePermission($nodeId, 'staffReplies')) {
            return false;
        }

        return $origValue;
    }
    
    /**
    * Pre-save logic for the post
    */
    protected function _preSave()
    {
        parent::_preSave();

        // Set the post as staff-only if the user has permission
        $visitor = \XF::visitor();
		$nodeId = $this->Thread->node_id;
        $staffOnly = \XF::app()->request()->filter('staff_only', 'bool');
        if ($staffOnly && $visitor->hasNodePermission($nodeId, 'staffReplies')) {
            $this->message_state = 'staffonly';
        } 
    }
}
