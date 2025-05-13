@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @auth
                        @if(auth()->user()->role === 'admin')
                            <div class="alert alert-success">
                                <h4>Welcome Administrator!</h4>
                                <p>You have full system access</p>
                                <!-- Admin-specific content -->
                            </div>
                        @else
                            <div class="alert alert-info">
                                <h4>Welcome Manager!</h4>
                                <p>You have limited administrative access</p>
                                <!-- Manager-specific content -->
                            </div>
                        @endif
                    @endauth
                    
                    <div class="mt-4">
                        <a href="{{ route('logout') }}" class="btn btn-danger"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                        
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection