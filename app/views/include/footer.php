</div>
<div class="footer">

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

        <?php else : ?>

            <div class="music-player" id="music-player">
                <!-- <audio id="audio-player" src="<?php echo URLROOT ?>/public/songs/chieckhanphieu.mp3"></audio> -->
                <div class="song-bar">
                    <div class="song-infos">
                        <div class="image-container">
                            <img src="https://th.bing.com/th/id/R.169e29309b53f7873e35844892b3aa64?rik=f4yPfstrpv6L4Q&pid=ImgRaw&r=0" alt="" />
                        </div>
                        <div class="song-description">
                            <p class="title">

                            </p>
                            <p class="artist"></p>
                        </div>
                    </div>
                    <!-- <div class="icons">
                        <i class="far fa-heart"></i>
                        <i class="fas fa-compress"></i>
                    </div> -->
                </div>
                <div class="progress-controller">
                    <div class="control-buttons">
                        <i class="fas fa-random" id="shuffle" onclick="setShuffle()"></i>
                        <i class="fas fa-step-backward" title="Pre" onclick="prevSong()"></i>
                        <i class="play-pause fas fa-play" title="Play button" onclick="playSong()"></i>
                        <i class="fas fa-step-forward" title="Next" onclick="nextSong()"></i>
                        <i class="fas fa-undo-alt" id="repeat" title="Repeat button" onclick="setRepeat()"></i>
                    </div>
                    <div class="progress-container">

                        <span class="current-time">-:-</span>
                        <div class="progress-bar">
                            <div class="progress"></div>
                        </div>
                        <span class="total-time">-:-</span>

                    </div>
                </div>
                <div class="other-features">
                    <i class="fas fa-music" title="Lyrics" id="lyrics"></i>
                    <i class="fas fa-list-ul"></i>
                    <i class="fas fa-desktop"></i>
                    <div class="volume-bar">

                        <i class="fas fa-volume-up" onclick="setMute()"></i>
                        <div class="progress-bar">

                            <div class="progress"></div>

                        </div>
                    </div>
                </div>

            <?php endif; ?>
            </body>

            </html>
            <script src="https://kit.fontawesome.com/23cecef777.js" crossorigin="anonymous"></script>
            <script>
                $(document).ready(function() {
                    // console.log(newPlaylist)
                    audioElement = new Audio();
                    // audioElement.setTrack('<?php echo URLROOT ?>/public/songs/chieckhanphieu.mp3');
                    // audioElement.play()

                    updateVolumeProgressBar(audioElement.audio);


                    $("#music-player").on("mousedown touchstart mousemove touchmove", function(e) {
                        e.preventDefault();
                    });


                    $(".progress-container .progress-bar").mousedown(function() {
                        mouseDown = true;
                    });

                    $(".progress-container .progress-bar").mousemove(function(e) {
                        if (mouseDown == true) {
                            //Set time of song, depending on position of mouse
                            timeFromOffset(e, this);
                        }
                    });

                    $(".progress-container .progress-bar").mouseup(function(e) {
                        timeFromOffset(e, this);
                    });


                    $(".volume-bar .progress-bar").mousedown(function() {
                        mouseDown = true;
                    });

                    $(".volume-bar .progress-bar").mousemove(function(e) {
                        if (mouseDown == true) {

                            var percentage = e.offsetX / $(this).width();

                            if (percentage >= 0 && percentage <= 1) {
                                audioElement.audio.volume = percentage;
                            }
                        }
                    });

                    $(".volume-bar .progress-bar").mouseup(function(e) {
                        var percentage = e.offsetX / $(this).width();

                        if (percentage >= 0 && percentage <= 1) {
                            audioElement.audio.volume = percentage;
                        }
                    });

                    $(document).mouseup(function() {
                        mouseDown = false;
                    });




                });

                function timeFromOffset(mouse, progressBar) {
                    var percentage = mouse.offsetX / $(progressBar).width() * 100;
                    var seconds = audioElement.audio.duration * (percentage / 100);
                    audioElement.setTime(seconds);
                }
                // play
                function playSong() {
                    // console.log(4);
                    // if (audioElement.audio.currentTime == 0) {
                    //     $.post("includes/handlers/ajax/updatePlays.php", {
                    //         songId: audioElement.currentlyPlaying.id
                    //     });
                    // }

                    $(".play-pause").removeClass("fa-play");
                    $(".play-pause").addClass("fa-pause");
                    $(".play-pause").attr("onclick", "pauseSong()");

                    audioElement.play();
                }
                //pause
                function pauseSong() {
                    $(".play-pause").addClass("fa-play");
                    $(".play-pause").removeClass("fa-pause");
                    $(".play-pause").attr("onclick", "playSong()");
                    audioElement.pause();
                }
                // pre
                function prevSong() {
                    if (audioElement.audio.currentTime >= 3 || currentIndex == 0) {
                        audioElement.setTime(0);
                    } else {
                        currentIndex = currentIndex - 1;
                        setTrack(currentPlaylist[currentIndex], currentPlaylist, true);
                    }
                }
                // next
                function nextSong() {
                    if (repeat == true) {
                        audioElement.setTime(0);
                        playSong();
                        return;
                    }

                    if (currentIndex == currentPlaylist.length - 1) {
                        currentIndex = 0;
                    } else {
                        currentIndex++;
                    }

                    var trackToPlay = shuffle ? shufflePlaylist[currentIndex] : currentPlaylist[currentIndex];
                    setTrack(trackToPlay, currentPlaylist, true);
                }
                // setmute
                function setMute() {
                    var volumeIcon = $(".volume-bar i");
                    audioElement.audio.muted = !audioElement.audio.muted;

                    if (audioElement.audio.muted) {
                        volumeIcon.removeClass('fa-volume-up').addClass('fa-volume-mute');
                    } else {
                        volumeIcon.removeClass('fa-volume-mute').addClass('fa-volume-up');
                    }
                }

                //repeat
                function setRepeat() {
                    repeat = !repeat;
                    var active = repeat ? "#1DB954" : "#999999";
                    $("#repeat").css("color", active);
                }
                //shuffle
                function setShuffle() {
                    shuffle = !shuffle;
                    var active = shuffle ? "#1DB954" : "#999999";
                    $("#shuffle").css("color", active);

                    if (shuffle == true) {
                        //Randomize playlist
                        shuffleArray(shufflePlaylist);
                        currentIndex = shufflePlaylist.indexOf(audioElement.currentlyPlaying.id);
                    } else {
                        //shuffle has been deactivated
                        //go back to regular playlist
                        currentIndex = currentPlaylist.indexOf(audioElement.currentlyPlaying.id);
                    }

                }

                function shuffleArray(a) {
                    var j, x, i;
                    for (i = a.length; i; i--) {
                        j = Math.floor(Math.random() * i);
                        x = a[i - 1];
                        a[i - 1] = a[j];
                        a[j] = x;
                    }
                }
                //settrack
                function setTrack(trackId, newPlaylist, play) {


                    if (newPlaylist != currentPlaylist) {
                        currentPlaylist = newPlaylist;
                        shufflePlaylist = currentPlaylist.slice();
                        shuffleArray(shufflePlaylist);
                    }

                    if (shuffle == true) {
                        currentIndex = shufflePlaylist.indexOf(trackId);
                    } else {
                        currentIndex = currentPlaylist.indexOf(trackId);
                    }
                    pauseSong();

                    $.post("<?php echo URLROOT ?>/Songs/getSongJson/", {
                        songId: trackId
                    }, function(data) {
                        var track = data;
                        sessionStorage.removeItem('trackTitle');
                        sessionStorage.setItem('trackTitle', track.title);
                        $(".song-description .title").text(track.title);

                        // Yêu cầu thông tin về nghệ sĩ
                        $.post("<?php echo URLROOT ?>/Songs/getArtistJson/", {
                            artistId: track.artist_id
                        }, function(artistData) {
                            var artist = artistData;
                            sessionStorage.removeItem('artistName');
                            sessionStorage.setItem('artistName', artist.name);

                            $(".song-infos .artist").text(artist.name);
                            // $(".song-infos .artist").attr("onclick", "openPage('artist.php?id=" + artist.id + "')");
                        });
                        // Cập nhật audioElement và phát nhạc nếu cần


                        audioElement.setTrack(track);

                        if (play == true) {
                            playSong();
                        }
                    });

                }



                window.onload = function() {
                    audioElement = new Audio();
                    $(".song-description .title").text(sessionStorage.getItem('trackTitle'));
                    $(".song-infos .artist").text(sessionStorage.getItem('artistName'));
                    audioElement.setTrack(JSON.parse(sessionStorage.getItem('track')));
                    $(".progress-container .current-time").text(sessionStorage.getItem("start"));
                    $(".progress-container .total-time").text(sessionStorage.getItem("end"));
                    $(".progress-container .progress").css("width", sessionStorage.getItem("dur") + "%");
                    // if (play == true) {
                    //     audioElement.currentTime = sessionStorage.getItem("start");
                    //     playSong();
                    // } else {
                    //     pauseSong();
                    // }

                }
                const corsAnywhere = 'https://cors-anywhere.herokuapp.com/';
                const apiKey = '2043877c3e4880f25ababf0000654c2a';


                function getLyrics(trackName, artistName) {
                    try {

                        fetch(`${corsAnywhere}https://api.musixmatch.com/ws/1.1/matcher.lyrics.get?q_track=${trackName}&q_artist=${artistName}&apikey=${apiKey}`)
                            .then(response => response.json())
                            .then(data => {
                                const status = data.message.header.status_code;
                                if (status === 202) {
                                    const lyricsBody = data.message.body.lyrics.lyrics_body;
                                    // const cleanLyrics = lyricsBody.replace(/\*{7}.*/, '');
                                    const cleanLyricst = lyricsBody.replace(/\(\d+\)/, '');
                                    const Lyrics = cleanLyricst.replace(/\n/g, '<br>');
                                    localStorage.removeItem('lyricsContent');
                                    localStorage.setItem('lyricsContent', Lyrics);
                                    openPage('<?php echo URLROOT ?>/lyrics/detail');
                                } else {

                                    const Lyrics = "";
                                    localStorage.removeItem('lyricsContent');
                                    localStorage.setItem('lyricsContent', Lyrics);
                                    openPage('<?php echo URLROOT ?>/lyrics/detail');
                                }
                            });
                    } catch (error) {
                        alert(5)
                    }

                }
                $("#lyrics").click(function() {

                    const trackName = sessionStorage.getItem('trackTitle'); // Thay đổi giá trị theo nhu cầu
                    const artistName = sessionStorage.getItem('artistName');; // Thay đổi giá trị theo nhu cầu
                    getLyrics(trackName, artistName);
                });
            </script>
            <script src="<?php echo URLROOT ?>/public/js/jsfront.js"></script>