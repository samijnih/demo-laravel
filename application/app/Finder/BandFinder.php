<?php

namespace App\Finder;

use Illuminate\Database\Connection;
use Illuminate\Support\Collection;

final class BandFinder
{
    /**
     * @var Connection
     */
    private $db;

    /**
     * Constructor.
     *
     * @param  Connection $connection
     *
     * @return void
     */
    public function __construct(Connection $connection)
    {
        $this->db = $connection;
    }

    /**
     * Counts all bands.
     *
     * @return int
     */
    public function countAll() : int
    {
        return $this->db->table('band')->count();
    }

    /**
     * Finds all bands.
     *
     * @return Collection
     */
    public function getAll() : Collection
    {
        return $this->db->table('band')->get();
    }
}
