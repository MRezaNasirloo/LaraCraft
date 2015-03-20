<?php namespace App\Http\Requests;

use App\Http\Requests\Request;
use App\Models\Shop;
use App\Models\User;
use Illuminate\Auth\Guard;

class ProductRequest extends Request {


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
		return [
            'name'          =>  'required|min:3',
            'description'   =>  'required|min:10'
            //TODO: Add more rules...
		];
	}

}
