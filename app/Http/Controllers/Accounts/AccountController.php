<?php

namespace App\Http\Controllers\Accounts;

use App\Filters\ExamFilter;
use App\Http\Controllers\Controller;
use App\Models\Applicant;
use App\Models\ApplicantExam;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    //
    protected  $filter;
    public function __construct(
        ExamFilter $filter,
    ) {
        $this->filter = $filter;
    }

    public function index(Request $request)
    {
        $data = $request->all();
        $data['account_status'] = isset($data['account_status']) ? $data['account_status'] : false;
        $applicants = ApplicantExam::where('account_status', $data['account_status']);
        $this->filter->applyFilters($applicants, $data);
        $applicants = $applicants->paginate(50);
        return view('admin.pages.accounts.index', compact('applicants'));
    }

    public function approve($id)
    {
        ApplicantExam::where('id', $id)->update(['account_status' => true]);
        return redirect()->route('accounts.index')->with('success', 'Applicant approved successfully.');
    }
}
