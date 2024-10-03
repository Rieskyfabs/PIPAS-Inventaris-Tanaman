<form action="#" method="POST" class="action-buttons">
    @if(isset($viewData))
        <a href="{{ $viewData }}" class="icon-button"><i class="bi bi-eye"></i></a>
    @endif
    @csrf
    @method($method ?? 'POST')

    {{-- Tombol hapus hanya muncul jika submit bernilai true --}}
    @if($submit)
        {{-- <button type="submit" class="icon-button" data-confirm-delete="true"><i class="bi bi-trash"></i></button> --}}
        <a href="{{ $deleteData }}" class="icon-button" data-confirm-delete="true"><i class="bi bi-trash"></i></a>
    @endif

    @if(isset($dropdown))
        <div class="dropdown">
            <button class="icon-button dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="bi bi-three-dots"></i>
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                @foreach($dropdown as $item)
                    <li><a class="dropdown-item" href="{{ $item['href'] }}">{{ $item['label'] }}</a></li>
                    @csrf
                    @method($method ?? 'POST')
                @endforeach
            </ul>
        </div>
    @endif
</form>
