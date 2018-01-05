<?php namespace Anomaly\WhitelistModeratorExtension\Command;

use Anomaly\WhitelistModeratorExtension\Moderator\WhitelistModerator;

/**
 * Class ModerateInput
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class ModerateInput
{

    /**
     * The comment input.
     *
     * @var array $input
     */
    protected $input;

    /**
     * Create a new ModerateInput instance.
     *
     * @param array $input
     */
    public function __construct(array $input)
    {
        $this->input = $input;
    }

    /**
     * Handle the command.
     *
     * @param WhitelistModerator $moderator
     */
    public function handle(WhitelistModerator $moderator)
    {
        return $moderator->isTrusted($this->input);
    }
}
