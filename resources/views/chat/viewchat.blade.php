@include('layouts.header')
@include('layouts.sidebar')

<main id="main" class="main">
  <div class="pagetitle">
    <div class="row">
      <div class="col-xxl-12 col-lg-12 col-md-12 col-sm-12">
        <h1>Chat Messages</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
            <li class="breadcrumb-item active">Chat Messages</li>
          </ol>
        </nav>
      </div>
    </div>
  </div>

  <section class="chatbtwstandcu">
    <div class="container">
      <div class="row d-flex justify-content-center">
        <div class="col-md-8 col-lg-8 col-xl-8">
          <div class="card" id="chat1" style="border-radius: 15px;">
            <div class="card-header mb-3">
              <div class="row">
                <div class="col-lg-8">
                  <h5 class="card-title text-start">Chat with {{ $user->name }}</h5>
                </div>
                <div class="col-lg-4">
                  <h5 class="card-title text-end chatback">
                    <a href="{{ route(session('prefix', 'agent') . '.chat.index') }}"> Back </a>
                  </h5>
                </div>
              </div>
            </div>
            <div class="card-body" id="chat-box" style="height: 400px; overflow-y: scroll;">
              <!-- Messages will be loaded here -->
            </div>
            <div class="card-footer text-muted d-flex justify-content-start align-items-center p-3">
              <div class="input-group mb-0">
                <input type="text" id="msgtext" class="form-control" placeholder="Type message">
                <button class="btn btn-primary send-btn" type="button" data-receiver-id="{{ $user->id }}" id="button-addon2">
                  Send
                </button>
                <button class="btn btn-secondary" id="file-button">Attach File</button>
                <input type="file" id="file-input" style="display:none;" accept="image/*">
                <span id="file-name" class="ms-3"></span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>

@include('layouts.footer')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function() {
  const chatBox = $('#chat-box');
  const sendButton = $('.send-btn');
  const fileInput = $('#file-input');
  const fileButton = $('#file-button');
  const fileNameSpan = $('#file-name');
  const csrfToken = $('meta[name="csrf-token"]').attr('content');
  const receiverId = sendButton.data('receiver-id');
  const currentUserId = {{ Auth::user()->id }};
  const fetchMessagesUrl = `{{ url(session('prefix') . '/chat/messages') }}/${receiverId}`;

  function scrollToBottom() {
    chatBox.scrollTop(chatBox[0].scrollHeight);
  }

  function fetchMessages() {
    console.log(`Fetching messages for receiver ID: ${receiverId}`);
    $.ajax({
      url: fetchMessagesUrl,
      type: 'GET',
      headers: {
        'X-CSRF-TOKEN': csrfToken
      },
      success: function(messages) {
        const shouldScroll = chatBox[0].scrollHeight - chatBox.scrollTop() === chatBox.outerHeight();
        chatBox.html('');
        messages.forEach(message => {
          var isSender = message.sender_id == currentUserId;
          // var imgSrc = message.receiver_image;
          // if(message.sender_id == currentUserId){
          //   imgSrc =  message.sender_image;
          // }
          var imgSrc =  message.sender_image;
          // var imgSrc = isSender ? message.sender_image : message.receiver_image;
          // console.log('isSender',currentUserId, message.sender_id,imgSrc);
          // console.log('isSender',isSender,imgSrc,message.sender_image,message.receiver_image);
          // console.log(`Message ID: ${message.id}, isSender: ${isSender}, imgSrc: ${imgSrc}`);
          const div = $('<div></div>').addClass(`d-flex flex-row justify-content-${isSender ? 'end' : 'start'} mb-4`);
          const img = $('<img>').attr('src', imgSrc).css({ width: '45px', height: '100%' });
          const msgDiv = $('<div></div>').addClass(isSender ? 'me-3 cust-chat' : 'ms-3 staff-chat');

          if (message.type === 'text') {
            msgDiv.html(`<p class="mb-0">${message.message}</p>`);
          } else {
            const fileLink = $('<a></a>').attr('href', `{{ asset('${message.path}') }}`).attr('target', '_blank');
            if (message.type === 'image') {
              fileLink.append($('<img>').attr('src', `{{ asset('${message.path}') }}`).css({ width: '100px' }));
            } else if (message.type === 'video') {
              fileLink.append($('<video>').attr('src', `{{ asset('${message.path}') }}`).attr('controls', true).css({ width: '100px' }));
            } else {
              fileLink.text(message.path.split('/').pop());
            }
            msgDiv.append(fileLink);
          }
          div.append(img).append(msgDiv);
          chatBox.append(div);
        });
        if (shouldScroll) {
        scrollToBottom();
      }
      },
      error: function(error) {
        console.error('Fetch error:', error);
      }
    });
  }

  function sendMessage(message, file = null) {
    const formData = new FormData();
    formData.append('receiver_id', receiverId);
    formData.append('message', message);
    formData.append('type', file ? file.type.split('/')[0] : 'text');
    if (file) {
      formData.append('file', file);
    }

    $.ajax({
      url: '{{ route(session('prefix', 'agent') . '.chat.send') }}',
      type: 'POST',
      headers: {
        'X-CSRF-TOKEN': csrfToken
      },
      data: formData,
      contentType: false,
      processData: false,
      success: function(data) {
        fetchMessages();
        $('#msgtext').val('');
        fileInput.val('');
        fileNameSpan.text('');
      },
      error: function(error) {
        console.error('Send message error:', error);
      }
    });
  }

  sendButton.on('click', function() {
    scrollToBottom();
    const message = $('#msgtext').val();
    if (message.trim() || fileInput[0].files.length > 0) {
      sendMessage(message, fileInput[0].files[0]);
    }
  });

  fileButton.on('click', function() {
    fileInput.click();
  });

  fileInput.on('change', function() {
    const file = fileInput[0].files[0];
    if (file) {
      fileNameSpan.text(file.name);
    }
  });

  $('#msgtext').on('keypress', function(e) {
    
    if (e.which === 13) { // Enter key pressed
      const message = $(this).val();
      if (message.trim() || fileInput[0].files.length > 0) {
        sendMessage(message, fileInput[0].files[0]);
      }
    }
  });

  fetchMessages();
  //scrollToBottom(); // Initial scroll when the page loads
  setInterval(fetchMessages, 5000); // Fetch new messages every 5 seconds
});




</script>
