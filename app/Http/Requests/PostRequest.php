<?php

namespace App\Http\Requests;

use App\Models\Postcategory;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Str;

class PostRequest extends FormRequest
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
                    'slug' => 'unique:posts,slug',
                    'postcategory' => 'required',
                ];

            case 'PUT':
                return [
                    'title' => 'required|min:5',
                    'slug' => 'unique:posts,slug,'.$this->route('post')->id,
                    'postcategory' => 'required',
                ];

            default:
                return [];
        }
    }

    protected function prepareForValidation()
    {
        $slug = $this->request->get('slug');
        // $content = $this->request->get('content');
        // $content = preg_replace("/<([a-z][a-z0-9]*)[^>]*?(\/?)>/si",'<$1$2>', $this->request->get('content'));
        if ($this->method() == 'POST') {
            $slug = $this->generateSlug();
        } elseif ($this->method() == 'PUT') {
            $slug = $this->generateSlug();
        }
        $this->merge([
            'slug' => $slug,
            // 'content' => $content,
        ]);
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
