<?php

namespace Brainsugar\Repositories;

use Brainsugar\Model\Reservations;
use Brainsugar\Model\Room;

class RoomRepository
{
    /**
     * Instance of Room Model.
     *
     * @var Room
     */
    protected $room;

    /**
     * Instance of Reservation Model.
     *
     * @var [type]
     */
    protected $reservations;

    /**
     * All the active room types.
     *
     * @var int[]
     */
    protected $roomTypes;

    /**
     * All the room units.
     *
     * @var object
     */
    protected $roomUnits;

    public function __construct()
    {
        $this->room = new Room();
        $this->reservations = new Reservations();
        $this->roomTypes = $this->room->getRoomTypes();
        $this->roomUnits = $this->room->orderBy('order')->get();
    }

    /**
     * Get all room Types.
     *
     * @return object
     */
    public function getRoomTypes()
    {
        return $this->roomTypes;
    }

    /**
     * Soft delete all room units of a room type.
     *
     * @return bool
     */
    public function trashRoomType(int $roomType)
    {
        $response = $this->room->where('room_type', $roomType)->delete();

        return $response;
    }

    /**
     * Delete all room units of a room type.
     *
     * @return bool
     */
    public function deleteRoomType(int $roomType)
    {
        $response = $this->room->where('room_type', $roomType)->forceDelete();

        return $response;
    }

    /**
     * Restore soft deleted room units of a room type.
     *
     * @return bool
     */
    public function restoreRoomType(int $roomType)
    {
        $response = $this->room->where('room_type', $roomType)->restore();

        return $response;
    }

    /**
     * Get all room units.
     *
     * @return object
     */
    public function getRoomUnits()
    {
        return $this->roomUnits;
    }

    /**
     * Create a room unit.
     *
     * @return bool
     */
    public function createRoomUnit(int $roomType, string $roomName)
    {
        // Find existing Room IDs
        $existingRoomIds = $this->room->where('room_type', $roomType)->orderBy('order')->pluck('id')->toArray();

        // Save attributes to the room model.
        $this->room->room_name = $roomName;
        $this->room->room_type = $roomType;
        $this->room->order = count($existingRoomIds) + 1;

        $response = $this->room->save();

        return $response;
    }

    /**
     * Update a room units name.
     *
     * @return bool
     */
    public function updateRoomUnit(int $roomUnit, string $roomName)
    {
        $response = $this->room->where('id', $roomUnit)->update(['room_name' => $roomName]);

        return $response;
    }

    /**
     * Update the order of the room units.
     *
     * @return bool
     */
    public function updateRoomOrder(array $roomSequence)
    {
        // Array to contain room order.
        $order = [];

        for ($i = 1; $i <= count($roomSequence); ++$i) {
            array_push($order, $i);
        }

        // Combine order and the sequence
        $updatedSequence = array_combine($roomSequence, $order);

        foreach ($updatedSequence as $key => $value) {
            $response = $this->room->where('id', $key)->update(['order' => $value]);
        }

        return $response;
    }

    /**
     * Delete a room unit.
     *
     * @return bool
     */
    public function deleteRoomUnit(int $roomUnitId)
    {
        $response = $this->room->where('id', $roomUnitId)->forceDelete();

        return $response;
    }

    /**
     * Get all rooms which are not reserved for the date range.
     *
     * @return int[]|bool
     */
    public function getAvailableRooms(string $checkIn, string $checkOut, int $adults, int $children = null)
    {
        // Get occupancy filtered room types from all available room types.
        $roomTypes = $this->_filterOccupancy($adults, $children);
        if (empty($roomTypes)) {
            return false;
        }

        // Get unavailable room units on selected dates.
        $reservedRooms = $this->reservations->where(function ($query) use ($checkIn , $checkOut) {
            // Check between the date range.
            $query->where('reservation_status', 'reserved')
                                            ->whereBetween('check_in', [$checkIn, $checkOut])
                                            ->orWhereBetween('check_out', [$checkIn, $checkOut]);
        })
                        // Filter out if Check out of the argument is same as Check in of reservation
                        ->where('check_in', '!=', $checkOut)
                        ->with(['reservationItems' => function ($query) {
                            $query->where('item_type', 'room_item');
                        }])
                        ->get()->pluck('reservationItems')
                        ->flatten()
                        ->pluck('item_id');

        // Get all the room units filtering out the reserved rooms.
        $availableRooms = $this->roomUnits->whereIn('room_type', $roomTypes)
                ->whereNotIn('id', $reservedRooms);

        // Format response
        $response = [];
        foreach ($roomTypes as $roomType) {
            $response[$roomType] = $availableRooms->where('room_type', $roomType)->pluck('id')->toArray();
        }

        return $response;
    }

    /**
     * Filter Occupancy.
     *
     * Check every room type's maximum number of adults and children
     * and filter with the given arguments
     *
     * @return int[]
     */
    private function _filterOccupancy(int $adults, int $children = null)
    {
        $roomTypes = $this->room->getRoomTypes('ids');

        // Loop through the rooms and filter occupancy
        foreach ($roomTypes as $key => $roomType) {
            $maximumOccupancy = get_post_meta($roomType, 'bshb_max_occupancy', true);
            $maxAdults = get_post_meta($roomType, 'bshb_max_adults', true);
            $maxChildren = get_post_meta($roomType, 'bshb_max_children', true);

            if ($adults + $children > $maximumOccupancy) {
                unset($roomTypes[$key]);
            } elseif ($adults > $maxAdults) {
                unset($roomTypes[$key]);
            } elseif ($children > $maxChildren) {
                unset($roomTypes[$key]);
            }
        }

        return $roomTypes;
    }
}
