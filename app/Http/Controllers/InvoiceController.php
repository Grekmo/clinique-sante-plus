<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Invoice;
use App\Models\Patient;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function index()
    {
        $invoices = Invoice::with(['patient','doctor'])->get();
        return view('invoices.index', compact('invoices'));
    }

    public function create()
    {
        $appointments = Appointment::with(['patient','doctor'])->get();
        return view('invoices.create', compact('appointments'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'appointment_id' => 'required|exists:appointments,id',
            'amount' => 'required|numeric',
            'status' => 'nullable|in:paid,unpaid',
        ]);

        $appointment = Appointment::with(['patient','doctor'])->findOrFail($request->appointment_id);

        $invoice = new Invoice();
        $invoice->patient_id = $appointment->patient_id;
        $invoice->doctor_id = $appointment->doctor_id;
        $invoice->amount = $request->amount;
        $invoice->status = $request->input('status', 'unpaid');
        // 'issued_at' defaults to current timestamp in the DB schema
        $invoice->save();

        return redirect()->route('invoices.index')->with('success', 'تمت إضافة الفاتورة بنجاح');
    }

    public function show(string $id)
    {
        $invoice = Invoice::with(['patient','doctor'])->findOrFail($id);
        return view('invoices.show', compact('invoice'));
    }

    public function edit(string $id)
    {
        $invoice = Invoice::findOrFail($id);
        $patients = Patient::all();
        $doctors = Doctor::all();
        return view('invoices.edit', compact('invoice', 'patients', 'doctors'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'amount' => 'required|numeric',
            'status' => 'required|in:paid,unpaid',
        ]);

        $invoice = Invoice::findOrFail($id);
        $invoice->amount = $request->amount;
        $invoice->status = $request->status;
        $invoice->save();

        return redirect()->route('invoices.index')->with('success', 'تم تعديل الفاتورة بنجاح');
    }

    public function destroy(string $id)
    {
        $invoice = Invoice::findOrFail($id);
        $invoice->delete();

        return redirect()->route('invoices.index')->with('success', 'تم حذف الفاتورة بنجاح');
    }
}
