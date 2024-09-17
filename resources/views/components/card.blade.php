<div class="col-xxl-4 col-md-6">
    <div class="card info-card {{ $type }}-card">

        @if(!is_null($filter) && $filter)
            <div class="filter">
                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                        <h6>Filter</h6>
                    </li>
                    @foreach($filterOptions as $optionKey => $option)
                        <li>
                            <a class="dropdown-item" href="{{ request()->fullUrlWithQuery(['period' => $optionKey]) }}">
                                {{ $option }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="card-body">
            <h5 class="card-title">{{ $title }} <span>| {{ $period }}</span></h5>

            <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="{{ $icon }}"></i>
                </div>
                <div class="ps-3">
                    <h6>{{ $value }}</h6>
                    <span class="{{ $changeType == 'increase' ? 'text-success' : 'text-danger' }} small pt-1 fw-bold">{{ $changePercent }}%</span>
                    <span class="text-muted small pt-2 ps-1">{{ $changeType }}</span>
                </div>
            </div>
        </div>

    </div>
</div>
