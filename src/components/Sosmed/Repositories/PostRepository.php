<?php  namespace Elearning\Sosmed\Repositories;

/**
 * Part of the package.
 *
 * NOTICE OF LICENSE
 *
 * Licensed under the 3-clause BSD License.
 *
 * This source file is subject to the 3-clause BSD License that is
 * bundled with this package in the LICENSE file.  It is also available at
 * the following URL: http://www.opensource.org/licenses/BSD-3-Clause
 *
 * @package    
 * @version    0.1
 * @author     Abdul Hafidz Anshari
 * @license    BSD License (3-clause)
 * @copyright  (c) 2014 
 */
 
use Prettus\Repository\Eloquent\BaseRepository;
use Illuminate\Database\Eloquent\Model;

class PostRepository extends BaseRepository implements PostRepositoryInterface
{
	/**
     * Specify Model class name
     *
     * @return string
     */
    function model()
    {
        return "Elearning\\Sosmed\\Entities\\Post";
    }

    /**
     * getStatus user.
     *
     * @param Model $user, $limit
     * @return mixed
     */
    public function getStatus(Model $user, $limit = 5)
    {
        
        $friend_ids = [];

        foreach ($user->friends as $friend) {
            $friend_ids[] = $friend->id;
        }
        $friend_ids[] = array_push($friend_ids, $user->id);

        $posts = $this->model->with('user','comments')
                ->whereIn( 'user_id', $friend_ids );
        
        //status post
        return $posts->latest()->take($limit)->get();
    }
}