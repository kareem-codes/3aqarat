<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLeadRequest;
use App\Models\Lead;
use Illuminate\Http\Request;
use Inertia\Inertia;

class LeadController extends Controller
{
    public function store(StoreLeadRequest $request)
    {
        $validated = $request->validated();

        $lead = Lead::create($validated);

        return back()->with('success', 'تم إرسال رسالتك بنجاح. سنتواصل معك قريباً!');
    }
}
