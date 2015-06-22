<?php 

namespace Xtwoend\Component\Category\Repositories;

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

class TagRepository extends BaseRepository implements TagRepositoryInterface
{
	
	/**
     * Specify Model class name
     *
     * @return string
     */
    function model()
    {
        return \Xtwoend\Component\Category\Entities\Tag::class;
    }

    /**
     * [getTagsByIds description]
     * @param  array  $tags [description]
     * @return [type]       [description]
     */
    public function getTagsByIds(array $tags = [])
    {
        
    }
}