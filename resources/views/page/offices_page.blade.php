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
                        <a href="{{ route('office.create') }}" class="btn btn-info">{{__('Create') }}</a>
                        <br>
                        <table class="table table-hover table-striped">
                            <thead>
                                <th>STT</th>
                                <th>{{__('Username') }}</th>
                                <th>{{__('Role') }}</th>
                                <th>{{__('Edit') }}</th>
                                <th>{{__('Delete') }}</th>
                            </thead>
                            <tbody>
                                @foreach($offices as $key => $office)
                                    <tr>
                                        <td>{{ ($offices->currentpage() - 1) * $offices->perpage() + $key + 1 }}</td>
                                        <td>{{ $office->username }}</td>
                                        <td>{{ $office->content }}</td>
                                        <td>
                                            <a href="{{ route('office.edit', $office->id) }}" class="btn btn-info"> {{__('Edit') }}</a>
                                        </td>
                                        <td>
                                            <form action="{{ route('office.destroy', $office->id) }}" method="POST">
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
