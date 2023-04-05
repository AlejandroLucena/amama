<?php

namespace App\Http\Requests;

use App\Models\Postcategory;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class PostcategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        switch ($this->method()) {
            case 'POST':
                return [
                    'title' => 'required|min:5',
                    'slug' => 'required|min:5|unique:postcategories',
                ];

            case 'PUT':
                return [
                    'title' => 'required|min:5',
                    'slug' => 'required|min:5|unique:postcategories,slug,'.$this->route('postcategory')->id,
                ];

            default:
                return [];
        }
    }

    protected function prepareForValidation()
    {
        $slug = $this->generateSlug();

        if ($this->method() == 'POST') {
            $this->merge([
                'postcategory_id' => $this->request->get('postcategory'),
                'slug' => $slug,
            ]);
        } elseif ($this->method() == 'PUT') {
            $postcategory = $this->request->get('postcategory');
            $this->merge([
                'postcategory_id' => $postcategory,
                'slug' => $slug,
            ]);
        }
    }

    public function generateSlug()
    {
        $slug = '';
        if ($this->request->get('postcategory')) {
            $postcategory = Postcategory::find($this->request->get('postcategory'));
            $slug = $postcategory->full_url().'/'.$slug;
        }

        if ($this->request->get('slug') == null) {
            $post_slug = Str::slug($this->request->get('title'));
        } else {
            $aux = explode('/', $this->request->get('slug'));
            $post_slug = array_pop($aux);
        }

        return $post_slug;
    }
}
