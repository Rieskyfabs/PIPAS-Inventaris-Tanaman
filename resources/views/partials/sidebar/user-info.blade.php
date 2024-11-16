<div class="user-info" style="display: flex; align-items: center; gap: 10px;">
    <div class="avatar">
        <!-- Fetch the user's avatar from the specified path, or use a default image if none exists -->
        <img src="{{ Auth::user()->avatar ? asset('assets/img/' . Auth::user()->avatar) : Avatar::create(Auth::user()->username)->toBase64() }}" 
            alt="User Avatar" class="rounded-circle" width="50px">
    </div>
    <div class="user-details" style="max-width: 150px;">
        <!-- Display the logged-in user's username -->
        <h6 style="margin: 0; font-size: 16px;">{{ Auth::user()->username }}</h6>
        <!-- Display the user's email with styling for text overflow -->
        <span style="font-size: 14px; color: #888; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; display: block;">
            {{ Auth::user()->email }}
        </span>
    </div>
</div>