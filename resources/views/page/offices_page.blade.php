@extends('page.home')

@section('content')
<div class="main-panel" style="position: absolute; top: 0; left: 15%;">
    <nav class="navbar navbar-default navbar-fixed">
        <div class="container-fluid">
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="{{!! route('lang', ['en']) }}">Tiếng anh</a>
                    </li>
                    <li>
                        <a href="{{!! route('lang', ['vi']) }}">Tiếng việt</a>
                    </li>
                    <li>
                        <a href="#">
                            <p>giang@gmail.com</p>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('logout') }}">
                            <p>Log out</p>
                        </a>
                    </li>
                    <li class="separator hidden-lg hidden-md"></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="content table-responsive table-full-width">
                        <table class="table table-hover table-striped">
                            <thead>
                                <th>STT</th>
                                <th>ID</th>
                                <th>content</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>1</td>
                                    <td>intern PHP</td>
                                    <td><input type="submit" class="btn btn-success" value="Edit"></td>
                                    <td><input type="submit" class="btn btn-danger" value="Edit"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection