<?php 

namespace Xtwoend\Component\Calendar\Repositories;

/**
 * This interface Calendar repository
 */

interface EventRepositoryInterface 
{
	/**
     * [addEvent description]
     *
     * @return mixed
     */
    public function addEvent();

    /**
     * User Event Collection 
     * 
     * @param  Int $user_id
     * @return Collenction
     */
    public function findByUserId($user_id);
}