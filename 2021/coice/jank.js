//my code
let streamer = [];
function cool_stuff() {

  console.log("is this running?");
  $.getJSON('streamers.json', function(data) {
      streamer = data;
  });


  setTimeout(function() {
    for(let i = 0; i < streamer.length; i++) {
      $(".content_body").append(
        "<div class='s_panel' id='"+i+"' href='"+streamer[i].Link+"'><h4>"
          +streamer[i].name+
        "</h4><img src='"+streamer[i].pfp+"' /><p>"+streamer[i].bio+"</p><a href='"+streamer[i].Link+"'>Check out!</a></div>"
      );
    }
  }, 100);
};
