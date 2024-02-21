<?php

namespace App\Http\Requests;

use App\Models\Package;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Log;

class PackageForm extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required',
            'description' => 'nullable|max:255',
            'price' => 'required|numeric',
            'thumbnail' => 'required|image|mimes:png,jpg,jpeg|max:2048',
        ];
    }

    public function persist(Package $package)
    {
        $package->name = $this->name;
        $package->price = $this->price;

        if (!empty($this->description))
            $package->description = $this->description;

        $fileName = time() . '.' . $this->thumbnail->extension();
        $this->thumbnail->storeAs('public/images/packages', $fileName);
        $package->thumbnail = $fileName;

        $package->save();
    }
}
