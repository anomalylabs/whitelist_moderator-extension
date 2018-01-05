<?php namespace Anomaly\WhitelistModeratorExtension\Command;

use Anomaly\CommentsModule\Comment\Form\CommentFormBuilder;
use Anomaly\WhitelistModeratorExtension\Moderator\WhitelistModerator;

/**
 * Class ModerateForm
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class ModerateForm
{

    /**
     * The comment form builder.
     *
     * @var CommentFormBuilder $builder
     */
    protected $builder;

    /**
     * Create a new ModerateForm instance.
     *
     * @param CommentFormBuilder $builder
     */
    public function __construct(CommentFormBuilder $builder)
    {
        $this->builder = $builder;
    }

    /**
     * Handle the command.
     *
     * @param WhitelistModerator $moderator
     */
    public function handle(WhitelistModerator $moderator)
    {
        if ($this->builder->getFormEntryAttribute('approved') == true) {
            return;
        }

        if ($moderator->isTrusted($this->builder->getFormValues())) {
            $this->builder->setFormEntryAttribute('approved', true);
        }
    }
}
