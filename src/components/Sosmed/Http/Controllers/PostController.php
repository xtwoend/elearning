<?php namespace Elearning\Sosmed\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Elearning\Core\Routing\Controller;
use Elearning\Sosmed\Repositories\PostRepository;

class PostController extends Controller {
	
	/**
	 * [$posts description]
	 * @var mixed
	 */
	protected $posts;

	/**
	 * [$return description]
	 * @var mixed
	 */
	public $return = [
			'status' => false,
			'code'	 => 500,
			'message' => 'Error request',
			'data'	=> null
	];

	/**
	 * __contruct().
	 *
	 * @return null
	 */
	public function __construct(PostRepository $posts)
	{
		$this->posts = $posts;
		$this->user = Auth::user();
	}

	public function index()
	{
		return view('sosmed::index');
	}

	/**
	 * posts status ajax.
	 *
	 * @return
	 */
	public function status()
	{
		$response = $this->posts->getStatus($this->user, 5);
		return $response->toJson();
	}
	
	/**
	 * store.
	 *
	 * @return
	 */
	public function store(Request $request)
	{	
		$response = $this->posts->create($request->all());
		$this->return['status'] = true;
		$this->return['message'] = 'Post success!';
		$this->return['code'] = 200;
		$this->return['data'] = $response->toArray();

		return response()->json($this->return);
	}
}