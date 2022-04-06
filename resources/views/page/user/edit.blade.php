@extends('page.home')

@section('content')
    <div class="main-panel" style="position: absolute; top: 0; left: 15%;">
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="{{ route('lang', [ 'lang' => 'en']) }}">EN</a>
                        </li>
                        <li>
                            <a href="{{ route('lang', [ 'lang' => 'vi']) }}">VI</a>
                        </li>
                        <li>
                            <form action="{{ route('logout') }}" method="post">
                                @csrf
                                <input type="submit" name="logout" value="logout">
                            </form>
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
                                <h3 style="color: black;">{{__('Edit') }}</h3>
                                @if ($errors->any())
                                    @foreach ($errors->all() as $error)
                                        <div class="alert alert-danger">{{ __($error) }}</div>
                                    @endforeach
                                @endif
                                <p>
                                    @if(empty($mess))
                                        {{__('$mess') }}
                                    @endif
                                </p>
                            </div>
                            <form action="{{ route('users.update', $user->id) }}" method="POST">
                                @method('POST')
                                @csrf
                                <div class="col-span-6 sm:col-span-4">
                                    <label for="name">{{ __('first_name: ') }}</label>
                                    <input id="name" type="text" class="mt-1 block w-full" name="first_name" value="{{ $user->first_name }}" autocomplete="first_name" required />
                                </div>
                                <br>
                                <div class="col-span-6 sm:col-span-4">
                                    <label for="name">{{ __('last_name: ') }}</label>
                                    <input id="name" type="text" class="mt-1 block w-full" name="last_name" value="{{ $user->last_name }}" autocomplete="last_name" required />
                                </div>
                                <br>
                                <div class="col-span-6 sm:col-span-4">
                                    <label for="name">{{ __('Username: ') }}</label>
                                    <input id="name" type="text" class="mt-1 block w-full" name="username" value="{{ $user->username }}" autocomplete="username" required />
                                </div>
                                <br>
                                <div class="col-span-6 sm:col-span-4">
                                    <label for="name">{{ __('Password: ') }}</label>
                                    <input id="name" type="password" class="mt-1 block w-full" name="password" autocomplete="password" minlength="6" required />
                                </div>
                                <br>
                                <div>
                                    <input type="submit" value="update"/>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection

