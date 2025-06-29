<?php

namespace CJ\StaffReplies\XF\Service\Post;

class DeleterService extends \XF\Service\Post\DeleterService
{
    public function delete($type, $reason = '')
    {
        // Check if the post is marked as staff-only
        if ($this->post->message_state === 'staffonly' && $type == 'soft')
        {
            // Throw an exception to block the action
            throw new \XF\PrintableException(\XF::phrase('staff_only_posts_cannot_be_soft_deleted'));
        }

        // Proceed with the parent logic for other cases
        return parent::delete($type, $reason);
    }
}
