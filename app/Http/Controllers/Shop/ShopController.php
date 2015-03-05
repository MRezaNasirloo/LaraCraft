<?php namespace App\Http\Controllers\Shop;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\ShopRequest;
use App\Models\Shop;
use Illuminate\Auth\Guard;

class ShopController extends Controller {


    protected $auth;

    /**
     * Create a new ShopController instance
     * and set middleware
     */
    function __construct(Guard $auth)
    {
        $this->auth = $auth;

        $this->middleware('auth', ['only' => ['create','edit','update', 'store']]);
        $this->middleware('shop', ['only' => ['create','edit','update', 'store']]);
    }

    /**
     * Show a list of All shop
     * TODO: Add pagination
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $shops = Shop::latest()->get();
        return view('shop.index', compact('shops'));
    }

    /**
     * Show the form for create a user shop
     * @return \Illuminate\View\View
     */
    public function create()
    {
        //TODO: Adds steps for Creating shop
        return view('shop.create');
    }

    /**
     * Save the user's shop into database
     *
     * @param ShopRequest $request
     * @return mixed
     */
    public function store(ShopRequest $request)
    {
        $name = $request->get('name');
        $slug = str_replace(' ', '-', $name);
        $request['slug'] = $slug;
        return $shop = $this->auth->user()->shop()->create($request->all());
    }

    /**
     * Show the given slug shop
     */
    public function show(Shop $shop)
    {
//        dd($shop);
//        $shop = Shop::find(1);
        return view('shop.show', compact('shop'));
    }
}
