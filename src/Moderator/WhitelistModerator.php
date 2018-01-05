<?php namespace Anomaly\WhitelistModeratorExtension\Moderator;

use Anomaly\CommentsModule\Comment\Contract\CommentRepositoryInterface;
use Anomaly\UsersModule\User\Contract\UserInterface;
use Illuminate\Contracts\Auth\Guard;

/**
 * Class WhitelistModerator
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class WhitelistModerator
{

    /**
     * The auth guard.
     *
     * @var Guard
     */
    protected $auth;

    /**
     * The comment repository.
     *
     * @var CommentRepositoryInterface
     */
    protected $comments;

    /**
     * Create a new WhitelistModerator instance.
     *
     * @param Guard                      $auth
     * @param CommentRepositoryInterface $comments
     */
    public function __construct(Guard $auth, CommentRepositoryInterface $comments)
    {
        $this->auth     = $auth;
        $this->comments = $comments;
    }

    /**
     * Check if the input can be trusted or not.
     *
     * @param $input
     * @return bool
     */
    public function isTrusted($input)
    {
        $email = array_get($input, 'email');

        /* @var UserInterface $user */
        if ($user = $this->auth->user()) {
            $email = $user->getEmail();
        }

        if (!$comment = $this->comments->findLastByEmail($email)) {
            return false;
        }

        return $comment->isApproved();
    }
}
