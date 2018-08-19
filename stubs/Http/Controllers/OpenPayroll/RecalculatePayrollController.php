<?php

namespace App\Http\Controllers\OpenPayroll;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RecalculatePayrollController extends Controller
{
    public function __invoke(Request $request, $id)
    {
        payroll($id)->calculate();

        swal()->success('Payroll', 'You have successfully recalculate all paylips.');

    	return redirect()->route('payroll.show', $id);
    }
}
