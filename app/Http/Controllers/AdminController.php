<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Report;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $usersCount = User::count();
        $reportsCount = Report::count();
        $suspendedCount = User::where('suspended', true)->count();
        return view('admin.dashboard', compact('usersCount', 'reportsCount', 'suspendedCount'));
    }

    public function users()
    {
        $users = User::all();
        return view('admin.users', compact('users'));
    }

    public function suspend(User $user)
    {
        $user->suspended = !$user->suspended;
        $user->save();
        return back()->with('success', 'Statut de suspension modifié.');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return back()->with('success', 'Utilisateur supprimé.');
    }

    public function reports()
    {
        $reports = Report::with('user', 'match')->get();
        return view('admin.reports', compact('reports'));
    }

    public function resolveReport(Report $report)
    {
        $report->resolved = true;
        $report->save();
        return back()->with('success', 'Signalement résolu.');
    }
} 