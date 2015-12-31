<?php

namespace Spaceport\Http\Controllers;

use Illuminate\Http\Request;
use Kris\LaravelFormBuilder\FormBuilder;
use Spaceport\Http\Controllers\Controller;
use Spaceport\Models\Liste;

class ListeController extends Controller
{
    protected $formBuilder;

    public function __construct(FormBuilder $formBuilder)
    {
        $this->formBuilder = $formBuilder;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex()
    {
        $listes = Liste::all();

        return view('liste.index', [
            'listes' => $listes,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getCreate()
    {
        $form = $this->formBuilder->create('Spaceport\Forms\ListeForm', [
            'method' => 'POST',
            'url' => action('ListeController@postStore'),
        ]);

        return view('liste.show', compact('form'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postStore(Request $request)
    {
        $liste = Liste::create($request->all());

        return redirect()->action('ListeController@getIndex');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getShow($id)
    {
        $form = $this->formBuilder->create('Spaceport\Forms\ListeForm', [
            'model' => Liste::findOrFail($id),
        ]);

        $form->disableFields();

        return view('liste.show', compact('form'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getEdit($id)
    {
        $form = $this->formBuilder->create('Spaceport\Forms\ListeForm', [
            'model' => Liste::findOrFail($id),
        ]);

        return view('liste.show', compact('form'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateUpdate(Request $request, $id)
    {
        $liste = Liste::findOrFail($id);

        $liste->update($request->all());

        return redirect()->action('ListeController@getIndex');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteDelete($id)
    {
        $liste = Liste::findOrFail($id);

        $liste->delete();

        return redirect()->action('ListeController@getIndex');
    }
}
