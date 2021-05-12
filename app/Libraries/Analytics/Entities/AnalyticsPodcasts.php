<?php

/**
 * Class AnalyticsPodcasts
 * Entity for AnalyticsPodcasts
 * @copyright  2020 Podlibre
 * @license    https://www.gnu.org/licenses/agpl-3.0.en.html AGPL3
 * @link       https://castopod.org/
 */

namespace Analytics\Entities;

use CodeIgniter\Entity\Entity;

/**
 * @property int $podcast_id
 * @property Time $date
 * @property int $duration
 * @property int $bandwidth
 * @property int $unique_listeners
 * @property int $hits
 * @property Time $created_at
 * @property Time $updated_at
 */
class AnalyticsPodcasts extends Entity
{
    /**
     * @var string[]
     */
    protected $dates = ['date', 'created_at', 'updated_at'];

    /**
     * @var array<string, string>
     */
    protected $casts = [
        'podcast_id' => 'integer',
        'duration' => 'integer',
        'bandwidth' => 'integer',
        'unique_listeners' => 'integer',
        'hits' => 'integer',
    ];
}
