@extends('layout.app')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <h1>Profile</h1>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">USER INFORMASI</h3>
                        </div>
                        <div class="card-body">
                            <p><strong>Nama:</strong> {{ Auth::user()->name }}</p>
                            <p><strong>Email:</strong> {{ Auth::user()->email }}</p>
                            <p><strong>Bergabung:</strong> {{ Auth::user()->created_at->format('M. Y') }}</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">GANTI PASSWORD</h3>
                        </div>
                        <div class="card-body">
                            @if(session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif

                            @if($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <form method="POST" action="{{ route('changePassword') }}">
                                @csrf
                                <div class="form-group">
                                    <label for="current_password">Password Lama</label>
                                    <input type="password" name="current_password" class="form-control" id="current_password" required>
                                </div>
                                <div class="form-group">
                                    <label for="new_password">Password Baru</label>
                                    <input type="password" name="new_password" class="form-control" id="new_password" required>
                                </div>
                                <div class="form-group">
                                    <label for="new_password_confirmation">Konfirmasi password</label>
                                    <input type="password" name="new_password_confirmation" class="form-control" id="new_password_confirmation" required>
                                </div>
                                <button type="submit" class="btn btn-primary">Ubah password</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

