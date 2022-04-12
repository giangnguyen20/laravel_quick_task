@extends('page.home')

@section('content')
    <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="{{ route('lang', ['lang' => 'en']) }}">EN</a>
                        </li>
                        <li>
                            <a href="{{ route('lang', ['lang' => 'vi']) }}">VI</a>
                        </li>
                        <li>
                            <a>
                                <form action="{{ route('logout') }}" method="post">
                                    @csrf
                                    <input type="submit" name="logout" value="{{ __('logout') }}">
                                </form>
                            </a>
                        </li>
                        <li class="separator hidden-lg hidden-md"></li>
                    </ul>
                </div>
            </div>
        </nav>

        <br>

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="content table-responsive table-full-width">
                            <div class="label">
                                <h3 style="color: black;">{{__('New') }}</h3>
                                @if ($errors->any())
                                    @foreach ($errors->all() as $error)
                                        <div class="alert alert-danger">{{ __($error) }}</div>
                                    @endforeach
                                @endif
                            </div>
                            <form action="{{ route('office.store') }}" method="POST">
                                @method('POST')
                                @csrf
                                <div class="col-span-6 sm:col-span-4">
                                    <div class="list-group">
                                        <label for="name">{{__('Username ') }}</label>
                                        <select id="user_list" name="user_id"  class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">

                                        </select>
                                        <br>
                                        search: <input id="username" type="text" class="mt-1 block w-full" name="username" autocomplete="off" required placeholder="search" />
                                    </div>
                                </div>
                                <br>
                                <div class="col-span-6 sm:col-span-4">
                                    <label for="name">{{ __('Role') }}: </label>
                                    <input id="name" type="text" class="mt-1 block w-full" name="role" autocomplete="off" required />
                                </div>
                                <br>
                                <div>
                                    <input type="submit" value="{{ __('update') }}"/>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <script type="text/javascript" src="{{ asset('bower_components/assets/js/search.js') }}"></script>
@endsection
