<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Xtwoend\Component\Calendar\Repositories\EventRepository;

class CalendarController extends Controller
{   
    /**
     * [$eventRepository description]
     * @var [type]
     */
    protected $eventRepository;
    
    /**
     * [__construct description]
     * @param EventRepository $eventRepository [description]
     */
    public function __construct(EventRepository $eventRepository)
    {
        $this->eventRepository = $eventRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {   

        $events = $this->eventRepository->findByUserId(1);

        $calendar = \Calendar::userEvents(1);
                    /*
                    ->setOptions([ //set fullcalendar options
                        'selectable' => true,
                        'selectHelper' => true,
                    ])->setCallbacks([ //set fullcalendar callback options (will not be JSON encoded)
                        'select' => 'function(start, end) {alert(start);}'
                    ]);
                    */ 

        return view('calendar.index', compact('calendar','events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {   $event = $request->all();
        $event['border_color'] = $event['background_color'];
        $event['user_id'] = \Auth::id();

        $this->eventRepository->create($event);
        return redirect('calendar');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
