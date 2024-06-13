<div class="container">
    @if (session('resent'))
        <div class="alert alert-success" role="alert">
            A fresh verification link has been sent to your email address.
        </div>
    @endif

    <div class="alert alert-warning" role="alert">
        Before proceeding, please check your email for a verification link.
        If you did not receive the email,
        <form class="d-inline" method="POST" action="{{ route('verification.send') }}">
            @csrf
            <button type="submit" class="btn btn-link p-0 m-0 align-baseline">click here to request another</button>.
        </form>
    </div>
</div>