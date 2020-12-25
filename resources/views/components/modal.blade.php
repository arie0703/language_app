
 
  <!-- 2.モーダルの配置 -->
  <div class="modal" id="modal-example" tabindex="-1">
    <div class="modal-dialog">
 
      <!-- 3.モーダルのコンテンツ -->
      <div class="modal-content">
 
        <!-- 4.モーダルのヘッダ -->
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">
            <span aria-hidden="true">&times;</span>
          </button>
          <h4 class="modal-title" id="modal-label">New Post</h4>
        </div>

        <div class="modal-body">
        <form method="post" action="{{ route('talks.create') }}" enctype="multipart/form-data">
        @csrf
            <div class="talk-form">
                <div class="form-title">
                    <input class="form-control" type="text" placeholder="Title" name="title" value="{{ old('title') }}">
                </div>

                <div class="form-body">
                    <textarea class="form-control" type="text" name="body" cols="50" rows="10">{{ old('body') }}</textarea>        
                </div>

                <div class="form-language">
                <select name="language" class="form-control">
                  <option selected="selected" value="{{ old('language') }}">Language</option>
                  <option value="English">English</option>
                  <option value="German">German</option>
                  <option value="French">French</option>
                  <option value="Spanish">Spanish</option>
                  <option value="Portuguese">Portuguese</option>
                  <option value="Russian">Russian</option>
                  <option value="Japanese">Japanese</option>
                  <option value="Chinese">Chinese</option>
                  <option value="Corean">Corean</option>
                  <option value="Corean">Other</option>
                </select>
                </div>

                <div class="form-tool">
                    <select name="tool" class="form-control">
                    <option selected="selected" value="{{ old('tool') }}">How to talk?</option>
                    <option value="Zoom">Zoom</option>
                    <option value="Google Meet">Google Meet</option>
                    <option value="Skype">Skype</option>
                    <option value="Chat">Chat</option>
                    <option value="Other">Other</option>
                    </select>
                </div>

                <div class="form-link">
                    <input class="form-control" type="text" name="link" placeholder="link (if needed)" >{{ old('link') }}</input>        
                </div>



                <div class="form-submit">
                    <button type="submit" class="btn btn-primary">Post</button>
                </div>
            </div>


            <script>
            function previewImage(obj)
            {
                var fileReader = new FileReader();
                fileReader.onload = (function() {
                document.getElementById('image').src = fileReader.result;
                });
                fileReader.readAsDataURL(obj.files[0]);
            }
            </script>
        </form>
        </div>
      </div>
    </div>
  </div>