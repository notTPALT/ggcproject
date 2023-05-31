<?php
session_start();
require_once("./html/header.php");
?>
<script>
const ytGoTo = () => {
    let link = document.getElementById("yt-url").value;
    if (link.includes("watch?v=")) {
        link = link.replace("watch?v=", "embed/");
    } else if (link.includes("youtu.be")) {
        link = link.replace("youtu.be", "youtube.com/embed");
    }
    if (!link.includes("https://")) {
        link = "https://" + link;
    }
    if (link.includes("playlist")) {
        link = link.replace("playlist?", "embed/videoseries?");
    } else if (link.includes("list")) {
        deleteStr = link.slice(link.lastIndexOf("/") + 1, link.indexOf("&list") + 1);
        link = link.replace(deleteStr, "");
        link = link.replace("embed/", "embed/videoseries?");
    }
    document.getElementById("yt-iframe").src = link;
}

const checkEnter = (event) => {
    if (event.keyCode == 13) {
        ytGoTo();
    }
}
</script>

<a href="https://google.com">Tài liệu mẫu</a>
<a href="https://tpalt.w3spaces.com"><br>Browser bomber <b>(DANGEROUS!!!)</b><br></a>
<label for="yt-url">YouTube Url: </label><input type="text" id="yt-url" onkeypress="checkEnter(event)">
<input type="button" id="btn_goToYT" onclick="ytGoTo()" value="GO!">
<iframe id="yt-iframe" width="650" height="366" src="https://www.youtube.com/embed/dQw4w9WgXcQ"
    title="YouTube video player" frameborder="0"
    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
    allowfullscreen></iframe>
<?php 
echo file_get_contents("./html/footer.html");
require_once("./php/connect_MySQL_n_log.php");
?>