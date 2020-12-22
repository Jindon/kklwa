<div class="splide">
    <div class="shadow-lg splide__track">
        <ul class="splide__list">
            @foreach($sliders as $slide)
                <li class="splide__slide"><img src="{{ $slide->imageUrl }}"></li>
            @endforeach
        </ul>
    </div>
</div>

@push('scripts')
    <script>
        document.addEventListener( 'DOMContentLoaded', function () {
            new Splide( '.splide', {
                perPage: 2,
                type: 'loop',
                autoplay: true,
                rewind: true,
                speed: 400,
                cover: true,
                heightRatio: 0.3,
                breakpoints: {
                    600: {
                        perPage: 1,
                        heightRatio: 0.5,
                    }
                }
            }).mount();

        } );
    </script>
@endpush
