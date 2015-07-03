<?php

namespace Xtwoend\Component\Quiz\Entities;

/**
 * 
 */

use Illuminate\Database\Eloquent\Model;

class QuestionOption extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'question_options';

    /**
     * [$timestamps description]
     * @var boolean
     */
    public $timestamps = false;

    /**
     * Fillable property.
     *
     * @var array
     */
    protected $fillable = ['question_id', 'option', 'point'];

    /**
     * [question description]
     * @return [type] [description]
     */
    public function question()
    {
        return $this->belongsTo(Question::class, 'question_id');
    }
}
