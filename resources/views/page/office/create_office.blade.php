@extends('page.home')

@section('content')
    <div class="main-panel" style="position: absolute; top: 0; left: 15%;">
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="{{!! route('lang', ['en']) }}">{{__('en')}}</a>
                        </li>
                        <li>
                            <a href="{{!! route('lang', ['vi']) }}">{{__('vi')}}</a>
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
                                <h3 style="color: black;">Thêm mới</h3>
                                <p>
                                    @if(empty($mess))
                                        echo $mess;
                                    @endif
                                </p>
                            </div>
                            <form action="{{ route('office.store') }}" method="POST">
                                @method('POST')
                                @csrf
                                <div class="col-span-6 sm:col-span-4">
                                    <label for="name">{{__('User_id: ') }}</label>
                                    <input id="name" type="number" class="mt-1 block w-full" name="user_id" autocomplete="first_name" required />
                                </div>
                                <br>
                                <div class="col-span-6 sm:col-span-4">
                                    <label for="name">{{__('Content: ') }}</label>
                                    <input id="name" type="text" class="mt-1 block w-full" name="content" autocomplete="last_name" required />
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
