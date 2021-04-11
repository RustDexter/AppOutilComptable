<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Mail\Message;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = Contact::all()->sortDesc();
        return response(view('contacts', compact('contacts')));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $contacts = Contact::all()->sortDesc();

        return response(view('contact', compact('contacts')));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Contact::create($request->all());
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function sendMail(Request $request)
    {
        $content = $request->get('message');
        $user = Auth::user();


        $files = [];
        foreach ($request->file('files') as $file) {
            $files[] = $file->storePublicly('mail-files', 'public');
        }

        Mail::send('reply-email', compact('content'), function (Message $message) use ($files, $user, $request) {
            $message->to($request->get('toEmail'), $user->name)
                ->subject($request->get('subject'));
            foreach ($files as $key => $file) {
                $fileRequest = $request->file('files')[$key];
                if ($fileRequest instanceof UploadedFile) {
                    $message->attach(asset('storage/' . $file), ['as' => basename(asset('storage/' . $file)), 'mime' => $fileRequest->getClientMimeType()]);
                }

            }
            $message->from(env('MAIL_USERNAME'), env('APP_NAME'));
        });
        return redirect()->back();
    }


    public function sendMailImage(Request $request)
    {
        return asset('storage/' . $request->file('image')->storePublicly('mailImages', 'public'));
    }
}
