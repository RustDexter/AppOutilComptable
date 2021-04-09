@extends('layouts.layout')
@section('content')
    <div id="app" class="flex justify-center">
        <div class="col-md-12">
            <section class="msger">
                <header class="msger-header">
                    <div class="msger-header-title">
                        <i class="fas fa-comment-alt"></i> messageries
                    </div>
                    <div class="msger-header-options">
                        <span><i class="fas fa-cog"></i></span>
                    </div>
                </header>
                <chat-messages :messages="messages"
                               :user="{{ \Illuminate\Support\Facades\Auth::user() }}"></chat-messages>
                <chat-form
                    v-on:messagesent="addMessage"
                    :user="{{ \Illuminate\Support\Facades\Auth::user() }}"
                ></chat-form>
            </section>
        </div>
    </div>
@endsection
