<x-layouts.admin-app>
  @section('styles')
  <link rel="stylesheet" href="{{asset('adminAssets/css/tagify.css')}}">
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
  <style>
.email table {
	font-weight: 600;
}

.email table a {
	color: #666;
}

.email table tr.read > td {
	background-color: #f6f6f6;
}

.email table tr.read > td {
	font-weight: 400;
}

.email table tr td > i.fa {
	font-size: 1.2em;
	line-height: 1.5em;
	text-align: center;
}

.email table tr td > i.fa-star {
	color: #f39c12;
}

.email table tr td > i.fa-bookmark {
	color: #e74c3c;
}

.email table tr > td.action {
	padding-left: 0px;
	padding-right: 2px;
}

.grid {
    position: relative;
    width: 100%;
    background: #fff;
    color: #666666;
    border-radius: 2px;
    margin-bottom: 25px;
    box-shadow: 0px 1px 4px rgba(0, 0, 0, 0.1);
}



.grid .grid-header:after {
    clear: both;
}

.grid .grid-header span,
.grid .grid-header > .fa {
    display: inline-block;
    margin: 0;
    font-weight: 300;
    font-size: 1.5em;
    float: left;
}

.grid .grid-header span {
    padding: 0 5px;
}

.grid .grid-header > .fa {
    padding: 5px 10px 0 0;
}

.grid .grid-header > .grid-tools {
    padding: 4px 10px;
}

.grid .grid-header > .grid-tools a {
    color: #999999;
    padding-left: 10px;
    cursor: pointer;
}

.grid .grid-header > .grid-tools a:hover {
    color: #666666;
}

.grid .grid-body {
    padding: 15px 20px 15px 20px;
    font-size: 0.9em;
    line-height: 1.9em;
}

.grid .full {
    padding: 0 !important;
}

.grid .transparent {
    box-shadow: none !important;
    margin: 0px !important;
    border-radius: 0px !important;
}

.grid.top.black > .grid-header {
    border-top-color: #000000 !important;
}

.grid.bottom.black > .grid-body {
    border-bottom-color: #000000 !important;
}

.grid.top.blue > .grid-header {
    border-top-color: #007be9 !important;
}

.grid.bottom.blue > .grid-body {
    border-bottom-color: #007be9 !important;
}

.grid.top.green > .grid-header {
    border-top-color: #00c273 !important;
}

.grid.bottom.green > .grid-body {
    border-bottom-color: #00c273 !important;
}

.grid.top.purple > .grid-header {
    border-top-color: #a700d3 !important;
}

.grid.bottom.purple > .grid-body {
    border-bottom-color: #a700d3 !important;
}

.grid.top.red > .grid-header {
    border-top-color: #dc1200 !important;
}

.grid.bottom.red > .grid-body {
    border-bottom-color: #dc1200 !important;
}

.grid.top.orange > .grid-header {
    border-top-color: #f46100 !important;
}

.grid.bottom.orange > .grid-body {
    border-bottom-color: #f46100 !important;
}

.grid.no-border > .grid-header {
    border-bottom: 0px !important;
}

.grid.top > .grid-header {
    border-top-width: 4px !important;
    border-top-style: solid !important;
}

.grid.bottom > .grid-body {
    border-bottom-width: 4px !important;
    border-bottom-style: solid !important;
}
  </style>
  @endsection
  @section('scripts')
  <script src="{{asset('adminAssets/js/popper.min.js')}}"></script>
  <script src="{{asset('adminAssets/js/bootstrap.min.js')}}"></script>
  <script src="{{asset('adminAssets/js/tagify.js')}}"></script>
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
  <div class="container">
<div class="row">
	<!-- BEGIN INBOX -->
	<div class="col-md-12">
		<div class="grid email">
			<div class="grid-body">
				<div class="row">
					<!-- BEGIN INBOX MENU -->
					<div class="col-md-3">
						<h2 class="grid-title"><i class="fa fa-inbox"></i> Inbox</h2>
						<a class="btn btn-block btn-primary" data-toggle="modal" data-target="#compose-modal"><i class="fa fa-pencil"></i>&nbsp;&nbsp;NEW MESSAGE</a>

						<hr>

						  <div>
						  	<div class="nav nav-pills flex-column">
						  		<div class="header">Folders</div>
						  		<a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true"><i class="fa fa-inbox"></i> Inbox (14)</a>
						  		<a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false"><i class="fa fa-star"></i> Starred</a>
						  		<a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false"><i class="fa fa-bookmark"></i> Important</a>
						  		<a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false"><i class="fa fa-mail-forward"></i> Sent</a>
						  		<a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false"><i class="fa fa-pencil-square-o"></i> Drafts</a>
						  		<a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false"><i class="fa fa-folder"></i> Spam (217)</a>
              </div>
						</div>
					</div>
					<!-- END INBOX MENU -->
					
					<!-- BEGIN INBOX CONTENT -->
					<div class="col-md-9">
						<div class="row">
							<div class="col-sm-6">
								<label style="margin-right: 8px;" class="">
									<div class="icheckbox_square-blue" style="position: relative;"><input type="checkbox" id="check-all" class="icheck" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"><ins class="iCheck-helper" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div>
								</label>
								<div class="btn-group">
                  <div class="dropdown">
                      <a href="#" class="btn bt btn-light dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          Action<i class="las la-angle-down ms-1"></i>
                      </a>
                      <div class="dropdown-menu dropdown-menu-end">
                          <a class="dropdown-item" href="#">Mark as read</a>
                          <a class="dropdown-item" href="#">Mark as unread</a>
                          <a class="dropdown-item" href="#">Mark as important</a>
                          <div class="dropdown-divider"></div>
                          <a class="dropdown-item" href="#">Report spam</a>
                          <a class="dropdown-item" href="#">Delete</a>
                      </div>
                  </div>  
								</div>
							</div>

							<div class="col-md-6 search-form">
								<form action="#" class="text-right">
									<div class="input-group">
										<input type="text" class="form-control input-sm" placeholder="Search" aria-describedby="button-search">
                    <button type="submit" name="search" class="btn btn-primary search" id="button-search"><i class="fa fa-search"></i></button>
									</div>			 
								</form>
							</div>
						</div>
						
						<div class="padding"></div>
						
						<div class="table-responsive">
							<table class="table">
								<tbody><tr>
									<td class="action"><input type="checkbox" /></td>
									<td class="action"><i class="fa fa-star-o"></i></td>
									<td class="action"><i class="fa fa-bookmark-o"></i></td>
									<td class="name"><a href="#">Larry Gardner</a></td>
									<td class="subject"><a href="#">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed </a></td>
									<td class="time">08:30 PM</td>
								</tr>
								<tr>
									<td class="action"><input type="checkbox" /></td>
									<td class="action"><i class="fa fa-star-o"></i></td>
									<td class="action"><i class="fa fa-bookmark"></i></td>
									<td class="name"><a href="#">Larry Gardner</a></td>
									<td class="subject"><a href="#">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed </a></td>
									<td class="time">08:30 PM</td>
								</tr>
								<tr class="read">
<td class="action"><input type="checkbox" /></td>
									<td class="action"><i class="fa fa-star"></i></td>
									<td class="action"><i class="fa fa-bookmark"></i></td>
									<td class="name"><a href="#">Larry Gardner</a></td>
									<td class="subject"><a href="#">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed </a></td>
									<td class="time">08:30 PM</td>
								</tr>
								<tr>
									<td class="action"><input type="checkbox" /></td>
									<td class="action"><i class="fa fa-star-o"></i></td>
									<td class="action"><i class="fa fa-bookmark-o"></i></td>
									<td class="name"><a href="#">Larry Gardner</a></td>
									<td class="subject"><a href="#">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed </a></td>
									<td class="time">08:30 PM</td>
								</tr>
								<tr class="read">
									<td class="action"><input type="checkbox" /></td>
									<td class="action"><i class="fa fa-star-o"></i></td>
									<td class="action"><i class="fa fa-bookmark-o"></i></td>
									<td class="name"><a href="#">Larry Gardner</a></td>
									<td class="subject"><a href="#">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed </a></td>
									<td class="time">08:30 PM</td>
								</tr>
								<tr class="read">
                                    <td class="action"><input type="checkbox" /></td>
									<td class="action"><i class="fa fa-star-o"></i></td>
									<td class="action"><i class="fa fa-bookmark"></i></td>
									<td class="name"><a href="#">Larry Gardner</a></td>
									<td class="subject"><a href="#">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed </a></td>
									<td class="time">08:30 PM</td>
								</tr>
								<tr>
                                    <td class="action"><input type="checkbox" /></td>
									<td class="action"><i class="fa fa-star"></i></td>
									<td class="action"><i class="fa fa-bookmark-o"></i></td>
									<td class="name"><a href="#">Larry Gardner</a></td>
									<td class="subject"><a href="#">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed </a></td>
									<td class="time">08:30 PM</td>
								</tr>
								<tr>
									<td class="action"><input type="checkbox" /></td>
									<td class="action"><i class="fa fa-star-o"></i></td>
									<td class="action"><i class="fa fa-bookmark-o"></i></td>
									<td class="name"><a href="#">Larry Gardner</a></td>
									<td class="subject"><a href="#">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed </a></td>
									<td class="time">08:30 PM</td>
								</tr>
								<tr class="read">
									<td class="action"><input type="checkbox" /></td>
									<td class="action"><i class="fa fa-star"></i></td>
									<td class="action"><i class="fa fa-bookmark"></i></td>
									<td class="name"><a href="#">Larry Gardner</a></td>
									<td class="subject"><a href="#">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed </a></td>
									<td class="time">08:30 PM</td>
								</tr>
								<tr>
									<td class="action"><input type="checkbox" /></td>
									<td class="action"><i class="fa fa-star"></i></td>
									<td class="action"><i class="fa fa-bookmark-o"></i></td>
									<td class="name"><a href="#">Larry Gardner</a></td>
									<td class="subject"><a href="#">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed </a></td>
									<td class="time">08:30 PM</td>
								</tr>
							</tbody></table>
						</div>

						<ul class="pagination">
							<li class="page-item disabled"><a class="page-link" href="#">«</a></li>
							<li class="page-item active"><a class="page-link" href="#">1</a></li>
							<li class="page-item"><a class="page-link" href="#">2</a></li>
							<li class="page-item"><a class="page-link" href="#">3</a></li>
							<li class="page-item"><a class="page-link" href="#">4</a></li>
							<li class="page-item"><a class="page-link" href="#">5</a></li>
							<li class="page-item"><a class="page-link" href="#">»</a></li>
						</ul>						
					</div>
					<!-- END INBOX CONTENT -->
					
				</div>
			</div>
		</div>
	</div>
	<!-- END INBOX -->
</div>
</div>

					<!-- BEGIN COMPOSE MESSAGE -->
					<div class="modal fade" id="compose-modal" tabindex="-1" role="dialog" aria-hidden="true">
						<div class="modal-wrapper">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header bg-blue">
										<h4 class="modal-title"><i class="fa fa-envelope"></i> Compose New Message</h4>
                    <button type="button" class="btn-close btn-close-white" data-dismiss="modal" aria-hidden="true"></button>

									</div>
									<form action="#" method="post">
										<div class="modal-body">
										<div class="row g-3 ">
											<div class="form-group col-md-12">
												<input name="to" type="email" class="form-control" placeholder="To">
											</div>
											<div class="form-group col-md-6">
												<input name="cc" type="email" class="form-control" placeholder="Cc">
											</div>
											<div class="form-group col-md-6">
												<input name="bcc" type="email" class="form-control" placeholder="Bcc">
											</div>
											<div class="form-group col-md-12">
												<input name="subject" type="email" class="form-control" placeholder="Subject">
											</div>
											<div class="form-group col-md-12">
												<textarea name="message" id="email_message" class="form-control" placeholder="Message" style="height: 120px;"></textarea>
											</div>
											<div class="form-group">
                        <input type="file" name="a-ttachment" class="form-control" id="formFile">
											</div>
										</div>
										</div>
							
										<div class="modal-footer">
											<button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Discard</button>
											<button type="submit" class="btn btn-primary pull-right"><i class="fa fa-envelope"></i> Send Message</button>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
					<!-- END COMPOSE MESSAGE -->
</x-layouts.admin-app>