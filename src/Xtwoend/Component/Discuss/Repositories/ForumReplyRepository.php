<?php 

namespace Xtwoend\Component\Discuss\Repositories;

 /**
 * Forum Thread Repository
 *
 * 
 *     
 * @version    0.1
 * @author     Abdul Hafidz Anshari
 * @license    BSD License (3-clause) 
 */

use Xtwoend\Component\Repository\Eloquent\BaseRepository;

class ForumReplyRepository extends BaseRepository implements ForumReplyRepositoryInterface
{
	
	/**
     * Specify Model class name
     *
     * @return string
     */
    function model()
    {
        return \Xtwoend\Component\Discuss\Entities\ForumReply::class;
    }
}