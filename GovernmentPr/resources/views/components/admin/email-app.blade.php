<x-layouts.admin-app>
  @section('styles')
  <link rel="stylesheet" href="{{asset('adminAssets/css/tagify.css')}}">
  @endsection
  @section('scripts')
  <script src="{{asset('adminAssests/js/tagify.js')}}"></script>
  <script src="https://cdn.jsdelivr.net/npm/tom-select@2.4.1/dist/js/tom-select.complete.min.js"></script>
  <script>
    
      new TomSelect('#select-repo',{
      valueField: 'url',
      labelField: 'name',
      searchField: 'name',
      // fetch remote data
      load: function(query, callback) {

        var url = '{{route('get-user')}}?q=' + encodeURIComponent(query);
        fetch(url)
          .then(response => {
              if (!response.ok) {
                throw new Error('Network response was not ok');
              }
              return response.json();
            })
          .then(json => {
            console.log('Fetched items:', json.items[0]); // Debugging log
            callback(json.items || []); // Pass items to Tom Select
          }).catch((error)=>{
            console.error('Fetch error:', error); // Log the error
            callback();
          });

      },
      // custom rendering functions for options and items
      render: {
        option: function(item, escape) {
          console.log(item);
          
          return `<div class="py-2 d-flex">
                <div class="icon me-3">
                  <img class="img-fluid" src="${escape(item.profile_photo_path || "")}" />
                </div>
                <div>
                  <div class="mb-1">
                    <span class="h4">
                      ${ escape(item.first_name || "") }
                    </span>
                    <span class="text-muted">by ${ escape(item.email || "") }</span>
                  </div>
                  <div class="description">${ escape(item.description || "") }</div>
                </div>
              </div>`;
        },
        item: function(item, escape) {
          console.log(item);
          
          return `<div class="py-2 d-flex">
                <div class="icon me-3">
                  <img class="img-fluid" src="${escape(item.profile_photo_path || "")}" />
                </div>
                <div>
                  <div class="mb-1">
                    <span class="h4">
                      ${ escape(item.first_name || "") }
                    </span>
                    <span class="text-muted">by ${ escape(item.email || "") }</span>
                  </div>
                  <div class="description">${ escape(item.description || "") }</div>
                </div>
              </div>`;
        }
      },
    });

  </script>
  @endsection
<div class="container-fluid d-flex justify-content-center align-items-center">
  
<div class="card-container w-100 ">
<div class="card shadow-sm">
<div class="card-header">
        <h5 class="modal-title" id="emailModalLabel">Email Interface</h5>
       
      </div>
  <div class="card-body">
  <div class="row">
          <!-- Sidebar -->
          <div class="col-md-3 email-sidebar">
            <h5 class="mb-4">Joseph</h5>
            <p>example@gmail.com</p>
            <button class="btn btn-purple w-100 mb-3" type="button" data-bs-toggle="collapse" data-bs-target="#composeForm" aria-expanded="false" aria-controls="composeForm">
              NEW MAIL
            </button>
            <a href="#" class="d-block mb-3">Inbox</a>
            <a href="#" class="d-block mb-3" data-bs-toggle="collapse" data-bs-target="#allMails" aria-expanded="false" aria-controls="allMails">All Mail</a>
            <a href="#" class="d-block mb-3">Sent</a>
            <a href="#" class="d-block mb-3">Draft</a>
            <a href="#" class="d-block mb-3">Trash</a>
            <a href="#" class="d-block mb-3">Important</a>
            <a href="#" class="d-block mb-3">Starred</a>
            <a href="#" class="d-block mb-3">Unread</a>
          </div>

          <!-- Inbox -->
          <div class="col-md-4 email-inbox">
            <h5 class="mb-3">Inbox</h5>
            <div class="email-item">
              <img src="https://via.placeholder.com/40" alt="Avatar">
              <div>
                <p><strong>Hileri Makr</strong> (20 Aug 2018)</p>
                <p class="text-muted">Mattis luctus. Donec nisi diam.</p>
              </div>
            </div>
            <div class="email-item">
              <img src="https://via.placeholder.com/40" alt="Avatar">
              <div>
                <p><strong>Lion Lorpa</strong> (02 Jun 2016)</p>
                <p class="text-muted">Mattis luctus. Donec nisi diam.</p>
              </div>
            </div>
            <div class="email-item">
              <img src="https://via.placeholder.com/40" alt="Avatar">
              <div>
                <p><strong>Solvn Relto</strong> (25 July 2015)</p>
                <p class="text-muted">Mattis luctus. Donec nisi diam.</p>
              </div>
            </div>
          </div>
            <div class="col-md-5 collapse" id="allMails">
              <h5>All Mails</h5>
              <p>Lorem ipsum dolor sit amet.</p>
            </div>
          <!-- Compose Mail Form -->
          <div class="col-md-5 collapse" id="composeForm">
            <h5>New Message</h5>
            <form>
              <div class="mb-3">
                <label for="emailTo" class="form-label">To</label>
                <input type="email" class="form-control users-list" id="" name='users-list-tags' value='abatisse2@nih.gov, Justinian Hattersley' autofocus>
              </div>
              <div class="mb-3">
                <label for="emailSubject" class="form-label">Subject</label>
                <input type="text" class="form-control" id="emailSubject" placeholder="Enter subject">
              </div>
              <div class="mb-3">
                <label for="emailMessage" class="form-label">Message</label>
                <textarea class="form-control" id="emailMessage" rows="5" placeholder="Enter your message"></textarea>
              </div>
              <button type="submit" class="btn btn-success">Send</button>
            </form>
          </div>
        </div>
  </div>
</div>
</div>
</div>

</x-layouts.admin-app>