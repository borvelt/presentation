<?php

namespace App\Http\Controllers;

use App\Http\Requests\Topics as TopicsRequest;
use App\Topic;

class TopicsController extends Controller
{

    public $topic;

    public function __construct(Topic $topic)
    {
        $this->topic = $topic;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $topics = $this->topic::all();
        return view('topics.index', ['topics' => $topics]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('topics.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\Topics  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TopicsRequest $request)
    {
        $newTopic = $request->validated();
        $topic = new $this->topic($newTopic);
        try {
            $topic->save();
            return redirect()->route('topics.index')
                ->with('success', 'Topic Created Successfully!');
        } catch (Exception $e) {
            report($e);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $topic = $this->topic->findOrFail($id);
        return view('topics.show', compact('topic'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $topic = $this->topic->findOrFail($id);
        return view('topics.edit', compact('topic'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\Topics  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TopicsRequest $request, $id)
    {
        $topic = $this->topic->findOrFail($id);
        $topic->fill($request->validated());
        try {
            $topic->save();
            return redirect()->route('topics.edit', ['id' => $topic->id])
                ->with('success', 'Topic Edited Successfully!');
        } catch (Exception $e) {
            report($e);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $topic = $this->topic->findOrFail($id);
        try {
            $topic->forceDelete();
            return redirect()->route('topics.index')
                ->with('success', 'Topic Deleted Successfully!');
        } catch (Exception $e) {
            report($e);
        }
    }
}
