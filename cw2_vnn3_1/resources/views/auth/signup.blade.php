@extends('layout.app')

@section('content')
    <div>
        @extends('layout.partials.nav')
    </div>
    <main class="cotainer mt-5">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <h3 class="card-header text-center">Signup</h3>
                    <div class="card-body">
                        <form action="{{ route('user.registration') }}" method="POST">
                            @csrf
                            <div class="form-group mb-3">
                                <input type="email" name="user_id" placeholder="User ID - Email" id="user_id" class="form-control">
                                @if ($errors->has('user_id'))
                                    <span class="text-danger">{{ $errors->first('user_id') }}</span>
                                @endif
                            </div>

                            <div class="form-group mb-2">
                                <input type="text" name="name" placeholder="Name" id="name" class="form-control">
                                @if ($errors->has('name'))
                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                            <div class="form-group mb-2">
                                <input type="date" name="dob" placeholder="Date Of Birth" id="dob" class="form-control">
                                @if ($errors->has('dob'))
                                    <span class="text-danger">{{ $errors->first('dob') }}</span>
                                @endif
                            </div>
                            <div class="form-group mb-2">
                                <input type="text" name="ni_number" placeholder="Shang-Hi National Insurance Number" id="ni_number" class="form-control">
                                @if ($errors->has('ni_number'))
                                    <span class="text-danger">{{ $errors->first('ni_number') }}</span>
                                @endif
                            </div>
                            <div class="form-group mb-2">
                                <input type="text" name="address" placeholder="address" id="address" class="form-control">
                                @if ($errors->has('address'))
                                    <span class="text-danger">{{ $errors->first('address') }}</span>
                                @endif
                            </div>

                            <div class="form-group mb-2">
                                <input type="password" name="password" placeholder="Password" id="password" class="form-control">
                                @if ($errors->has('password'))
                                    <span class="text-danger">{{ $errors->first('password') }}</span>
                                @endif
                            </div>

                            <div class="form-group mb-2">
                                <div class="checkbox">
                                    <label><input type="checkbox" name="remember">Remember</label>
                                </div>
                            </div>

                            <div class="d-grid mx-auto">
                                <button type="submit" class="btn btn-primary btn-block">Register</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
