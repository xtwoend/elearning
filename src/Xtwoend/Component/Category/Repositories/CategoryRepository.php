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

class CategoryRepository extends BaseRepository implements CategoryRepositoryInterface
{
	/**
     * Specify Model class name
     *
     * @return string
     */
    function model()
    {
        return \Xtwoend\Component\Category\Entities\Category::class;
    }
}