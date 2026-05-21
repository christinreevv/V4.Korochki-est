<?php

namespace App\Http\Controllers;

class ApplicationController extends Controller {

public function index () {
    $applications = Application::where('user_id', session('user')->id)->get();

    return view('applications.index', compact('applications'));
}

public function create () {
return view('applications.create');
}

public function store (Request $request) {

 $validation = $request->validate([
            'course_name' => ['required'],
            'payment_method' => ['required'],
            'start_date' => ['required'],
        ]);

        $user = User::create([
            'user_id' => session('user')->id,
            'course_name' => $validation['course_name'],
            'payment_method' => $validation['payment_method'],
            'start_date' => $validation['start_date'],
            'status' => $validation['status'],
        ]);

        return redirect('/applications');

}

public function review (Request $request, $id) {


$application = Application::find($id);

$application->review = $request->review;

$application->save();

return back();



}




}
