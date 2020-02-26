<div class="overlay"></div>
  <!-- <video playsinline="playsinline" autoplay="autoplay" muted="muted" loop="loop">
    <source src="http://localhost/tinyurl/lib/assets/mp4/bg.mp4" type="video/mp4">
  </video> -->

  <div class="masthead">
    <div class="masthead-bg"></div>
    <div class="container h-100">
      <div class="row h-100">
        <div class="col-12" style="margin-top:3.5em">
          <div class="masthead-content text-white py-5 py-md-0">
            <h1 class="mb-3">Tiny Url!</h1>
            <p class="mb-5">Type your full url and generate easy to use and remember tiny Url</p>
            <form>
            <div class="input-group input-group-newsletter">
                <input type="text" id="url" class="form-control" placeholder="Full url" aria-label="Enter email..." aria-describedby="basic-addon">
                <div class="input-group-append">
                    <button id="submit" class="btn btn-secondary" type="button">Generate!</button>
                </div>
            </div>
            <?php $url = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];?>
            <img id="loader" src="<?= $url.'/lib/assets/ajax-loader.gif';?>" alt="">
            <span id="tinyurltext"></span>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script>
    $(document).ready(function(){
      var loader = $('#loader');
      loader.hide();
      $('#submit').on('click',function(e){
        var url = $('#url');
        loader.show();
        e.preventDefault();
        $.ajax({
          type:'POST',
          dataType:'json',
          url:'<?= $url.'url'?>',
          asycn:false,
          data:{url:url.val()},
          success:((response) => {
            loader.hide();
            var template = `
              <span>Congratulations! your tiny url is ready: </span>
              <span class="glyphicon glyphicon-thumb-right"></span>
              <a href="${response.tiny_url}" target="_blank" style="color:#ff9f35">${response.tiny_url}</a>
            `;
            $('#tinyurltext').html(template);
            $('#url').val('')
          }),
          error:((error) => {
            loader.hide();
          })
        })
      })
    });
  </script>