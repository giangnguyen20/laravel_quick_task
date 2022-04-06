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
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger">{{ __($error) }}</div>
                @endforeach
            @endif
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="content table-responsive table-full-width">
                            <table class="table table-hover table-striped">
                                <thead>
                                    <th>{{__('Full Name') }}</th>
                                    <th>{{__('User Name') }}</th>
                                    <th>{{__('Email') }}</th>
                                    <th>{{__('Office') }}</th>
                                    <th>{{__('Role') }}</th>
                                    <th>Edit</th>
                                </thead>
                                <tbody>
                                    <td>{{ $user->fullname }}</td>
                                    <td>{{ $user->username }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        @foreach($office as $key => $item)
                                            {{ $item->content }}
                                        @endforeach
                                    </td>
                                    <td>
                                        @if ($user->isAdmin)
                                            {{ __('Admin') }}
                                        @else
                                            {{ __('User') }}
                                        @endif
                                    </td>
                                    <td>
                                        <form action="{{ route('users.edit', $user->id) }}">
                                            <input type="submit" class="btn btn-info" name="Edit" value="Edit">
                                        </form>
                                    </td>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
    </div>
@endsection
