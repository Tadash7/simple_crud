<?php

namespace App\Http\Controllers\Web;

use Illuminate\Support\Facades\DB;

use App\Http\Controllers\Controller;
use App\Http\Requests\PackageForm;
use App\Models\Package;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Number;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $packages = DB::table('packages')
            ->paginate(20);

        return view('dashboard.packages.index', compact('packages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $package = new Package();
        $package->price = 0;
        return $this->edit($package);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PackageForm $request)
    {
        return $this->update($request, new Package());
    }

    /**
     * Display the specified resource.
     */
    public function show(Package $package)
    {
        return view('dashboard.packages.show', compact('package'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Package $package)
    {
        return view('dashboard.packages.form', compact('package'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PackageForm $request, Package $package)
    {
        $request->persist($package);
        return redirect(route('packages.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Package $package)
    {
        $package->destroy($package->id);
        return redirect(route('packages.index'));
    }
}
