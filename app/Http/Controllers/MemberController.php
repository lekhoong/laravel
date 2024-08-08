<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;

class MemberController extends Controller
{
    public function create()
    {
        return view('member.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            
            'email' => 'required|email|unique:members,email',
            'age' => 'required|integer|min:18',
            'feedback' => 'required|max:30',
            'rate' => 'required|in:excellent,good,average,poor'
        ]);

        Member::create($request->all());

        return redirect()->back()->with('success', 'Feedback submitted successfully');
    }

    public function index()
    {
        $members = Member::paginate(2);
        return view('member.index', compact('members'));
    }
}
