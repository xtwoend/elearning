<?php 

namespace Xtwoend\Component\Quiz\Repositories;

 /**
 * FileName
 *
 * 
 *     
 * @version    0.1
 * @author     Abdul Hafidz Anshari
 * @license    BSD License (3-clause) 
 */


class QuestionRepository extends BaseRepository implements QuestionRepositoryInterface
{
	/**
	 * [model description]
	 * @return [type] [description]
	 */
	public function model()
	{
		return \Xtwoend\Component\Quiz\Entities\Quiz::class;
	}
}