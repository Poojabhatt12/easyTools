<?php

namespace Stability\EasyTools;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobDetail extends Model
{

    use HasFactory;
    // protected $guarded =[];

    protected $fillable = ['job_id', 'job_name', 'city'];

    public function searchJobs()
    {
        $modelClass = config('easytools.model');
        $searchTerm = request()->get('search_job_name');
        $cityTerm = request()->get('search_city');

        if ($searchTerm || $cityTerm) {
            $jobDetails = $modelClass::where('job_name', 'LIKE', "%" . $searchTerm . "%")
                ->where('city', 'LIKE', "%" . $cityTerm . "%")
                ->paginate(10);
        } else {
            $jobDetails = $modelClass::paginate(10);
        }

        return $jobDetails;
    }
}
