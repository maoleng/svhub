<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index()
    {
        return view('user.index');
    }

    public function profile()
    {
        return view('user.profile');
    }

    public function enrolledCourse()
    {
        $courses = Course::query()->with(['user', 'lectures', 'users'])->orderByDesc('created_at')->get();

        return view('user.enrolled_course', [
            'courses' => $courses->take(5),
        ]);
    }

    public function course(): View
    {

    }

}
