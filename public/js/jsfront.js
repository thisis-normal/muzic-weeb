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

// scheduleAd();


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
        }
    });

    this.audio.addEventListener("volumechange", function () {
        updateVolumeProgressBar(this);
    });

    this.setTrack = function (track) {
        this.currentlyPlaying = track;
        this.audio.src = musicFolder + track.file_path;
        console.log(this.audio.src);
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