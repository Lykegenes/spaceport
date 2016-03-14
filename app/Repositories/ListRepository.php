<?php

namespace Spaceport\Repositories;

use Spaceport\Liste;

class ListRepository
{
    /**
     * Get a single Liste by it's Id.
     *
     * @param int $id The Liste Id
     *
     * @return Spaceport\Liste The Liste instance
     */
    public static function getById($id)
    {
        return Liste::findOrFail($id);
    }

    /**
     * Get all the Liste instances from the database.
     *
     * @return Illuminate\Support\Collection A Collection of Liste instances
     */
    public static function all()
    {
        return Liste::all();
    }

    /**
     * Create a new Liste instance with the given attributes.
     *
     * @param array $data The attributes to update
     *
     * @return Spaceport\Liste The new Liste instance
     */
    public static function create(array $data)
    {
        $list = Liste::create([
            'title' => $data['title'],
        ]);

        return $list;
    }

    /**
     * Update the Liste matching the given Id.
     *
     * @param int   $id   The Liste Id
     * @param array $data The attributes to update
     *
     * @return Spaceport\Liste The Liste instance
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
     * Delete the Liste matching the given Id.
     *
     * @param int $id The Liste Id
     */
    public static function delete($id)
    {
        $list = self::getById($id);

        $list->columns()->delete();
        $list->delete();
    }

    /**
     * Create a new Column in the Given Liste instance.
     *
     * @param Spaceport\Liste $list The Liste instance
     * @param array           $data The attributes to add to the new column
     *
     * @return Spaceport\Column The new Column instance
     */
    public static function addColumn(Liste $list, array $data)
    {
        $column = $list->columns()->create([
            'title' => $data['title'],
            'type' => $data['type'],
        ]);

        return $column;
    }
}
