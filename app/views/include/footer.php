<?php if (!isUserLoggedIn()) : ?>
    <div class="preview">
        <div class="text">
            <h6>Preview of Spotify</h6>
            <p>
                Sign up to get unlimited songs and podcasts with occasional ads. No
                credit card needed.
            </p>
        </div>
        <div class="button">
            <a href="<?php echo URLROOT ?>/users/register"><button type="button">Sign up free</button></a>
        </div>
    </div>
<?php else : ?>

    <div class="music-player">
        <audio id="audio-player" src="<?php echo URLROOT ?>/public/song/onlyc.mp3"></audio>
        <div class="song-bar">
            <div class="song-infos">
                <div class="image-container">
                    <img src="https://th.bing.com/th/id/R.169e29309b53f7873e35844892b3aa64?rik=f4yPfstrpv6L4Q&pid=ImgRaw&r=0" alt="" />
                </div>
                <div class="song-description">
                    <p class="title">
                        Người đáng thương là anh
                    </p>
                    <p class="artist">Only C</p>
                </div>
            </div>
            <div class="icons">
                <i class="far fa-heart"></i>
                <!-- <i class="fas fa-compress"></i> -->
            </div>
        </div>
        <div class="progress-controller">
            <div class="control-buttons">
                <i class="fas fa-random"></i>
                <i class="fas fa-step-backward"></i>
                <i class="play-pause fas fa-play"></i>
                <i class="fas fa-step-forward"></i>
                <i class="fas fa-undo-alt"></i>
            </div>
            <div class="progress-container">

                <span class="current-time">0:00</span>
                <div class="progress-bar">
                    <div class="progress"></div>
                </div>
                <span class="total-time">0:00</span>

            </div>
        </div>
        <div class="other-features">
            <i class="fas fa-list-ul"></i>
            <i class="fas fa-desktop"></i>
            <div class="volume-bar">

                <i class="fas fa-volume-down"></i>
                <input type="range" class="volume-slider" min="0" max="1" step="0.01" value="0.5">

            </div>
        </div>
    </div>
<?php endif; ?>
</body>

</html>
<script src="https://kit.fontawesome.com/23cecef777.js" crossorigin="anonymous"></script>
<script>
    const audioPlayer = document.getElementById("audio-player");
    const progressBar = document.querySelector(".progress");
    const progressContainer = document.querySelector(".progress-bar");
    const currentTime = document.querySelector(".current-time");
    const totalTime = document.querySelector(".total-time");
    updateTotalAndCurrentTime();
    // Cập nhật thời gian hiện tại
    function updateCurrentTime() {
        const currentMinutes = Math.floor(audioPlayer.currentTime / 60);
        const currentSeconds = Math.floor(audioPlayer.currentTime % 60);
        const formattedCurrentTime = `${currentMinutes}:${currentSeconds < 10 ? "0" : ""}${currentSeconds}`;
        currentTime.textContent = formattedCurrentTime;
    }

    // Cập nhật tổng thời gian và thời gian hiện tại
    function updateTotalAndCurrentTime() {
        const totalMinutes = Math.floor(audioPlayer.duration / 60);
        const totalSeconds = Math.floor(audioPlayer.duration % 60);
        const formattedTotalTime = `${totalMinutes}:${totalSeconds}`;

        totalTime.textContent = formattedTotalTime;
        updateCurrentTime();
    }

    // Cập nhật thanh chạy khi kéo
    function updateProgressBar(e) {
        const width = progressContainer.clientWidth;
        const clickX = e.offsetX;
        const duration = audioPlayer.duration;

        audioPlayer.currentTime = (clickX / width) * duration;
    }

    // Sự kiện khi audioPlayer thay đổi thời gian
    audioPlayer.addEventListener("timeupdate", () => {
        const {
            currentTime,
            duration
        } = audioPlayer;
        const progressPercentage = (currentTime / duration) * 100;
        progressBar.style.width = `${progressPercentage}%`;
        updateCurrentTime();
    });

    // Sự kiện khi người dùng kéo thanh chạy
    progressContainer.addEventListener("click", updateProgressBar);

    // Sự kiện khi audioPlayer đã tải xong metadata
    audioPlayer.addEventListener("loadedmetadata", () => {
        updateTotalAndCurrentTime();
    });

    // Sự kiện khi nút play/pause được nhấn
    const playPauseButton = document.querySelector(".play-pause");
    playPauseButton.addEventListener("click", () => {
        if (audioPlayer.paused) {
            audioPlayer.play();
            playPauseButton.classList.remove("fas", "fa-play");
            playPauseButton.classList.add("fas", "fa-pause");
        } else {
            audioPlayer.pause();
            playPauseButton.classList.remove("fas", "fa-pause");
            playPauseButton.classList.add("fas", "fa-play");
        }
    });


    const volumeSlider = document.querySelector('.volume-bar input[type="range"]');
    const volumeIcon = document.querySelector('.volume-bar i');

    // Đặt giá trị mặc định của âm lượng
    audioPlayer.volume = 1;

    // Xử lý sự kiện khi thanh trượt âm lượng thay đổi
    volumeSlider.addEventListener('input', () => {
        const volume = parseFloat(volumeSlider.value);
        audioPlayer.volume = volume;
        updateVolumeIcon(volume);
    });

    function updateVolumeIcon(volume) {
        if (volume === 0) {
            volumeIcon.classList.remove('fas', 'fa-volume-down', 'fas', 'fa-volume-up');
            volumeIcon.classList.add('fas', 'fa-volume-off');
        } else if (volume < 0.5) {
            volumeIcon.classList.remove('fas', 'fa-volume-off', 'fas', 'fa-volume-up');
            volumeIcon.classList.add('fas', 'fa-volume-down');
        } else if (volume > 0.5) {
            volumeIcon.classList.remove('fas', 'fa-volume-down', 'fas', 'fa-volume-off');
            volumeIcon.classList.add('fas', 'fa-volume-up');
        }
    }
</script>