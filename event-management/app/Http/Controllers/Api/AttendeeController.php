<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\AttendeeResource;
use App\Http\Traits\CanLoadRelationships;
use App\Models\Attendee;
use App\Models\Event;
use Illuminate\Http\Request;



class AttendeeController extends Controller
{

    use CanLoadRelationships;

    private array $relations = ['user'];

    public function __construct()
    {
        $this->middleware('auth:sanctum')->except(['index', 'show', 'update']);
    }

    public function index(Event $event){
        $attendees = $this -> loadRelationships($event->attendees()->latest());

        return AttendeeResource::collection(
            $attendees -> paginate()
        );
    }


    public function store (Request $request, Event $event){

        $attendee=$event ->attendees()->create([
            'user_id' => 1
        ]);



        return new AttendeeResource(      $this -> loadRelationships($attendee));

    }

    public function show ( Attendee $attendee){

        return new AttendeeResource($attendee);
    }

    public function destroy ( Event $event, Attendee $attendee){
        $attendee -> delete();

        $this->authorize('delete-attendee',[$event, $attendee]);
        return response()->json([
            'message' => 'Event deleted successfully'
        ]);
    }

}




