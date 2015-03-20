<?php namespace App\Http\Controllers;

use App\Http\Requests;

use App\Http\Requests\ProductRequest;
use App\Models\Product\Product;
use App\Models\Shop;
use App\Models\User;
use Illuminate\Auth\Guard;
use Illuminate\Http\Response;
use Session;

class ProductController extends Controller {


    /**
     * @var Guard
     */
    protected $auth;

    /**
     * @var Shop
     */
    protected $shop;

    /**
     * @var User
     */
    protected $user;

    /**
     * Constructs a ProductController instance
     *
     * @param Guard $auth
     * @param Session $session
     */
    function __construct(Guard $auth)
    {
        $this->middleware('shop.product',['only' => ['edit','update']]);
        $this->middleware('auth',        ['only' => ['create','edit','update', 'store']]);
        $this->middleware('shop.hasNot', ['only' => ['create','edit','update', 'store']]);

        $this->auth = $auth;
        $this->user = $auth->user();

        if ($this->user) {
            $this->shop = $auth->user()->shop()->first();
        }
    }


    /**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('product.create');
	}

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(ProductRequest $request)
    {
        $input = $request->all();
        $slug = str_slug($input['name']);
        $input['slug'] = $slug;

        $this->shop->addProduct(new Product($input));

        session()->flash('flash_message', 'Your Item has added.');

        return redirect('/shop/' . $this->shop->slug);

    }

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show(Product $product)
	{
		return view('product.show', compact('product'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit(Product $product)
	{
		return view('product.edit', compact('product'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(ProductRequest $request, Product $product)
	{
		$product->update($request->all());

        session()->flash('flash_message', 'Your Item has updated.');

        return redirect('product/' . $product->slug);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
