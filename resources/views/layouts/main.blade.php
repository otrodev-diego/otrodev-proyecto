@extends('layouts.base')

@section('main')
    <div class="flex grow">
        @include('layouts.sidebar')
        <div class="kt-wrapper flex grow flex-col">
            @include('layouts.header')
            <main class="grow pt-5" id="content" role="content">
                <div class="kt-container-fixed" id="contentContainer">
                    @if (session('success') && !session('skip_component'))
                        <x-alert type="success" :title="session('success')" id="alert_success" />
                    @endif
                </div>
                @yield('content')
            </main>
            @include('layouts.footer')
        </div>
    </div>
@endsection
