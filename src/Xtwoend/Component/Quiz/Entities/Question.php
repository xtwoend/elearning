<?php

namespace Xtwoend\Component\Quiz\Entities;

/**
 * 
 */

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'quizzes';

    /**
     * Fillable property.
     *
     * @var array
     */
    protected $fillable = ['number', 'question', 'quiz_id', 'type', 'time_limit', 'answer_count', 'level'];

    /**
     * [options description]
     * @return [type] [description]
     */
    public function options()
    {
        return $this->hasMany(QuestionOption::class, 'quiz_id');
    }
}
