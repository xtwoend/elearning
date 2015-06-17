<?php 

namespace Xtwoend\Component\Discuss\Repositories;


interface ForumThreadRepositoryInterface 
{
	/**
     * [createThread description]
     * @param  array  $attributes [description]
     * @return [type]             [description]
     */
    public function createThread(array $attributes = []);
}