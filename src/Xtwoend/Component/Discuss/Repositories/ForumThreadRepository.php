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
use Xtwoend\Component\Repository\Exceptions\EntityNotFoundException;
use Xtwoend\Component\Discuss\Entities\ForumThread;

class ForumThreadRepository extends BaseRepository implements ForumThreadRepositoryInterface
{
	
	/**
     * Specify Model class name
     *
     * @return string
     */
    function model()
    {
        return ForumThread::class;
    }

    /**
     * [createThread description]
     * @param  array  $attributes [description]
     * @return [type]             [description]
     */
    public function createThread(array $attributes = [])
    {   
        $attributes['author_id'] = \Auth::id();
        $attributes['slug'] = str_slug($attributes['subject'], '-');
        return $this->model->create($attributes);
    }

    public function getBySlug($slug)
    {
        return $this->model->with('replies','author','acceptedSolution', 'mostRecentReply')->where('slug', $slug)->first();
    }

    public function requireBySlug($slug)
    {
        $model = $this->getBySlug($slug);

        if ( ! $model) {
            throw new EntityNotFoundException;
        }

        return $model;
    }

    public function getThreadRepliesPaginated(ForumThread $threads, $perPage = 20)
    {
        return $threads->replies()->paginate($perPage);
    }


    public function getThreadsPagging($request, $limit = 20, $columns = ['*'])
    {
        $filter = $request->get('tags', false);
        $model = ($filter)? $this->model->withAnyTag($filter): $this->model;
        $results = $model->paginate($limit, $columns); 
        return $results;
    }

}