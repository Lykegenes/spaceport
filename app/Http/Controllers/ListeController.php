<?php

namespace Spaceport\Http\Controllers;

use Illuminate\Http\Request;
use Kris\LaravelFormBuilder\FormBuilder;
use Spaceport\Models\Column;
use Spaceport\Models\Liste;
use Spaceport\Repositories\ListRepository;

class ListeController extends Controller
{
    /**
     * @var FormBuilder
     */
    protected $formBuilder;

    /**
     * @var ListRepository
     */
    protected $lists;

    public function __construct(ListRepository $lists, FormBuilder $formBuilder)
    {
        $this->lists = $lists;
        $this->formBuilder = $formBuilder;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
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
    public function create()
    {
        $form = $this->formBuilder->create('Spaceport\Forms\ListeForm', [
            'method' => 'POST',
            'url' => action('ListeController@store'),
        ]);

        return view('liste.create', compact('form'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:listes|between:3,80',
        ]);

        $list = $this->listRepository->create(
            ['name' => $request->name]
        );

        return redirect()->action('ListeController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $columns = Column::all();

        $form = $this->formBuilder->create('Spaceport\Forms\ListeForm', [
            'model' => Liste::findOrFail($id),
        ]);

        $form->disableFields();

        return view('liste.show', compact('id', 'form', 'columns'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $form = $this->formBuilder->create('Spaceport\Forms\ListeForm', [
            'model' => Liste::findOrFail($id),
        ]);

        return view('liste.edit', compact('id', 'form'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $liste = Liste::findOrFail($id);

        $liste->update($request->all());

        return redirect()->action('ListeController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $liste = Liste::findOrFail($id);

        $liste->delete();

        return redirect()->action('ListeController@index');
    }
}
