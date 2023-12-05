var currentPlaylist = [];
var shufflePlaylist = [];
var tempPlaylist = [];
var audioElement;
var mouseDown = false;
var currentIndex = 0;
var repeat = false;
var shuffle = false;
var userLoggedIn;
var timer;
var musicFolder = 'http://localhost:2002/muzic-weeb/public/songs/';
var license = document.getElementById("license");
if (license.getAttribute("data-license") === '1') {
    scheduleAd();
    $("#download").on("click", function () {

        alert("Phải mua premium cơ")
    })
}
else {

    var url = sessionStorage.getItem("file");
    var fileName = localStorage.getItem("trackTitle");
    // var download = document.getElementById("download");
    $("#download").on("click", function () {

        downloadMusicFromURL(url, fileName)
    })
}
window.onpopstate = function (event) {
    if (event.state) {
        openPage(sessionStorage.getItem("urlOld"))
    } else {
        console.log('Trang ban đầu');
    }
};


function formatTime(seconds) {
    var time = Math.round(seconds);
    var minutes = Math.floor(time / 60); //Rounds down
    var seconds = time - (minutes * 60);

    var extraZero = (seconds < 10) ? "0" : "";

    return minutes + ":" + extraZero + seconds;
}

function updateTimeProgressBar(audio) {
    $(".progress-container .current-time").text(formatTime(audio.currentTime));
    $(".progress-container .total-time").text(formatTime(audio.duration));

    var progress = audio.currentTime / audio.duration * 100;
    $(".progress-container .progress").css("width", progress + "%");
}
function timeToSeconds(time) {
    const [minutes, seconds] = time.split(':');
    return parseInt(minutes, 10) * 60 + parseInt(seconds, 10);
}
function updateVolumeProgressBar(audio) {
    var volume = audio.volume * 100;
    $(".volume-bar .progress").css("width", volume + "%");
}
function playFirstSong() {
    setTrack(tempPlaylist[0], tempPlaylist, true);
}
function Audio() {

    this.currentlyPlaying;
    this.audio = document.createElement('audio');

    this.audio.addEventListener("ended", function () {
        nextSong();
    });

    this.audio.addEventListener("canplay", function () {
        //'this' refers to the object that the event was called on
        var duration = formatTime(this.duration);
        $(".progressTime.remaining").text(duration);
    });

    this.audio.addEventListener("timeupdate", function () {
        if (this.duration) {
            updateTimeProgressBar(this);

            sessionStorage.setItem("start", $(".progress-container .current-time").text());
            sessionStorage.setItem("end", $(".progress-container .total-time").text());
            sessionStorage.setItem("dur", timeToSeconds($(".progress-container .current-time").text()) / timeToSeconds($(".progress-container .total-time").text()) * 100);

        }
    });

    this.audio.addEventListener("volumechange", function () {
        updateVolumeProgressBar(this);
    });

    this.setTrack = function (track) {

        if (sessionStorage.getItem("id_track") !== track.id) {
            sessionStorage.removeItem("track")
            sessionStorage.removeItem("start")
            sessionStorage.removeItem("end")
            sessionStorage.removeItem("dur")
        }
        sessionStorage.setItem('track', JSON.stringify(track));
        sessionStorage.setItem("id_track", track.id);
        sessionStorage.setItem("file", (musicFolder + track.file_path));


        // sessionStorage.clear();
        this.currentlyPlaying = track;
        this.audio.src = musicFolder + track.file_path;

    }

    this.play = function () {

        this.audio.play();
    }

    this.pause = function () {
        this.audio.pause();
    }

    this.setTime = function (seconds) {
        this.audio.currentTime = seconds;
    }

}