<?php

namespace App\Http\Controllers;

use App\Post;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class PageController extends Controller {


	public function getAbout(Request $request) {
		return view('page.about');
	}

	public function getContact() {
		return view('page.contact');
	}

	public function postContact(Request $request) {
		$this->validate($request, [
			'email' => 'required|email',
			'subject' => 'required|min:5|max:255',
			'message' => 'required|min:5'
		]);

		$data = [
			'email' => $request->get('email'),
			'subject' => $request->get('subject'),
			'body' => $request->get('message')
		];

		\Mail::send('emails.contact', $data, function($message) use ($data) {
			$message->from($data['email']);
			$message->to('hello@mailtrap.com');
			$message->subject($data['subject']);
		});

		return back()->with('success', 'Lời nhắn của bạn đã được gửi đi');
	}

}
