<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function messages(){
        $title = 'Messages';
        ///$messages = Message::where('sender_id', Auth::guard('company')->user()->id)->all();
        return view('company.messages.index', compact('title'));
    }

    public function DisplayMsgForm($id)
    {
        $title = 'Message Applicant';
        $application = Application::findOrFail($id);
        //dd($application->id);
        return view('company.messages.new', compact('title', 'application'));
    }

    public function SendMsg(Request $request){
        $validated =   $request->validate([
         'subject' =>'required',
         'message' =>'required',
         'parent_message_id' => 'nullable',
        ]);

        $message = new Message();
        $message->subject = $request->subject;
        $message->message = $request->message;
        $message->sender_id = Auth::guard('company')->user()->id;
        $message->receiver_id = $request->receiver_id;
        $message->job_id = $request->job_id;
        $message->save();

        return redirect()->route('company_messages')->with('success', 'Message Sent');
    }
}
