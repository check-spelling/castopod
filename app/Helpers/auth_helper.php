<?php

/**
 * @copyright  2020 Podlibre
 * @license    https://www.gnu.org/licenses/agpl-3.0.en.html AGPL3
 * @link       https://castopod.org/
 */

use ActivityPub\Entities\Actor;
use App\Entities\User;
use CodeIgniter\Database\Exceptions\DataException;
use Config\Services;

if (!function_exists('user')) {
    /**
     * Returns the User instance for the current logged in user.
     */
    function user(): ?User
    {
        $authenticate = Services::authentication();
        $authenticate->check();
        return $authenticate->user();
    }
}

if (!function_exists('set_interact_as_actor')) {
    /**
     * Sets the actor id of which the user is acting as
     */
    function set_interact_as_actor($actorId): void
    {
        $authenticate = Services::authentication();
        $authenticate->check();

        $session = session();
        $session->set('interact_as_actor_id', $actorId);
    }
}

if (!function_exists('remove_interact_as_actor')) {
    /**
     * Removes the actor id of which the user is acting as
     */
    function remove_interact_as_actor(): void
    {
        $session = session();
        $session->remove('interact_as_actor_id');
    }
}

if (!function_exists('interact_as_actor_id')) {
    /**
     * Sets the podcast id of which the user is acting as
     */
    function interact_as_actor_id(): int
    {
        $authenticate = Services::authentication();
        $authenticate->check();

        $session = session();
        return $session->get('interact_as_actor_id');
    }
}

if (!function_exists('interact_as_actor')) {
    /**
     * Get the actor the user is currently interacting as
     *
     * @return Actor|false
     */
    function interact_as_actor()
    {
        $authenticate = Services::authentication();
        $authenticate->check();

        $session = session();
        if ($session->has('interact_as_actor_id')) {
            return model('ActorModel')->getActorById(
                $session->get('interact_as_actor_id'),
            );
        }

        return false;
    }
}

if (!function_exists('can_user_interact')) {
    /**
     * @throws DataException
     */
    function can_user_interact(): bool
    {
        return (bool) interact_as_actor();
    }
}
