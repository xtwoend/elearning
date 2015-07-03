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

use Xtwoend\Component\Repository\Eloquent\BaseRepository;

class QuizRepository extends BaseRepository implements QuizRepositoryInterface
{
	/**
	 * model 
	 * 
	 * @return \Xtwoend\Component\Quiz\Entities\Quiz class
	 */
	public function model()
	{
		return \Xtwoend\Component\Quiz\Entities\Quiz::class;
	}

	/**
	 * [getQuestionOptionsById description]
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public function getQuestions($id)
	{
		return $this->model->with('questions')->find($id);
	}
}