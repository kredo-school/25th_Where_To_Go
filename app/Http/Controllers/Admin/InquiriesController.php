<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Inquiry;
use App\Models\User;
use App\Models\Category;
use App\Models\Recommendation;
use Illuminate\Http\Request;

class InquiriesController extends Controller
{
    private $inquiry;
    private $user;
    private $category;
    private $recommendation;

    public function __construct(Inquiry $inquiry, User $user, Category $category, Recommendation $recommendation)
    {
        $this->inquiry = $inquiry;
        $this->user = $user;
        $this->category = $category;
        $this->recommendation = $recommendation;
    }

    public function index()
    {
        // $all_inquiries = $this->inquiry->with('user')->orderBy('created_at', 'desc')->paginate(10);
        $all_inquiries = $this->inquiry->with(['user' => function ($query) {
            $query->withTrashed();
        }])->orderBy('created_at', 'desc')->paginate(10);
        $categories = $this->category->all();
        $existingRecommendation = $this->recommendation->first();
        return view('admin.inquiries.inquiries-index')
            ->with('all_inquiries', $all_inquiries)
            ->with('categories', $categories)
            ->with('existingRecommendation', $existingRecommendation);
    }

    public function show($id)
    {
        $inquiry = $this->inquiry->with('user')->findOrFail($id);

        if ($inquiry && (!$inquiry->user || $inquiry->user->trashed())) {
            return redirect()->route('admin.inquiries.index')
                             ->with('error', 'This inquiry has no valid user or the user has been deleted.');
        }

        return view('admin.inquiries.inquiry_details')->with('inquiry', $inquiry);
    }

    public function changeVisibility($id)
    {
        $inquiry = $this->inquiry->findOrFail($id);
        $inquiry->visibility = $inquiry->visibility === 'Visible' ? 'Hidden' : 'Visible'; 
        $inquiry->save();

        return redirect()->route('admin.inquiries.index', $id);
    }

    public function changeStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|string|in:unprocessed,responded,resolved',
        ]);

        $inquiry = $this->inquiry->findOrFail($id);
        $inquiry->status = $request->status;
        $inquiry->save();

        return redirect()->route('admin.inquiries.index', $id);
    }
}
