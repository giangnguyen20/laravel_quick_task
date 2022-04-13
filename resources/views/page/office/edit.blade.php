@extends('page.home')

@section('content')
    <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="{{ route('lang', ['lang' => 'en']) }}">{{ __('en') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('lang', ['lang' => 'vi']) }}">{{ __('vi') }}</a>
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
                                <h3 style="color: black;">{{ __('Edit') }}</h3>
                                @if ($errors->any())
                                    @foreach ($errors->all() as $error)
                                        <div class="alert alert-danger">{{ __($error) }}</div>
                                    @endforeach
                                @endif
                            </div>

                            <form action="{{ route('offices.update', $office->id) }}" method="POST">
                                @method('PUT')
                                @csrf
                                <div class="col-span-6 sm:col-span-4">
                                    <label for="name">{{ __('Role') }}</label>
                                    <input id="content" type="text" class="mt-1 block w-full" name="role" value="{{ $office->role }}" autocomplete="content" required />
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
@endsection

