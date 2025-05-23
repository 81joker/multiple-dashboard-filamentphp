<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        switch (auth()->user()->role) {
            case 'instructor':
                // return redirect('/instructor');
                return redirect()->route('instructor.dashboard');
                break;
            
            case 'parent':
                return redirect()->route('parent.dashboard');
                break;
            
            case 'admin':
            //  return redirect('/admin');
                // return redirect()->route('filament.admin.pages.dashboard');
                return redirect()->route('admin.dashboard');
                break;
                        
            default:
                return redirect()->route('login');
                break;
        }
    }
}
