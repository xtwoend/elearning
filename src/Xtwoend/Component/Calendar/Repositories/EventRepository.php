<?php 

namespace Xtwoend\Component\Calendar\Repositories;

 /**
 * Event Repository
 *
 * Resource event table 
 *     
 * @version    0.1
 * @author     Abdul Hafidz Anshari
 * @license    BSD License (3-clause) 
 */

use Xtwoend\Component\Repository\Eloquent\BaseRepository;

class EventRepository extends BaseRepository implements EventRepositoryInterface
{
	/**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return \Xtwoend\Component\Calendar\Entities\Event::class;
    }

    /**
     * [addEvent description]
     *
     * @return mixed
     */
    public function addEvent()
    {
    	
    }

    /**
     * User Event Collection 
     * 
     * @param  Int $user_id
     * @return Collenction
     */
    public function findByUserId($user_id)
    {
        return $this->model->where('user_id', $user_id)->get();
    }
}