<?php

namespace Spaceport\Forms;

use Kris\LaravelFormBuilder\Form;

class ColumnForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('name', 'text', [
                'rules' => 'required|unique:listes|between:3,80',
            ]);
    }
}
