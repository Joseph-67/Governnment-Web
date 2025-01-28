<x-layouts.admin-app>
@section('PageTitle', 'Notification')
@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tagify/4.33.0/tagify.min.css">
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
  <style>
    .email table {
        font-weight: 600;
    }

    .email table a {
        color: #666;
    }

    .email table tr.read>td {
        background-color: #f6f6f6;
    }

    .email table tr.read>td {
        font-weight: 400;
    }

    .email table tr td>i.fa {
        font-size: 1.2em;
        line-height: 1.5em;
        text-align: center;
    }

    .email table tr td>i.fa-star {
        color: #f39c12;
    }

    .email table tr td>i.fa-bookmark {
        color: #e74c3c;
    }

    .email table tr>td.action {
        padding-left: 0px;
        padding-right: 2px;
    }



    .tagify{    
    width: 100%;
    max-width: 700px;
    background: rgba(white, .8);
}

:root {
    --tagify-dd-item-pad: .5em .7em;
}

.tagify__dropdown.users-list .tagify__dropdown__item{
    display: grid;
    grid-template-columns: auto 1fr;
    gap: 0 1em;
    grid-template-areas: "avatar name"
                        "avatar email";
}

.tagify__dropdown.users-list header.tagify__dropdown__item{
    grid-template-areas: "add remove-tags"
                        "remaning .";
}

.tagify__dropdown.users-list .tagify__dropdown__item:hover .tagify__dropdown__item__avatar-wrap{
    transform: scale(1.2);
}

.tagify__dropdown.users-list .tagify__dropdown__item__avatar-wrap{
    grid-area: avatar;
    width: 36px;
    height: 36px;
    border-radius: 50%;
    overflow: hidden;
    background: #EEE;
    transition: .1s ease-out;
}

.tagify__dropdown.users-list img{
    width: 100%;
    vertical-align: top;
}

.tagify__dropdown.users-list header.tagify__dropdown__item > div,
.tagify__dropdown.users-list .tagify__dropdown__item strong{
    grid-area: name;
    width: 100%;
    align-self: center;
}

.tagify__dropdown.users-list span{
    grid-area: email;
    width: 100%;
    font-size: .9em;
    opacity: .6;
}

.tagify__dropdown.users-list .tagify__dropdown__item__addAll{
    border-bottom: 1px solid #DDD;
    gap: 0;
}

.tagify__dropdown.users-list .remove-all-tags{
    grid-area: remove-tags;
    justify-self: self-end;
    font-size: .8em;
    padding: .2em .3em;
    border-radius: 3px;
    user-select: none;
}

.tagify__dropdown.users-list .remove-all-tags:hover{
    color: white;
    background: salmon;
}


/* Tags items */
.tagify__tag{
    white-space: nowrap;
}

.tagify__tag img{
    width: 100%;
    vertical-align: top;
    pointer-events: none;
}


.tagify__tag:hover .tagify__tag__avatar-wrap{
    transform: scale(1.6) translateX(-10%);
}

.tagify__tag .tagify__tag__avatar-wrap{
    width: 16px;
    height: 16px;
    white-space: normal;
    border-radius: 50%;
    background: silver;
    margin-right: 5px;
    transition: .12s ease-out;
}

.users-list .tagify__dropdown__itemsGroup:empty{
    display: none;
}

.users-list .tagify__dropdown__itemsGroup::before{
    content: attr(data-title);
    display: inline-block;
    font-size: .9em;
    padding: 4px 6px;
    margin: var(--tagify-dd-item-pad);
    font-style: italic;
    border-radius: 4px;
    background: #00ce8d;
    color: white;
    font-weight: 600;
}

.users-list .tagify__dropdown__itemsGroup:not(:first-of-type){
    border-top: 1px solid #DDD;
}
</style>
@endsection
@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/tagify/4.17.8/tagify.min.js"></script>
<script>
    // work in the name of Jesus
    var inputElm = document.querySelector('input[name=recipients_email]');

    function tagTemplate(tagData){
        return `
            <tag title="${tagData.email}"
                    contenteditable='false'
                    spellcheck='false'
                    tabIndex="-1"
                    class="tagify__tag ${tagData.class ? tagData.class : ""}"
                    ${this.getAttributes(tagData)}>
                <x title='' class='tagify__tag__removeBtn' role='button' aria-label='remove tag'></x>
                <div>
                    <div class='tagify__tag__avatar-wrap'>
                        <img onerror="this.style.visibility='hidden'" src="${tagData.avatar}">
                    </div>
                    <span class='tagify__tag-text'>${tagData.name}</span>
                </div>
            </tag>
        `
    }

    function suggestionItemTemplate(tagData){
        return `
            <div ${this.getAttributes(tagData)}
                class='tagify__dropdown__item ${tagData.class ? tagData.class : ""}'
                tabindex="0"
                role="option">
                ${ tagData.avatar ? `
                    <div class='tagify__dropdown__item__avatar-wrap'>
                        <img onerror="this.style.visibility='hidden'" src="${tagData.avatar}">
                    </div>` : ''
                }
                <strong>${tagData.name}</strong>
                <span>${tagData.email}</span>
            </div>
        `
    }

    function dropdownHeaderTemplate(suggestions){
        return `
            <header data-selector='tagify-suggestions-header' class="${this.settings.classNames.dropdownItem} ${this.settings.classNames.dropdownItem}__addAll">
                <strong style='grid-area: add'>${this.value.length ? `Add Remaning` : 'Add All'}</strong>
                <span style='grid-area: remaning'>${suggestions.length} members</span>
                <a class='remove-all-tags'>Remove all</a>
            </header>
        `
    }

    // initialize Tagify on the above input node reference
    var tagify = new Tagify(inputElm, {
        tagTextProp: 'name', // very important since a custom template is used with this property as text
        // enforceWhitelist: true,
        skipInvalid: true, // do not remporarily add invalid tags
        dropdown: {
            closeOnSelect: false,
            enabled: 1, // Show suggestions after typing one character
            classname: 'users-list',
            searchKeys: ['name', 'email'],  // very important to set by which keys to search for suggesttions when typing
            position: "text", // Position suggestions relative to the cursor
            mapValueTo: "email", // Use email for selection
        },
        templates: {
            tag: tagTemplate,
            dropdownItem: suggestionItemTemplate,
            dropdownHeader: dropdownHeaderTemplate
        },
        whitelist: [],

        transformTag: (tagData, originalData) => {
            var {name, email} = parseFullValue(tagData.name)
            tagData.name = name
            tagData.email = email || tagData.email
        },

        validate({name, email}) {
            // when editing a tag, there will only be the "name" property which contains name + email (see 'transformTag' above)
            if( !email && name ) {
                var parsed = parseFullValue(name)
                name = parsed.name
                email = parsed.email
            }

            if( !name ) return "Missing name"
            if( !validateEmail(email) ) return "Invalid email"

            return true
        }
    })

    // The below code is printed as escaped, so please copy this function from:
    // https://github.com/yairEO/tagify/blob/master/src/parts/helpers.js#L89-L97
    function escapeHTML( s ){
        return typeof s == 'string' ? s
            .replace(/&/g, "&amp;")
            .replace(/</g, "&lt;")
            .replace(/>/g, "&gt;")
            .replace(/"/g, "&quot;")
            .replace(/`|'/g, "&#039;")
            : s;
    }

    // The below part is only if you want to split the users into groups, when rendering the suggestions list dropdown:
    // (since each user also has a 'role' property)
    tagify.dropdown.createListHTML = sugegstionsList  => {
        const rolesOfUsers = sugegstionsList.reduce((acc, suggestion) => {
            const role = suggestion.role || 'Not Assigned';

            if( !acc[role] )
                acc[role] = [suggestion]
            else
                acc[role].push(suggestion)

            return acc
        }, {})

        const getUsersSuggestionsHTML = roleUsers => roleUsers.map((suggestion, idx) => {
            if( typeof suggestion == 'string' || typeof suggestion == 'number' )
                suggestion = {value:suggestion}

            var value = tagify.dropdown.getMappedValue.call(tagify, suggestion)

            suggestion.value = value && typeof value == 'string' ? escapeHTML(value) : value

            return tagify.settings.templates.dropdownItem.apply(tagify, [suggestion]);
        }).join("")


        // assign the user to a group
        return Object.entries(rolesOfUsers).map(([role, roleUsers]) => {
            return `<div class="tagify__dropdown__itemsGroup" data-title="Role ${role}:">${getUsersSuggestionsHTML(roleUsers)}</div>`
        }).join("")
    }

    // Event listener for input typing
    tagify.on('input', async (e) => {
    const searchTerm = e.detail.value.trim(); // Get the input value
    if (searchTerm.length < 2) return; // Wait for at least 2 characters before fetching
    tagify.settings.whitelist.length = 0 
    tagify.loading(true).dropdown.hide.call(tagify)
    debounceTimer = setTimeout(async () => {
    try {
        tagify.loading(true).dropdown.hide()
        // Fetch suggestions from the API
        const url = new URL("{{ route('admins.details') }}");
        url.searchParams.append("query", searchTerm);
        console.log(url.toString());
        
        const response = await fetch(url.toString());
        const users = await response.json();
        console.log(users);

        if (!users || !Array.isArray(users.admin) || !Array.isArray(users.users)) {
            console.error('Unexpected API response structure:', users);
            return;
        }
        // Format the data to match Tagify's whitelist structure
        let formattedAdmins = users.admin.map(user => ({
            value: user.id,
            name: `${user.first_name} ${user.last_name}`,
            avatar: user.profile_photo_path || 'https://via.placeholder.com/80', // Default avatar if not provided
            email: user.email,
            role: 'admin'
        }));
        
        // console.log(formattedAdmins);
        
        let formattedUsers = users.users.map(user => ({
            value: user.id,
            name: `${user.first_name} ${user.last_name}`,
            avatar: user.profile_photo_path || 'https://via.placeholder.com/80',
            email: user.email,
            role: 'user'
        }));

        // Combine both admin and user lists
        let formattedData = formattedAdmins.concat(formattedUsers);
        console.log(formattedData);
        
        // Update Tagify's whitelist and show the dropdown
        tagify.settings.whitelist = formattedData;
        tagify.loading(false).dropdown.show.call(tagify, searchTerm)
    } catch (error) {
        console.error('Error fetching user data:', error);
        tagify.settings.whitelist = [];
        tagify.dropdown.show.call('Error fetching data. Try again later.');
    }
    }, 300); // Delay of 300ms
    });
    // attach events listeners
    tagify.on('dropdown:select', onSelectSuggestion) // allows selecting all the suggested (whitelist) items
        .on('edit:start', onEditStart)  // show custom text in the tag while in edit-mode

    function onSelectSuggestion(e){
        if( e.detail.event.target.matches('.remove-all-tags')) {
            tagify.removeAllTags()
        }

        // custom class from "dropdownHeaderTemplate"
        else if( e.detail.elm.classList.contains(`${tagify.settings.classNames.dropdownItem}__addAll`) )
            tagify.dropdown.selectAll();
    }

    function onEditStart({detail:{tag, data}}){
        tagify.setTagTextNode(tag, `${data.name} <${data.email}>`)
    }

    // https://stackoverflow.com/a/9204568/104380
    function validateEmail(email) {
        return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)
    }

    function parseFullValue(value) {
        // https://stackoverflow.com/a/11592042/104380
        var parts = value.split(/<(.*?)>/g),
            name = parts[0].trim(),
            email = parts[1]?.replace(/<(.*?)>/g, '').trim();

        return {name, email}
    }
    // work in the name of Jesus
</script>
<script src="{{asset('adminAssets/js/popper.min.js')}}"></script>
<script src="{{asset('adminAssets/js/bootstrap.min.js')}}"></script>

  @endsection
  <div class="container">
  <x-validation-errors class="alert" alert />
  @include('shared.feedback')
    <div class="row">
        <!-- BEGIN INBOX -->
        <div class="col-md-12">
            <div class="email card">
                <div class="card-body">
                    <div class="row">
                        <!-- BEGIN INBOX MENU -->
                        <div class="col-md-3">
                            <h2 class="card-title"><i class="fa fa-inbox"></i> Inbox</h2>
                            <a class="btn btn-block btn-primary" data-toggle="modal" data-target="#compose-modal"><i
                                    class="fa fa-pencil"></i>&nbsp;&nbsp;NEW MESSAGE</a>
                            <hr>

                            <div>
                                <div class="nav nav-pills flex-column">
                                    <div class="header">Folders</div>
                                    <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill"
                                        href="#v-pills-home" role="tab" aria-controls="v-pills-home"
                                        aria-selected="true"><i class="fa fa-inbox"></i> Inbox (14)</a>
                                    <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill"
                                        href="#v-pills-profile" role="tab" aria-controls="v-pills-profile"
                                        aria-selected="false"><i class="fa fa-star"></i> Starred</a>
                                    <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill"
                                        href="#v-pills-profile" role="tab" aria-controls="v-pills-profile"
                                        aria-selected="false"><i class="fa fa-bookmark"></i> Important</a>
                                    <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill"
                                        href="#v-pills-profile" role="tab" aria-controls="v-pills-profile"
                                        aria-selected="false"><i class="fa fa-mail-forward"></i> Sent</a>
                                    <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill"
                                        href="#v-pills-profile" role="tab" aria-controls="v-pills-profile"
                                        aria-selected="false"><i class="fa fa-pencil-square-o"></i> Drafts</a>
                                    <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill"
                                        href="#v-pills-profile" role="tab" aria-controls="v-pills-profile"
                                        aria-selected="false"><i class="fa fa-folder"></i> Spam (217)</a>
                                </div>
                            </div>
                        </div>
                        <!-- END INBOX MENU -->

                        <!-- BEGIN INBOX CONTENT -->
                        <div class="col-md-9">
                            <div class="row">
                                <div class="col-sm-6">
                                    <label style="margin-right: 8px;" class="">
                                        <div class="icheckbox_square-blue" style="position: relative;"><input
                                                type="checkbox" id="check-all" class="icheck"
                                                style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"><ins
                                                class="iCheck-helper"
                                                style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins>
                                        </div>
                                    </label>
                                    <div class="btn-group">
                                        <div class="dropdown">
                                            <a href="#" class="btn bt btn-light dropdown-toggle"
                                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
                                            <input type="text" class="form-control input-sm" placeholder="Search"
                                                aria-describedby="button-search">
                                            <button type="submit" name="search" class="btn btn-primary search"
                                                id="button-search"><i class="fa fa-search"></i></button>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <div class="padding"></div>

                            <div class="table-responsive">
                                <table class="table table-bordered mt-2 table-centered">
                                    <tbody>
                                        <tr>
                                            <td class="action"><input type="checkbox" /></td>
                                            <td class="action"><i class="fa fa-star-o"></i></td>
                                            <td class="action"><i class="fa fa-bookmark-o"></i></td>
                                            <td class="name"><a href="#">Larry Gardner</a></td>
                                            <td class="subject"><a href="#">Lorem ipsum dolor sit amet, consectetur
                                                    adipisicing elit, sed </a></td>
                                            <td class="time">08:30 PM</td>
                                        </tr>
                                        <tr>
                                            <td class="action"><input type="checkbox" /></td>
                                            <td class="action"><i class="fa fa-star-o"></i></td>
                                            <td class="action"><i class="fa fa-bookmark"></i></td>
                                            <td class="name"><a href="#">Larry Gardner</a></td>
                                            <td class="subject"><a href="#">Lorem ipsum dolor sit amet, consectetur
                                                    adipisicing elit, sed </a></td>
                                            <td class="time">08:30 PM</td>
                                        </tr>
                                        <tr class="read">
                                            <td class="action"><input type="checkbox" /></td>
                                            <td class="action"><i class="fa fa-star"></i></td>
                                            <td class="action"><i class="fa fa-bookmark"></i></td>
                                            <td class="name"><a href="#">Larry Gardner</a></td>
                                            <td class="subject"><a href="#">Lorem ipsum dolor sit amet, consectetur
                                                    adipisicing elit, sed </a></td>
                                            <td class="time">08:30 PM</td>
                                        </tr>
                                        <tr>
                                            <td class="action"><input type="checkbox" /></td>
                                            <td class="action"><i class="fa fa-star-o"></i></td>
                                            <td class="action"><i class="fa fa-bookmark-o"></i></td>
                                            <td class="name"><a href="#">Larry Gardner</a></td>
                                            <td class="subject"><a href="#">Lorem ipsum dolor sit amet, consectetur
                                                    adipisicing elit, sed </a></td>
                                            <td class="time">08:30 PM</td>
                                        </tr>
                                        <tr class="read">
                                            <td class="action"><input type="checkbox" /></td>
                                            <td class="action"><i class="fa fa-star-o"></i></td>
                                            <td class="action"><i class="fa fa-bookmark-o"></i></td>
                                            <td class="name"><a href="#">Larry Gardner</a></td>
                                            <td class="subject"><a href="#">Lorem ipsum dolor sit amet, consectetur
                                                    adipisicing elit, sed </a></td>
                                            <td class="time">08:30 PM</td>
                                        </tr>
                                        <tr class="read">
                                            <td class="action"><input type="checkbox" /></td>
                                            <td class="action"><i class="fa fa-star-o"></i></td>
                                            <td class="action"><i class="fa fa-bookmark"></i></td>
                                            <td class="name"><a href="#">Larry Gardner</a></td>
                                            <td class="subject"><a href="#">Lorem ipsum dolor sit amet, consectetur
                                                    adipisicing elit, sed </a></td>
                                            <td class="time">08:30 PM</td>
                                        </tr>
                                        <tr>
                                            <td class="action"><input type="checkbox" /></td>
                                            <td class="action"><i class="fa fa-star"></i></td>
                                            <td class="action"><i class="fa fa-bookmark-o"></i></td>
                                            <td class="name"><a href="#">Larry Gardner</a></td>
                                            <td class="subject"><a href="#">Lorem ipsum dolor sit amet, consectetur
                                                    adipisicing elit, sed </a></td>
                                            <td class="time">08:30 PM</td>
                                        </tr>
                                        <tr>
                                            <td class="action"><input type="checkbox" /></td>
                                            <td class="action"><i class="fa fa-star-o"></i></td>
                                            <td class="action"><i class="fa fa-bookmark-o"></i></td>
                                            <td class="name"><a href="#">Larry Gardner</a></td>
                                            <td class="subject"><a href="#">Lorem ipsum dolor sit amet, consectetur
                                                    adipisicing elit, sed </a></td>
                                            <td class="time">08:30 PM</td>
                                        </tr>
                                        <tr class="read">
                                            <td class="action"><input type="checkbox" /></td>
                                            <td class="action"><i class="fa fa-star"></i></td>
                                            <td class="action"><i class="fa fa-bookmark"></i></td>
                                            <td class="name"><a href="#">Larry Gardner</a></td>
                                            <td class="subject"><a href="#">Lorem ipsum dolor sit amet, consectetur
                                                    adipisicing elit, sed </a></td>
                                            <td class="time">08:30 PM</td>
                                        </tr>
                                        <tr>
                                            <td class="action"><input type="checkbox" /></td>
                                            <td class="action"><i class="fa fa-star"></i></td>
                                            <td class="action"><i class="fa fa-bookmark-o"></i></td>
                                            <td class="name"><a href="#">Larry Gardner</a></td>
                                            <td class="subject"><a href="#">Lorem ipsum dolor sit amet, consectetur
                                                    adipisicing elit, sed </a></td>
                                            <td class="time">08:30 PM</td>
                                        </tr>
                                    </tbody>
                                </table>
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
                <div class="modal-header bg-black">
                    <h4 class="modal-title"><i class="fa fa-envelope"></i> Compose New Message</h4>
                    <button type="button" class="btn-close btn-close-white" data-dismiss="modal"
                        aria-hidden="true"></button>
                </div>
                <form action="{{route('display-message')}}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="row g-3 ">
                            <div class="form-group col-md-12">
                                <input name="recipients_email" type="text" class="form-control" placeholder="To" id="user-selector">
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
                                <textarea name="message" id="email_message" class="form-control" placeholder="Message"
                                    style="height: 120px;"></textarea>
                            </div>
                            <div class="form-group">
                                <input type="file" name="a-ttachment" class="form-control" id="formFile">
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i>
                            Discard</button>
                        <button type="submit" class="btn btn-primary pull-right"><i class="fa fa-envelope"></i> Send
                            Message</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- END COMPOSE MESSAGE -->
</x-layouts.admin-app>