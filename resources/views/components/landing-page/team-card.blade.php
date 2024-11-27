<!-- Card 1 -->
<div class="bg-white rounded-xl shadow-lg p-6 max-w-xs transform transition-transform duration-300 hover:-translate-y-2 text-center">
    <img src="{{ $image }}" alt="{{ $name }}" class="rounded-full w-28 h-28 mx-auto object-cover mt-4">
    <h3 class="text-xl font-semibold text-gray-900 mt-4">{{ $name }}</h3>
    <p class="text-base text-gray-600">{{ $role }}</p>
    <p class="text-sm text-gray-500 mt-4">{{ $description }}</p>
    
    @if (!empty($socials))
        <div class="flex justify-center gap-4 mt-4">
            @foreach ($socials as $platform => $link)
                @if ($platform === 'instagram')
                    <a href="{{ $link }}" target="_blank" class="text-gray-600 hover:text-pink-500 text-xl">
                        <i class="fab fa-instagram"></i>
                    </a>
                @elseif ($platform === 'facebook')
                    <a href="{{ $link }}" target="_blank" class="text-gray-600 hover:text-blue-600 text-xl">
                        <i class="fab fa-facebook"></i>
                    </a>
                @elseif ($platform === 'linkedin')
                    <a href="{{ $link }}" target="_blank" class="text-gray-600 hover:text-blue-700 text-xl">
                        <i class="fab fa-linkedin"></i>
                    </a>
                @elseif ($platform === 'twitter')
                    <a href="{{ $link }}" target="_blank" class="text-gray-600 hover:text-blue-400 text-xl">
                        <i class="fab fa-twitter"></i>
                    </a>
                @endif
            @endforeach
        </div>
    @endif
</div>