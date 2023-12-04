<?php

namespace App\Http\Controllers;

use view;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;

class FullCalenderController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $user_id = auth()->user()->id;

            $userEvents = Event::where('user_id', $user_id)
                ->whereDate('start', '>=', $request->start)
                ->whereDate('end', '<=', $request->end)
                ->get(['id', 'title', 'start', 'end']);

            $worker_id = auth()->user()->id; // Replace with the actual worker_id you want to retrieve
            $workerEvents = Event::where('worker_id', $worker_id)
                ->whereDate('start', '>=', $request->start)
                ->whereDate('end', '<=', $request->end)
                ->get(['id', 'title', 'start', 'end']);

            $employer_id = auth()->user()->id; // Replace with the actual employer_id you want to retrieve
            $employerEvents = Event::where('employer_id', $employer_id)
                ->whereDate('start', '>=', $request->start)
                ->whereDate('end', '<=', $request->end)
                ->get(['id', 'title', 'start', 'end']);

            $data = $userEvents->union($workerEvents)->union($employerEvents);

            return response()->json($data);
        }

        return view('fullcalender');
    }




    /**
     * Write code on Method
     *
     * @return response()
     */
    public function ajax(Request $request): JsonResponse
    {

        $user_id = auth()->user()->id;

        switch ($request->type) {
            case 'add':
                $event = Event::create([
                    'title' => $request->title,
                    'start' => $request->start,
                    'end' => $request->end,
                    'user_id' => $user_id,
                ]);

                return response()->json($event);
                break;

            case 'update':
                $event = Event::find($request->id)->update([
                    'title' => $request->title,
                    'start' => $request->start,
                    'end' => $request->end,
                ]);

                return response()->json($event);
                break;

            case 'delete':
                $event = Event::find($request->id)->delete();

                return response()->json($event);
                break;

            default:
                # code...
                break;
        }
    }
}
