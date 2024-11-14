<body class="bg-gray-100 flex items-center justify-center min-h-screen">

    <section class="bg-white p-6 rounded-lg shadow-lg w-full max-w-4xl">
        <div class="video-container mb-4">
            <video id="videoPlayer" controls class="w-full h-96 rounded-lg">
                <source src="path/to/your/video1.mp4" type="video/mp4">
                Your browser does not support the video tag.
            </video>
        </div>
        <div class="description-container mb-4 text-center">
            <p id="videoDescription" class="text-lg text-gray-700">Deskripsi video 1 di sini.</p>
        </div>
        <div class="controls text-center">
            <button id="prevBtn" class="bg-blue-500 text-white px-4 py-2 rounded-lg mr-2 disabled:opacity-50 hover:bg-blue-700">Back</button>
            <button id="nextBtn" class="bg-blue-500 text-white px-4 py-2 rounded-lg mr-2 hover:bg-blue-700">Next</button>
            <button id="finishBtn" class="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-700" style="display: none;">Finish</button>
        </div>
    </section>

    <script>
        const videos = [
            { src: "path/to/your/video1.mp4", description: "Deskripsi video 1 di sini." },
            { src: "path/to/your/video2.mp4", description: "Deskripsi video 2 di sini." },
            { src: "path/to/your/video3.mp4", description: "Deskripsi video 3 di sini." },
            { src: "path/to/your/video4.mp4", description: "Deskripsi video 4 di sini." },
            { src: "path/to/your/video5.mp4", description: "Deskripsi video 5 di sini." }
        ];

        let currentVideoIndex = 0;

        const videoPlayer = document.getElementById('videoPlayer');
        const videoDescription = document.getElementById('videoDescription');
        const prevBtn = document.getElementById('prevBtn');
        const nextBtn = document.getElementById('nextBtn');
        const finishBtn = document.getElementById('finishBtn');

        function loadVideo(index) {
            videoPlayer.src = videos[index].src;
            videoDescription.textContent = videos[index].description;
            videoPlayer.load();
            updateButtons();
        }

        function updateButtons() {
            prevBtn.disabled = currentVideoIndex === 0;
            if (currentVideoIndex === videos.length - 1) {
                nextBtn.style.display = 'none';
                finishBtn.style.display = 'inline-block';
            } else {
                nextBtn.style.display = 'inline-block';
                finishBtn.style.display = 'none';
            }
        }

        prevBtn.addEventListener('click', () => {
            if (currentVideoIndex > 0) {
                currentVideoIndex--;
                loadVideo(currentVideoIndex);
            }
        });

        nextBtn.addEventListener('click', () => {
            if (currentVideoIndex < videos.length - 1) {
                currentVideoIndex++;
                loadVideo(currentVideoIndex);
            }
        });

        finishBtn.addEventListener('click', () => {
            alert('You have finished watching all the videos!');
        });

        // Load the first video initially
        loadVideo(currentVideoIndex);
    </script>
    
</body>
