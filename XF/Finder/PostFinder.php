<?php

namespace CJ\StaffReplies\XF\Finder;

use XF\Entity\Thread;

class PostFinder extends XFCP_PostFinder
{
    public function applyVisibilityChecksInThread(Thread $thread, $allowOwnPending = true)
    {
        $origValue = parent::applyVisibilityChecksInThread($thread, $allowOwnPending);

        // Staff users can see 'staffonly' posts
        $visitor = \XF::visitor();
		$nodeId = $thread->node_id;
        if ($visitor->hasNodePermission($nodeId, 'staffReplies')) {
            foreach ($origValue->conditions AS $k => $arg)
    		{
    		    if (str_contains($arg, "'visible'")) {
    		        $origValue->conditions[$k] = str_replace("'visible'", "'visible', 'staffonly'", $arg);
    		        break;
    		    }
    		}
        }

        return $origValue;
    }
}
