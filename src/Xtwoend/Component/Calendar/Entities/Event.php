<?php 

namespace Xtwoend\Component\Calendar\Entities;

 /**
 * Event Model
 *
 * 
 *     
 * @version    0.1
 * @author     Abdul Hafidz Anshari
 * @license    BSD License (3-clause) 
 */

use Illuminate\Database\Eloquent\Model;
use Xtwoend\Component\Calendar\Events\Event as EventInterface;

class Event extends Model implements EventInterface
{   
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'events';
	
    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
	protected $dates = ['start', 'end'];

    /**
     * Fillable property.
     *
     * @var array
     */
    protected $fillable = ['title', 'user_id', 'all_day', 'start', 'end', 'url', 'description', 'background_color', 'border_color'];

    /**
     * Get the event's id number
     *
     * @return int
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Get the event's title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Is it an all day event?
     *
     * @return bool
     */
    public function isAllDay()
    {
        return (bool)$this->all_day;
    }

    /**
     * Get the start time
     *
     * @return DateTime
     */
    public function getStart()
    {
        return $this->start;
    }

    /**
     * Get the end time
     *
     * @return DateTime
     */
    public function getEnd()
    {
        return $this->end;
    }

    /**
     * Get Url Event
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * get borderColor
     * @return [type] [description]
     */
    public function backgroundColor()
    {
        return $this->background_color;
    }

    /**
     * Get borderColor
     * @return [type] [description]
     */
    public function borderColor()
    {
        return $this->border_color;
    }
}