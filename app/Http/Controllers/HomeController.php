<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {


        if($request->date){
            $filterDate = $request->date;
        }else{
            $filterDate = date('Y-m-d');
        }

        $carbonDate = Carbon::createFromDate($filterDate);
        $data['task'] = Task::whereDate('due_date', $filterDate)->get();
        $data['date_as_string'] = $carbonDate->translatedFormat('d \d\e M');
        $data['prev_date_btn'] = 'date='.$carbonDate->addDay(-1)->format('Y-m-d');
        $data['next_date_btn'] = 'date='.$carbonDate->addDay(2)->format('Y-m-d');

        $client['user'] = Auth::user();

        return view('home', $client)->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
