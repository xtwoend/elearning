<?php 

namespace Xtwoend\Component\Quiz\Repositories;

 /**
 * Interface Repository
 *
 * 
 *     
 * @version    0.1
 * @author     Abdul Hafidz Anshari
 * @license    BSD License (3-clause) 
 */


interface QuizRepositoryInterface
{
	/**
	 * [getQuestions description]
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public function getQuestions($id);
}