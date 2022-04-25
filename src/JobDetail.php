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
        $from =  request()->get('search_created_at_from');
        $to = request()->get('search_created_at_to');

        if ($from || $to) {
            app($modelClass)::whereBetween('created_at', [$from, $to])
                ->paginate(10);
        } else {
            $jobDetails = $modelClass::paginate(10);
        }

        return $jobDetails;
    }
}
