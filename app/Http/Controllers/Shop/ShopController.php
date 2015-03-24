<?php namespace App\Http\Controllers\Shop;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\ShopRequest;
use App\Models\Product\Product;
use App\Models\Shop;
use Illuminate\Auth\Guard;
use Illuminate\Http\Response;
use Illuminate\View\View;

class ShopController extends Controller
{


    /**
     * @var Guard
     */
    protected $auth;
    /**
     * @var Shop
     */
    private $shop;

    /**
     * Constructs a ShopController instance
     *
     * @param Guard $auth
     * @param Shop $shop
     */
    function __construct(Guard $auth, Shop $shop)
    {
        $this->auth = $auth;

        $this->middleware('owner',       ['only' => ['edit', 'update']]);
        $this->middleware('auth',        ['only' => ['create', 'edit', 'update', 'store']]);
        $this->middleware('shop',        ['only' => ['create', 'store']]);
        $this->shop = $shop;
    }

    /**
     * Show a list of All shops
     * TODO: Add Sort
     *
     * @return View
     */
    public function index()
    {
        $shops = $this->shop->paginate(10);

        return view('shop.index', compact('shops'));
    }

    /**
     * Show the form for create a user Shop
     *
     * TODO: Adds steps for Creating shop
     *
     * @return View
     */
    public function create()
    {
        return view('shop.create');
    }

    /**
     * Store the user's Shop
     *
     * @param ShopRequest $request
     * @return mixed
     */
    public function store(ShopRequest $request)
    {
        $name = $request->get('name');
        $slug = str_slug($name);//TODO: Use a package for slugs
        $request['slug'] = $slug;
        $this->auth->user()->shop()->create($request->all());
        return redirect('/shop/' . $slug);
    }

    /**
     * Show the given Shop
     *
     * @param Shop $shop
     * @return View
     */
    public function show(Shop $shop)
    {
        return view('shop.show', compact('shop'));
    }

    /**
     * Show the form for editing the specified Shop.
     *
     * @param Product $product
     * @return View
     */
    public function edit(Shop $shop)
    {
        return view('shop.edit', compact('shop'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(ShopRequest $request, Shop $shop)
    {
        $shop->update($request->all());

        session()->flash('flash_message', 'Your Shop has updated.');

        return redirect('shop/' . $shop->slug);
    }
}
