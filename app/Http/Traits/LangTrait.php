<?php
namespace App\Http\Traits;

trait LangTrait
{
    private function show_langs()
    {
        return $this->langModel::get();
    }

    private function get_lang_by_id($id)
    {
        return $this->langModel::find($id);
    }
}
