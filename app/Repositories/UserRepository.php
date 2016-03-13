<?php

namespace Spaceport\Repositories;

use Spaceport\User;

class UserRepository
{
    /**
     * Get a single User by it's Id.
     *
     * @param  int $id The User Id
     * @return Spaceport\User     The User instance
     */
    public static function getById($id)
    {
        return User::findOrFail($id);
    }

    /**
     * Get all the User instances from the database.
     *
     * @return Illuminate\Support\Collection A Collection of User instances
     */
    public static function all()
    {
        return User::all();
    }

    /**
     * Create a new User instance with the given attributes.
     *
     * @param  array $data The attributes to update
     * @return Spaceport\User     The new User instance
     */
    public static function create(array $data)
    {
        $list = User::create([
            'title' => $data['title'],
        ]);

        return $list;
    }

    /**
     * Update the User matching the given Id.
     *
     * @param  int $id The User Id
     * @param  array $data The attributes to update
     * @return Spaceport\User     The User instance
     */
    public static function update($id, array $data)
    {
        $list = self::getById($id);

        $list->fill([
            'title' => $data['title'],
        ])->save();

        return $list;
    }

    /**
     * Delete the User matching the given Id.
     *
     * @param  int $id The User Id
     */
    public static function delete($id)
    {
        $list = self::getById($id);

        $list->columns()->delete();
        $list->delete();
    }
}
