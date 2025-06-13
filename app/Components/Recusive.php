<?php
namespace App\Components;



use App\Models\Category;

class Recusive
{
    private $data;
    private $htmlSelect = '';
    private $visited = []; // Thêm mảng này để kiểm tra vòng lặp

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function categoryRecusive($parent_id = 0)
    {
        foreach ($this->data as $value) {
            if ($value['parent_id'] == $parent_id) {
                // Kiểm tra nếu đã duyệt qua ID này thì bỏ qua để tránh lặp vô hạn
                if (in_array($value['id'], $this->visited)) {
                    continue;
                }
                $this->visited[] = $value['id'];
                $this->htmlSelect .= "<option value='{$value['id']}'>{$value['name']}</option>";
                $this->categoryRecusive($value['id']);
            }
        }
        return $this->htmlSelect;
    }
}