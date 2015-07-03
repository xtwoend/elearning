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
    protected $fillable = ['name', 'description', 'visit_count'];

    /**
     * [questions description]
     * @return [type] [description]
     */
    public function questions()
    {
        return $this->hasMany(Question::class, 'quiz_id');
    }
}
