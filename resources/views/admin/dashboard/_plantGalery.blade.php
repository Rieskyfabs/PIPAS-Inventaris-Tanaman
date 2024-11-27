<div class="card">
    <div class="card-body">
        <h5 class="card-title">{{ __('Galeri Tanaman Terbaru') }}</h5>

        @if($recentPlants->isEmpty())
            <p>{{ __('Tidak ada data tersedia.') }}</p>
        @else
            <!-- Slides with captions -->
            <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    @foreach($recentPlants as $index => $plant)
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="{{ $index }}" class="{{ $index === 0 ? 'active' : '' }}" aria-current="{{ $index === 0 ? 'true' : 'false' }}" aria-label="Slide {{ $index + 1 }}"></button>
                    @endforeach
                </div>
                <div class="carousel-inner">
                    @foreach($recentPlants as $index => $plant)
                        <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                            <img src="{{ asset('storage/'    . $plant->image) }}" class="d-block w-100 img-max-height" alt="{{ $plant->plantAttribute->name }}">
                            <div class="overlay"></div> <!-- Overlay gelap -->
                            <div class="carousel-caption d-none d-md-block">
                                <h5>{{ $plant->plantAttribute->name }}</h5>
                                <p>{{ $plant->location->name ?? 'There Is No Location.' }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>

                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">{{__('Previous')}}</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">{{__('Next')}}</span>
                </button>
            </div><!-- End Slides with captions -->
        @endif

    </div>
</div>