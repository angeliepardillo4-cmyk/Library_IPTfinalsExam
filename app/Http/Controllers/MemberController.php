<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class MemberController extends Controller
{
    public function index(): View
    {
        return view('members.index', ['members' => Member::withCount('borrowings')->orderBy('full_name')->get()]);
    }

    public function create(): View
    {
        return view('members.create');
    }

    public function store(Request $request): RedirectResponse
    {
        Member::create($request->validate($this->rules()));

        return to_route('members.index')->with('success', 'Member added successfully.');
    }

    public function show(Member $member): View
    {
        $member->load('borrowings.book.author', 'borrowings.book.category');

        return view('members.show', compact('member'));
    }

    public function edit(Member $member): View
    {
        return view('members.edit', compact('member'));
    }

    public function update(Request $request, Member $member): RedirectResponse
    {
        $member->update($request->validate($this->rules($member)));

        return to_route('members.index')->with('success', 'Member updated successfully.');
    }

    public function destroy(Member $member): RedirectResponse
    {
        if ($member->borrowings()->exists()) {
            return to_route('members.index')->with('error', 'This member has borrow records and cannot be deleted.');
        }

        $member->delete();

        return to_route('members.index')->with('success', 'Member deleted successfully.');
    }

    private function rules(?Member $member = null): array
    {
        return [
            'member_id_number' => ['required', 'string', 'max:255', Rule::unique('members', 'member_id_number')->ignore($member)],
            'full_name' => ['required', 'string', 'max:255'],
            'date_of_birth' => ['nullable', 'date', 'before_or_equal:today'],
            'gender' => ['nullable', Rule::in(['Female', 'Male', 'Other', 'Prefer not to say'])],
            'contact_number' => ['required', 'string', 'max:50'],
            'email' => ['nullable', 'email', 'max:255', Rule::unique('members', 'email')->ignore($member)],
            'address' => ['nullable', 'string', 'max:1000'],
            'joined_at' => ['required', 'date', 'before_or_equal:today'],
        ];
    }
}
