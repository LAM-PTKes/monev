@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ __('You are logged in!') }}

                        as
                        <b>
                            {{ auth()->user()->roles->first()->role_name ?? 'No Role' }}
                            {{-- {{ auth()->user()->id == 1 ? 'angka' : 'huruf' }} --}}
                        </b>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
