<?php
namespace App\Models;

use CodeIgniter\Model;


/**
 * BookingModel
 *
 * Handles CRUD operations for the bookings table
 */
class BookingModel extends Model
{
    /**
     * Table name
     * @var string
     */
    protected $table = "bookings";

    /**
     * Primary key
     * @var string
     */
    protected $primaryKey = "id";

    /**
     * Allowed fields for mass assignment
     * @var array
     */
    protected $allowedFields = [
        'customer_name',
        'email',
        'event_id',
        'ticket_count',
        'created_at',
    ];

    /**
     * Use timestamps for created_at
     * @var bool
     */
    protected $useTimestamps = true;

    /**
     * Field for created timestamp
     * @var string
     */
    protected $createdField  = 'created_at';

    /**
     * Return type for results
     * @var string
     */
    protected $returnType = "array";
}