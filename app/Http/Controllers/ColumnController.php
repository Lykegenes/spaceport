<?php

namespace Spaceport\Http\Controllers;

use Illuminate\Http\Request;
use Kris\LaravelFormBuilder\FormBuilder;
use Spaceport\Models\Column;
use Spaceport\Models\Liste;

class ColumnController extends Controller
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
    public function index($id)
    {
        $liste = Liste::with('columns')->findOrFail($id);
        $columns = $liste->columns();

        return view('column.index', [
            'columns' => $columns,
        ]);
    }

    public function create($list)
    {
        $form = $this->formBuilder->create('Spaceport\Forms\ColumnForm', [
            'method' => 'POST',
            'url' => action('ColumnController@store', ['list' => $list]),
        ]);

        return view('column.create', compact('list', 'form'));
    }

    public function store(Request $request)
    {
        dd($request->all());
        $liste = Column::create($request->all());

        return redirect()->action('ColumnController@index');
    }

    public function show($id)
    {
    }
}
