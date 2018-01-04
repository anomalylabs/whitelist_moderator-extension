<?php namespace Anomaly\WhitelistModeratorExtension;

use Anomaly\CommentsModule\Comment\Moderation\ModeratorExtension;

/**
 * Class WhitelistModeratorExtension
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class WhitelistModeratorExtension extends ModeratorExtension
{

    /**
     * This extension provides a basic whitelist
     * moderator for the comments module.
     *
     * @var string
     */
    protected $provides = 'anomaly.module.comments::filter.whitelist';

}
