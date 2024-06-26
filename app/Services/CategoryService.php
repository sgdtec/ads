<?php

namespace App\Services;

use App\Entities\Category;
use App\Models\CategoryModel;
use CodeIgniter\Config\Factories;

class CategoryService
{
    private $categoryModel;

    public function __construct()
    {
        $this->categoryModel = Factories::model(CategoryModel::class);
    }

    public function getAllCategories(): array
    {
        $categories = $this->categoryModel->asObject()->orderBy('id', 'DESC')->findAll();

        $data = [];

        foreach ($categories as $category) {

            $btnEdit = form_button(
                [
                    'data-id' => $category->id,
                    'id'      => 'updateCategoryBtn',
                    'class'   => 'btn btn-primary btn-sm'
                ],

                '<i class="fa-regular fa-pen-to-square me-2"></i>Editar'
            );

            $btnArchive = form_button(
                [
                    'data-id' => $category->id,
                    'id'      => 'archiveCategoryBtn',
                    'class'   => 'btn btn-info btn-sm'
                ],

                '<i class="fa-solid fa-recycle me-2"></i>Arquivar'
            );

            $data[] = [
                'id'      => $category->id,
                'name'    => $category->name,
                'slug'    => $category->slug,
                'actions' => $btnEdit . ' ' . $btnArchive
            ];
        }

        return $data;
    }

    // Get the category according to the ID
    public function getCategory(int $id, bool $withDeleted = false)
    {
        $category = $this->categoryModel->withDeleted($withDeleted)->find($id);

        if (is_null($category)) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Category not found');
        }

        return $category;
    }

    public function getMultiNivel(string $name, $options = [])
    {

        $array = $this->categoryModel->asArray()->orderBy('id', 'DESC')->findAll();

        $class_form = "";
        if (isset($options['class'])) {
            $class_form = $options['class'];
        }

        $selected = [];


        if (isset($options['selected'])) {
            $selected = is_array($options['selected']) ? $options['selected'] : [$options['selected']];
        }

        if (isset($options['placeholder'])) {
            $placeholder = [
                'id' => '',
                'name' => $options['placeholder'],
                'parent_id' => 0
            ];
            $array[] = $placeholder;
        }

        $multiple = '';
        if (isset($options['multiple'])) {
            $multiple = 'multiple';
        }

        $select = '<select class="' . $class_form . '" name="' . $name . '" ' . $multiple . '>';
        $select .= $this->getMultiLevelOptions($array, 0, [], $selected);
        $select .= '</select>';

        return $select;
    }

    public function getMultiLevelOptions(array $array, $parent_id = 0, $parents = [], $selected = [])
    {
        static $i = 0;
        if ($parent_id == 0) {
            foreach ($array as $element) {
                if (($element['parent_id'] != 0) && !in_array($element['parent_id'], $parents)) {
                    $parents[] = $element['parent_id'];
                }
            }
        }

        $menu_html = '';
        foreach ($array as $element) {
            $selected_item = '';
            if ($element['parent_id'] == $parent_id) {
                if (in_array($element['id'], $selected)) {
                    $selected_item = 'selected';
                }
                $menu_html .= '<option value="' . $element['id'] . '" ' . $selected_item . '>';
                for ($j = 0; $j < $i; $j++) {
                    $menu_html .= '&mdash; ';
                }
                $menu_html .= $element['name'] . '</option>';
                if (in_array($element['id'], $parents)) {
                    $i++;
                    $menu_html .= $this->getMultilevelOptions($array, $element['id'], $parents, $selected);
                }
            }
        }

        $i--;
        return $menu_html;
    }

    public function trySaveCategory(Category $category, bool $protect = true)
    {
        try {
            if($category->hasChanged()) {
                $this->categoryModel->protect($protect)->save($category);
            }
        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }

    
}
