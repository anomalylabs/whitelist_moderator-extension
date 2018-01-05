<?php namespace Anomaly\WhitelistModeratorExtension;

use Anomaly\CommentsModule\Comment\Form\CommentFormBuilder;
use Anomaly\CommentsModule\Comment\Moderation\ModeratorExtension;
use Anomaly\WhitelistModeratorExtension\Command\ModerateForm;
use Anomaly\WhitelistModeratorExtension\Command\ModerateInput;

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

    /**
     * Check if the comment passes the moderator.
     *
     * @param array $input
     * @return bool
     */
    public function passes(array $input)
    {
        return $this->dispatch(new ModerateInput($input));
    }

    /**
     * Validate the comment form builder.
     *
     * @param CommentFormBuilder $builder
     */
    public function validate(CommentFormBuilder $builder)
    {
        $this->dispatch(new ModerateForm($builder));
    }
}
