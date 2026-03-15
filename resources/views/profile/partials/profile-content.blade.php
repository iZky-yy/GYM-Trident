<div class="profile-container">
    <h3>{{ Auth::user()->name }}</h3>
    <p>{{ Auth::user()->email }}</p>
    @if(Auth::user()->qr_code)
    <img src="{{ asset('storage/'.Auth::user()->qr_code) }}" width="200">
@endif
</div>
