<?php

namespace Modules\CourseSetting\Entities;

use App\LessonComplete;
use Illuminate\Support\Facades\Auth;
use Modules\Quiz\Entities\OnlineQuiz;
use Illuminate\Database\Eloquent\Model;
use Rennokki\QueryCache\Traits\QueryCacheable;
use Modules\Assignment\Entities\InfixAssignment;

class Lesson extends Model
{


    protected $fillable = [];

    public function chapter()
    {

        return $this->belongsTo(Chapter::class)->withDefault();
    }

    public function course()
    {

        return $this->belongsTo(Course::class)->withDefault();
    }

    public function quiz()
    {

        return $this->hasMany(OnlineQuiz::class, 'id', 'quiz_id');
    }
    public function assignment()
    {

        return $this->hasMany(InfixAssignment::class, 'id', 'assignment_id');
    }
    public function assignmentInfo()
    {
        
        return $this->hasOne(InfixAssignment::class, 'id', 'assignment_id');
    }

    public function completed()
    {
        $id = 0;
        if (Auth::check()) {
            $id = Auth::user()->id;
        }
        return $this->hasOne(LessonComplete::class, 'lesson_id', 'id')->where('user_id', $id);
    }
    public function lessonQuiz(){
        return $this->belongsTo(OnlineQuiz::class, 'quiz_id')->withDefault();

    }
}
