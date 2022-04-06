@extends('page.home')

@section('content')
<div class="main-panel">
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
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="content table-responsive table-full-width">
                        <table class="table table-hover table-striped">
                            <thead>
                                <th>STT</th>
                                <th>{{__('First Name')}}</th>
                                <th>{{__('Last Name')}}</th>
                                <th>{{__('User Name')}}</th>
                                <th>{{__('Email')}}</th>
                                <th>{{__('Detail') }}</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </thead>
                            <tbody>
                                @foreach($users as $key => $user)
                                    <tr>
                                        <td>{{ ($users->currentpage() - 1) * $users->perpage() + $key + 1 }}</td>
                                        <td>{{ $user->first_name }}</td>
                                        <td>{{ $user->last_name }}</td>
                                        <td>{{ $user->username }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>
                                            <a href="{{ route('users.show', $user->id) }}" class="btn btn-info"><i class="fa fa-list" aria-hidden="true"></i> {{__('Detail')}}</a>
                                        </td>
                                        <td><a href="{{ route('users.edit', $user->id) }}" class="btn btn-info">{{__('Edit') }}</a></td>
                                        <td>
                                            <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" id="btn-delete" onclick="return confirm('Are you sure?');" class="btn btn-danger"> <i class="fa fa-remove" aria-hidden="true"></i> {{__('Delete')}}</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
