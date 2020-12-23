
<div id="scrollTop" class="hidden">
    <div onclick="scrollToTop()"
        class="fixed bottom-0 right-0 flex items-center justify-center w-12 h-12 mb-4 mr-4 text-green-100 transition duration-300 ease-in-out bg-green-600 rounded-full shadow cursor-pointer hover:bg-green-700 opacity-60"
    >
        <x-heroicon-o-chevron-up class="w-10 h-10"/>
    </div>
</div>

@push('scripts')
    <script>
        let scrollPos = 300;
        const scrollTopButton = document.querySelector('#scrollTop');

        function checkPosition() {
            let windowY = window.scrollY;
            if (windowY > scrollPos) {
                // Scrolling UP
                scrollTopButton.classList.add('block');
                scrollTopButton.classList.remove('hidden');
            } else {
                // Scrolling DOWN
                scrollTopButton.classList.add('hidden');
                scrollTopButton.classList.remove('block');
            }
        }

        window.addEventListener('scroll', checkPosition);

        function scrollToTop() {
            window.scroll({top: 0, left: 0, behavior: 'smooth'});
        }
    </script>
@endpush
