<div class="splide">
    <div class="splide__track shadow-lg">
        <ul class="splide__list">
            <li class="splide__slide"><img src="/images/slide1.jpg"></li>
            <li class="splide__slide"><img src="/images/slide2.jpg"></li>
            <li class="splide__slide"><img src="/images/slide3.jpg"></li>
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
