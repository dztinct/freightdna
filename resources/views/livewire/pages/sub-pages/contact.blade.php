<?php

use Livewire\Attributes\Layout;
use Livewire\Volt\Component;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;


new #[Layout('layouts.app-new')] class extends Component
{
    public string $first_name = '';
    public string $last_name = '';
    public string $email = '';
    public string $message = '';

    public function submit()
    {
        $validated = $this->validate([
            'first_name' => 'required|string|max:255',
            'last_name'  => 'required|string|max:255',
            'email'      => 'required|email|max:255',
            'message'    => 'required|string|min:5',
        ]);

        try{
            $mail_data = [
                'recipient' => 'support@coldflamestechnologies.com',
                'fromName'   => $this->first_name . ' ' . $this->last_name,
                'fromEmail' => $this->email,
                'body' => $this->message
        ];

        Mail::send('email.contact-template', $mail_data, function ($message) use ($mail_data) {
            $message->to($mail_data['recipient'])
                    ->from('support@coldflamestechnologies.com', 'Freight DNA') // ✅ use your authenticated email
                    ->replyTo($mail_data['fromEmail'], $mail_data['fromName']); // ✅ user’s email for replies
        });

        session()->flash('success', 'Your message has been sent successfully.');

        $this->reset(['first_name', 'last_name', 'email', 'message']);

        return redirect()->back()->with('success', 'Message sent successfully.');
        }catch(\Exception $e){
            Log::error('Email sending failed with exception.', [
            'error' => $e->getMessage(),
            'data'  => $mail_data ?? []
        ]);

        return redirect()->back()->with('error', 'An error occurred while sending the message.');
        }
    }
};
?>

<div>
    <div class="site-section bg-light" id="contact-section">
        <div class="container">

        @if(session('success'))
            <div class="p-4 bg-success text-black rounded">
                {{ session('success') }}
            </div>
        @endif
        @if(session('error'))
            <div class="p-4 bg-danger text-black rounded">
                {{ session('error') }}
            </div>
        @endif

            <div class="row">
                <div class="col-12 text-center mb-5">
                    <div class="block-heading-1">
                        <h2>Contact Us</h2>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center">

                <div class="col-lg-8 mb-5">

                    @if (session('success'))
                        <div class="alert alert-success text-center mb-4">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form wire:submit.prevent="submit">

                        <div class="form-group row">
                            <div class="col-md-6 mb-4 mb-lg-0">
                                <input type="text"
                                    class="form-control"
                                    placeholder="First name"
                                    wire:model="first_name">
                                @error('first_name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <input type="text"
                                    class="form-control"
                                    placeholder="Last name"
                                    wire:model="last_name">
                                @error('last_name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <input type="email"
                                    class="form-control"
                                    placeholder="Email address"
                                    wire:model="email">
                                @error('email')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <textarea class="form-control"
                                    placeholder="Write your message."
                                    wire:model="message"
                                    cols="30" rows="10"></textarea>
                                @error('message')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 mr-auto">
                                {{-- <button type="submit"
                                    class="btn btn-block btn-primary text-white py-3 px-5">
                                    Send Message
                                </button> --}}

                                <button type="submit"
                                class="px-6 py-2 bg-blue-600 text-white"
                                wire:loading.attr="disabled">
                                <svg wire:loading wire:target="submit"
                                    class="animate-spin h-5 w-5 text-white"
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 24 24">
                                   <circle class="opacity-25" cx="12" cy="12" r="10"
                                           stroke="currentColor" stroke-width="4"></circle>
                                   <path class="opacity-75" fill="currentColor"
                                         d="M4 12a8 8 0 018-8v4a4 4 0 00-4 4H4z">
                                   </path>
                                </svg>
                                <span wire:loading.remove wire:target="submit">Send Message</span>
                            </button>
                            
                            </div>
                        </div>

                    </form>

                </div>

            </div>
        </div>
    </div>
</div>
