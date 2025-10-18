<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Patient;
use App\Models\Doctor;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function index()
    {
        $appointments = Appointment::with(['patient', 'doctor'])->get();
        return view('appointments.index', compact('appointments'));
    }

    public function create()
    {
        $patients = Patient::all();
        $doctors = Doctor::all();
        return view('appointments.create', compact('patients', 'doctors'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'doctor_id' => 'required|exists:doctors,id',
            'appointment_date' => 'required|date',
            'notes' => 'nullable|string',
        ]);

        // Convert HTML datetime-local (YYYY-MM-DDTHH:MM) to SQL datetime (YYYY-MM-DD HH:MM:SS)
        $dateTime = $request->appointment_date
            ? date('Y-m-d H:i:s', strtotime(str_replace('T', ' ', $request->appointment_date)))
            : null;

        $appointment = new Appointment();
        $appointment->patient_id = $request->patient_id;
        $appointment->doctor_id = $request->doctor_id;
        $appointment->date_time = $dateTime;
        $appointment->status = 'scheduled';
        $appointment->notes = $request->notes;
        $appointment->save();

        return redirect()->route('appointments.index')->with('success', 'تمت إضافة الموعد بنجاح');
    }

    public function show($id)
    {
        $appointment = Appointment::with(['patient', 'doctor'])->findOrFail($id);
        return view('appointments.show', compact('appointment'));
    }

    public function edit($id)
    {
        $appointment = Appointment::findOrFail($id);
        $patients = Patient::all();
        $doctors = Doctor::all();
        return view('appointments.edit', compact('appointment', 'patients', 'doctors'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'doctor_id' => 'required|exists:doctors,id',
            'appointment_date' => 'required|date',
            'notes' => 'nullable|string',
        ]);

        $appointment = Appointment::findOrFail($id);

        $dateTime = $request->appointment_date
            ? date('Y-m-d H:i:s', strtotime(str_replace('T', ' ', $request->appointment_date)))
            : null;

        $appointment->patient_id = $request->patient_id;
        $appointment->doctor_id = $request->doctor_id;
        $appointment->date_time = $dateTime;
        $appointment->status = $request->input('status', $appointment->status);
        $appointment->notes = $request->notes;
        $appointment->save();

        return redirect()->route('appointments.index')->with('success', 'تم تعديل الموعد بنجاح');
    }

    public function destroy($id)
    {
        $appointment = Appointment::findOrFail($id);
        $appointment->delete();

        return redirect()->route('appointments.index')->with('success', 'تم حذف الموعد بنجاح');
    }
}
