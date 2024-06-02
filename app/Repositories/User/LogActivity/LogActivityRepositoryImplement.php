<?php

namespace App\Repositories\User\LogActivity;

use Spatie\Activitylog\Models\Activity;

class LogActivityRepositoryImplement implements LogActivityRepository
{
    private $activityLog;

    public function __construct(Activity $activityLog)
    {
        $this->activityLog = $activityLog;
    }

    /**
     *  Get All Activity Log
     * @return object
     */
    public function getAll()
    {
        return $this->activityLog::all()->last();
    }

    /**
     *  Get All with user Activity Log
     * @return object
     */
    public function getAllWithUser()
    {
        return $this->activityLog::join("users", "causer_id", "=", "users.id")->get(["activity_log.*", "users.username"]);
    }
}
