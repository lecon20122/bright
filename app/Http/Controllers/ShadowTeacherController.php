<?php

namespace App\Http\Controllers;
use App\Enums\DataBaseEnum;
use App\Models\Category;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Auth\RedirectsUsers;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;

use Illuminate\Http\Request;

class ShadowTeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('admin.modules.ShadowTeacher.index', [
            'shadowteachers' => User::shadowteacher()->paginate(15),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     *  @param Request $request
     * @return Application|RedirectResponse|Redirector
     */
    public function store(Request $request)
    {
        try {
            $data = $request->all();
            $data['type'] = DataBaseEnum::SHADOW_TEACHER;
            User::create($data);
            return redirect($this->redirectPath());
        } catch (Exception $exception) {
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function toggleApprovalForShadowTeacher(User $shadowteacher)

    {

        try {
            if ($shadowteacher->type == DataBaseEnum::SHADOW_TEACHER) {
                $shadowteacher->is_approved = !$shadowteacher->is_approved;
                $shadowteacher->save();
            }
            return Redirect()->back()->with('success', `shadowteacher $shadowteacher->name is approved successfully`);
        } catch (Exception $exception) {
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }
    public function toggleSponsorForshadowteacher(User $shadowteacher)
    {
        try {
            if ($shadowteacher->type == DataBaseEnum::SHADOW_TEACHER) {
                $shadowteacher->sponsor = !$shadowteacher->sponsor;
                $shadowteacher->save();
            }
            return Redirect()->back()->with('success', `Shadow_teacher $shadowteacher->name is approved successfully`);
        } catch (Exception $exception) {
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }

    public function shadowteacherRegistrationPage()
    {
        $shadowteacher = Category::with('children')->parent()->where('name', DataBaseEnum::SHADOW_TEACHER)->get();

        return view('auth.join-us', [
            'categories' => $shadowteacher,
        ]);
    }
    public function getShadowTeachersByCategory(Category $category)
    {
        return view('site.modules.doctors.index', [
            'CategoryUsers' => $category->users,
        ]);
    }
    public function attachShadowTeacherToCategory(Request $request, User $shadowteacher)
    {
        try {
            $category = Category::find($request->category_id);
            $shadowteacher->categories()->attach($category);
            return Redirect()->back()->with('success', `Shadow-teacher $shadowteacher->name is attached to $category->name successfully`);
        } catch (Exception $exception) {
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }
        public function attachShadowTeacherToCategoryView(User $shadowteacher)
        {
            return view('admin.modules.ShadowTeacher.edit', [
                'shadowteacher' => $shadowteacher,
                'categories' => Category::all(),
            ]);
        }
    }

