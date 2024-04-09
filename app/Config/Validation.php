<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Validation\StrictRules\CreditCardRules;
use CodeIgniter\Validation\StrictRules\FileRules;
use CodeIgniter\Validation\StrictRules\FormatRules;
use CodeIgniter\Validation\StrictRules\Rules;

class Validation extends BaseConfig
{
    // --------------------------------------------------------------------
    // Setup
    // --------------------------------------------------------------------

    /**
     * Stores the classes that contain the
     * rules that are available.
     *
     * @var list<string>
     */
    public array $ruleSets = [
        Rules::class,
        FormatRules::class,
        FileRules::class,
        CreditCardRules::class,
    ];

    /**
     * Specifies the views that are used to display the
     * errors.
     *
     * @var array<string, string>
     */
    public array $templates = [
        'list'   => 'CodeIgniter\Validation\Views\list',
        'single' => 'CodeIgniter\Validation\Views\single',
    ];

    // --------------------------------------------------------------------
    // Rules of Categories
    // --------------------------------------------------------------------
    public $category = [
        'id' => 'permit_empty|is_natural_no_zero',
        'name' => 'trim|required|min_length[3]|max_length[90]|is_unique[categories.name,id,{id}]',
    ];

    public $category_errors = [
        'name' => [
            'required'   => 'O nome é obrigatórioo',
            'min_length' => 'Informe pelo menos 3 catactéres no tamanho.',
            'max_length' => 'Informe pelo menos 90 catactéres no tamanho.',
            'is_unique'  => 'Está categoria já existe.',
        ]        
    ];

    // --------------------------------------------------------------------
    // Rules of Categories
    // --------------------------------------------------------------------
}
