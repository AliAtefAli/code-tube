<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChannelUpdateRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        $channel = auth()->user()->channels()->first();
        return [
            'name' => 'required|string|max:255',
            'slug' => "required|string|max:255|unique:channels,slug,$channel->id",
            'description' => "nullable|string|max:1000",
        ];
    }
}
