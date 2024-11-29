<div class="pagetitle mb-2.5">
  <h1 class="text-2xl font-semibold text-[#012970]">{{ $title }}</h1>
  <nav>
    <ol class="breadcrumb flex space-x-2">
      @foreach ($items as $item)
        @if ($loop->last)
          <li class="breadcrumb-item active text-gray-500">{{ $item['label'] }}</li>
        @else
          <li class="breadcrumb-item">
            <a href="{{ route($item['route']) }}" class="text-blue-500 hover:underline">
              {{ $item['label'] }}
            </a>
          </li>
        @endif
      @endforeach
    </ol>
  </nav>
</div>
