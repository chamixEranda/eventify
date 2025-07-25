<?php
namespace App\Models;

use CodeIgniter\Model;

class EventModel extends Model
{
    protected $table = 'events';
    
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'title',
        'event_date',
        'venue',
        'ticket_price',
        'capacity',
        'category',
    ];
    protected $returnType    = 'array';

    protected $useSoftDeletes = false;
}
