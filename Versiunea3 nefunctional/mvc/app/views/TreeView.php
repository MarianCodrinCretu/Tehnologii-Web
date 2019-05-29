<?php

class TreeView
{
    public function outputTree($treeRecord)
    {
        $this_part_yt_url = explode('=', $treeRecord["url"])[1];
//        print_r($treeRecord);
      $style = "<style>
      div#video_player_box{
      }
      div#video_controls_bar{
        background: #333;
        padding:10px;
        visibility: hidden;
      }
      div#puseFrumos {
        display:grid !important;
        grid-template-columns: 2fr 2fr !important;
        grid-gap:10px;
      }
    </style>";
        $jscript = '<script>
        var tag = document.createElement("script");
        tag.src = "https://www.youtube.com/iframe_api";
        var firstScriptTag = document.getElementsByTagName("script")[0];
        firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
        var player;
        function onYouTubeIframeAPIReady() {
            var w = window.innerWidth;
            var h = window.innerHeight;
            player = new YT.Player("player", {
          height: h/1.3,
          width: w,
          videoId: "' . $this_part_yt_url . '",
          events: {
                "onReady": onPlayerReady,
            "onStateChange": onPlayerStateChange
          }
        }
                              );
      }
        function onPlayerReady(event) {
        event.target.playVideo();
      }
        var done = false;
        function onPlayerStateChange(event) {
            if (event.data == YT.PlayerState.PLAYING && !done) {
                setTimeout(stopVideo, 6000);
                done = true;
            }
        }
        function stopVideo() {
            player.stopVideo();
        }
        function onPlayerStateChange(event)
      {
          if(event.data === 0)
          {
              var e=document.getElementById("video_controls_bar");
              e.style.visibility="visible";
          }
      }
        </script>';

        $output = '
<!DOCTYPE html>
<html>
  <head>
    ' . $style . $jscript . '
  </head>
  <body>    

      <div id="player">
      </div>
      <div id="video_controls_bar">
        <p style="text-align: center; color:red">' . $treeRecord['question'] . '
        </p>
          <div id="puseFrumos">';
        if ($treeRecord['id_tree1'] > 0) {
            $output .= '<button type="submit" name="option1" onclick="location.href = \'http://localhost/mvc/public/index.php/?url=movie/view_tree/' . $treeRecord['id_tree1'] . '\';"> ' . $treeRecord['answer1'] . '</button>';
            }
        if ($treeRecord['id_tree2'] > 0) {
            $output .= '<button type="submit" name="option1" onclick="location.href = \'http://localhost/mvc/public/index.php/?url=movie/view_tree/' . $treeRecord['id_tree2'] . '\';"> ' . $treeRecord['answer2'] . '</button>';
            }
        if ($treeRecord['id_tree3'] > 0) {
            $output .= '<button type="submit" name="option1" onclick="location.href = \'http://localhost/mvc/public/index.php/?url=movie/view_tree/' . $treeRecord['id_tree3'] . '\';"> ' . $treeRecord['answer3'] . '</button>';
            }
        if ($treeRecord['id_tree4'] > 0) {
            $output .= '<button type="submit" name="option1" onclick="location.href = \'http://localhost/mvc/public/index.php/?url=movie/view_tree/' . $treeRecord['id_tree4'] . '\';"> ' . $treeRecord['answer4'] . '</button>';
            }

        $output .= '</div>
      </div>
  </body>
</html>';

//        $movieObj = $movie->getMovie();
//        $output = 'Movie View pentru filmul ' . $movieObj['description']. '';
//       print_r( $movie->getMovie());
        echo $output;
        return $output;
    }
}
