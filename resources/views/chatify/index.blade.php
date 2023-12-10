<!-- resources/views/chatify/index.blade.php -->

@extends('layouts.app')  <!-- Adjust the layout as needed -->

@section('content')
    <div id="app">
        <chatify-component
            :user="{{ json_encode($user) }}"
            :chat="{{ json_encode($chat) }}"
        ></chatify-component>
    </div>
@endsection
