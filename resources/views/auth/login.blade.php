@extends('layouts.app')

@section('content')

    <div class="prose mx-auto text-center">
        <h2>Log in</h2>
    </div>

    <div class="flex justify-center">
        <form method="POST" action="{{ route('login') }}" class="w-1/2">