<?php

namespace App\Http\Controllers;

use App\Models\Employee;

class EmployeeController extends Controller
{

    /**
     * @var string
     */
    protected string $exportPdfFilename = 'employee.pdf';

    /**
     * Show all employees.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('employees.index', ['employee' => Employee::all()]);
    }

    /**
     * Create PDF file.
     *
     * @return \Illuminate\Http\Response
     */
    public function createPDF()
    {
        view()->share('employee', $data = Employee::all());

        return \PDF::loadView('employees.index', $data)->download($this->exportPdfFilename);
    }
}
