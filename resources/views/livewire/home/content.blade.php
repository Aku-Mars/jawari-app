    <div id="video-tari-ringkang" class="container mx-auto p-8">
        <div class="mb-8">
            <h1 class="text-3xl md:text-4xl font-bold text-gray-800 mb-2 font-display">Tari Ringkang Jawari</h1>
            <p class="text-lg text-gray-600">Sebuah persembahan visual yang menggambarkan semangat dan warisan leluhur
            </p>
        </div>

        <div class="relative w-full max-w-4xl mx-auto bg-black rounded-2xl shadow-lg overflow-hidden mb-12">
            <div class="relative w-full pb-[56.25%] overflow-hidden">
                <div id="player" class="absolute top-0 left-0 w-full h-full"></div>
                <div id="video-icon"
                    class="absolute inset-0 flex items-center justify-center transition-opacity duration-300 pointer-events-none">
                    <svg id="play-icon" class="h-24 w-24 text-white opacity-90" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M8 5v14l11-7z" />
                    </svg>
                    <svg id="pause-icon" class="h-24 w-24 text-white opacity-90 hidden" fill="currentColor"
                        viewBox="0 0 24 24">
                        <path d="M6 4h4v16H6zM14 4h4v16h-4z" />
                    </svg>
                </div>
            </div>
        </div>

        <script>
            let player;

            function onYouTubeIframeAPIReady() {
                player = new YT.Player('player', {
                    videoId: 'gPvLCVv0gl4',
                    playerVars: {
                        autoplay: 0,
                        controls: 1,
                        rel: 0,
                        showinfo: 0
                    },
                    events: {
                        onStateChange: onPlayerStateChange
                    }
                });
            }

            function onPlayerStateChange(event) {
                const $playIcon = $("#play-icon");
                const $pauseIcon = $("#pause-icon");
                const $iconContainer = $("#video-icon");

                switch (event.data) {
                    case YT.PlayerState.PLAYING:
                        $iconContainer.addClass("opacity-0");
                        setTimeout(() => $iconContainer.addClass("hidden"), 300);
                        break;

                    case YT.PlayerState.PAUSED:
                        $iconContainer.removeClass("hidden opacity-0");
                        $playIcon.addClass("hidden");
                        $pauseIcon.removeClass("hidden");
                        break;

                    case YT.PlayerState.ENDED:
                        $iconContainer.removeClass("hidden opacity-0");
                        $pauseIcon.addClass("hidden");
                        $playIcon.removeClass("hidden");
                        break;

                    case YT.PlayerState.UNSTARTED:
                    case YT.PlayerState.CUED:
                        $iconContainer.removeClass("hidden opacity-0");
                        $pauseIcon.addClass("hidden");
                        $playIcon.removeClass("hidden");
                        break;
                }
            }

            const tag = document.createElement("script");
            tag.src = "https://www.youtube.com/iframe_api";
            document.body.appendChild(tag);
        </script>

    </div>
