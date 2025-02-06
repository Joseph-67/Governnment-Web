<x-layouts.admin-app>
    @section('PageTitle', 'Notification')
    @section('styles')
    <link href="{{asset('adminAssets/css/toastify.css')}}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{asset('adminAssets/libs/quill/quill.snow.css')}}">
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



        .tagify {
            width: 100%;
            max-width: 700px;
            background: rgba(white, .8);
        }

        :root {
            --tagify-dd-item-pad: .5em .7em;
        }

        .tagify__dropdown.users-list .tagify__dropdown__item {
            display: grid;
            grid-template-columns: auto 1fr;
            gap: 0 1em;
            grid-template-areas: "avatar name"
                "avatar email";
        }

        .tagify__dropdown.users-list header.tagify__dropdown__item {
            grid-template-areas: "add remove-tags"
                "remaning .";
        }

        .tagify__dropdown.users-list .tagify__dropdown__item:hover .tagify__dropdown__item__avatar-wrap {
            transform: scale(1.2);
        }

        .tagify__dropdown.users-list .tagify__dropdown__item__avatar-wrap {
            grid-area: avatar;
            width: 36px;
            height: 36px;
            border-radius: 50%;
            overflow: hidden;
            background: #EEE;
            transition: .1s ease-out;
        }

        .tagify__dropdown.users-list img {
            width: 100%;
            vertical-align: top;
        }

        .tagify__dropdown.users-list header.tagify__dropdown__item>div,
        .tagify__dropdown.users-list .tagify__dropdown__item strong {
            grid-area: name;
            width: 100%;
            align-self: center;
        }

        .tagify__dropdown.users-list span {
            grid-area: email;
            width: 100%;
            font-size: .9em;
            opacity: .6;
        }

        .tagify__dropdown.users-list .tagify__dropdown__item__addAll {
            border-bottom: 1px solid #DDD;
            gap: 0;
        }

        .tagify__dropdown.users-list .remove-all-tags {
            grid-area: remove-tags;
            justify-self: self-end;
            font-size: .8em;
            padding: .2em .3em;
            border-radius: 3px;
            user-select: none;
        }

        .tagify__dropdown.users-list .remove-all-tags:hover {
            color: white;
            background: salmon;
        }


        /* Tags items */
        .tagify__tag {
            white-space: nowrap;
        }

        .tagify__tag img {
            width: 100%;
            vertical-align: top;
            pointer-events: none;
        }


        .tagify__tag:hover .tagify__tag__avatar-wrap {
            transform: scale(1.6) translateX(-10%);
        }

        .tagify__tag .tagify__tag__avatar-wrap {
            width: 16px;
            height: 16px;
            white-space: normal;
            border-radius: 50%;
            background: silver;
            margin-right: 5px;
            transition: .12s ease-out;
        }

        .users-list .tagify__dropdown__itemsGroup:empty {
            display: none;
        }

        .users-list .tagify__dropdown__itemsGroup::before {
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

        .users-list .tagify__dropdown__itemsGroup:not(:first-of-type) {
            border-top: 1px solid #DDD;
        }

        .chat-input {
            display: flex;
            flex-direction: column;
            justify-content: center;
            background-color: var(--bs-secondary-bg);
            border: var(--bs-border-width) solid var(--bs-border-color);
            width: auto;
            border-radius: 8px;
        }

        /* Adjust the size of the Quill editor container */
        .ql-container {
            height: 200px;
            /* Set desired height */
        }

        /* Optional: Adjust the editor content size */
        .ql-editor {
            font-size: 14px;
            /* Control text size */
        }

        /* .chat-input textarea {
        flex: 1;
        border: none;
        outline: none;
        resize: none;
        padding: 10px;
        font-size: 16px;
        border-radius: 10px;
    } */
        .chat-icons {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 2px 0px;
        }

        .chat-icons a {
            color: var(--bs-label-color);
            font-size: 20px;
            margin-left: 12px;
        }

        .chat-icons a:hover {
            color: #22c55e
        }

        input[type="file"] {
            display: none;
        }

        #captured-photos,
        .file-preview {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-top: 10px;
            max-width: 600px;
        }

        .photo-item,
        .file-item {
            position: relative;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 5px 10px;
            margin-bottom: 5px;
            background: var(--bs-card-bg);
            border-radius: 5px;
            border: 1px solid var(--bs-border-color);
        }

        .photo-item img {
            max-width: 100px;
            border-radius: 5px;
        }

        .remove-btn {
            cursor: pointer;
            color: red;
            font-weight: bold;
            margin-left: 10px;
        }
    </style>
    @endsection
    @section('scripts')
    <script src="{{asset('adminAssets/libs/quill/quill.js')}}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/tagify/4.17.8/tagify.min.js"></script>
    <script>
        // work in the name of Jesus
        var inputElm = document.querySelector('input[name=recipients_email]');

        function tagTemplate(tagData) {
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

        function suggestionItemTemplate(tagData) {
            return `
                <div ${this.getAttributes(tagData)}
                    class='tagify__dropdown__item ${tagData.class ? tagData.class : ""}'
                    tabindex="0"
                    role="option">
                    ${tagData.avatar ? `
                        <div class='tagify__dropdown__item__avatar-wrap'>
                            <img onerror="this.style.visibility='hidden'" src="${tagData.avatar}">
                        </div>` : ''
                }
                    <strong>${tagData.name}</strong>
                    <span>${tagData.email}</span>
                </div>
            `
        }

        function dropdownHeaderTemplate(suggestions) {
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
                var { name, email } = parseFullValue(tagData.name)
                tagData.name = name
                tagData.email = email || tagData.email
            },

            validate({ name, email }) {
                // when editing a tag, there will only be the "name" property which contains name + email (see 'transformTag' above)
                if (!email && name) {
                    var parsed = parseFullValue(name)
                    name = parsed.name
                    email = parsed.email
                }

                if (!name) return "Missing name"
                if (!validateEmail(email)) return "Invalid email"

                return true
            }
        });

        // The below code is printed as escaped, so please copy this function from:
        // https://github.com/yairEO/tagify/blob/master/src/parts/helpers.js#L89-L97
        function escapeHTML(s) {
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
        tagify.dropdown.createListHTML = sugegstionsList => {
            const rolesOfUsers = sugegstionsList.reduce((acc, suggestion) => {
                const role = suggestion.role || 'Not Assigned';

                if (!acc[role])
                    acc[role] = [suggestion]
                else
                    acc[role].push(suggestion)

                return acc
            }, {});

            const getUsersSuggestionsHTML = roleUsers => roleUsers.map((suggestion, idx) => {
                if (typeof suggestion == 'string' || typeof suggestion == 'number')
                    suggestion = { value: suggestion }

                var value = tagify.dropdown.getMappedValue.call(tagify, suggestion)

                suggestion.value = value && typeof value == 'string' ? escapeHTML(value) : value

                return tagify.settings.templates.dropdownItem.apply(tagify, [suggestion]);
            }).join("");


            // assign the user to a group
            return Object.entries(rolesOfUsers).map(([role, roleUsers]) => {
                return `<div class="tagify__dropdown__itemsGroup" data-title="Role ${role}:">${getUsersSuggestionsHTML(roleUsers)}</div>`
            }).join("");
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

        function onSelectSuggestion(e) {
            if (e.detail.event.target.matches('.remove-all-tags')) {
                tagify.removeAllTags()
            }

            // custom class from "dropdownHeaderTemplate"
            else if (e.detail.elm.classList.contains(`${tagify.settings.classNames.dropdownItem}__addAll`))
                tagify.dropdown.selectAll();
        }

        function onEditStart({ detail: { tag, data } }) {
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

            return { name, email }
        }
        // work in the name of Jesus
        let bccInput = document.querySelector("input[name='bcc']");
        let ccInput = document.querySelector("input[name='cc']");

        let tagifyBCC = new Tagify(bccInput, {
            pattern: /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/,
        });

        let tagifyCC = new Tagify(ccInput, {
            pattern: /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/,
        });


    </script>
    <script src="{{asset('adminAssets/js/popper.min.js')}}"></script>
    <script src="{{asset('adminAssets/js/bootstrap.min.js')}}"></script>
    <script>
        document.getElementById('file-input').addEventListener('change', function (event) {
            const filePreview = document.getElementById('file-preview');
            const files = event.target.files;
            for (let i = 0; i < files.length; i++) {
                const fileItem = document.createElement('div');
                fileItem.classList.add('file-item');
                fileItem.innerHTML = `${files[i].name} <span class="remove-btn">×</span>`;
                fileItem.querySelector('.remove-btn').addEventListener('click', function () {
                    fileItem.remove();
                });
                filePreview.appendChild(fileItem);
            }
            filePreview.style.display = 'block';
        });

        // camera trigger
        document.getElementById('camera-btn').addEventListener('click', async function () {
            const video = document.getElementById('camera-preview');
            const canvas = document.getElementById('camera-canvas');
            const context = canvas.getContext('2d');
            const capturedPhotos = document.getElementById('captured-photos');

            try {
                const stream = await navigator.mediaDevices.getUserMedia({ video: true });
                video.srcObject = stream;
                video.style.display = 'block';
                setTimeout(() => {
                    canvas.width = video.videoWidth;
                    canvas.height = video.videoHeight;
                    context.drawImage(video, 0, 0, canvas.width, canvas.height);
                    video.srcObject.getTracks().forEach(track => track.stop());
                    video.style.display = 'none';
                    const imageData = canvas.toDataURL('image/png');
                    const photoItem = document.createElement('div');
                    photoItem.classList.add('photo-item');
                    photoItem.innerHTML = `<img src="${imageData}" alt="Captured Photo"> <span class="remove-btn">×</span>`;
                    photoItem.querySelector('.remove-btn').addEventListener('click', function () {
                        photoItem.remove();
                    });
                    capturedPhotos.appendChild(photoItem);
                }, 3000);
            } catch (error) {
                console.error('Error accessing camera:', error);
            }
        });
        // end camera trigger
    </script>
    <script>
        // Full toolbar options
        const toolbarOptions = [
            // Basic formatting
            ['bold', 'italic', 'underline', 'strike'],       // Bold, italic, underline, strikethrough
            [{ 'header': 1 }, { 'header': 2 }],             // Header levels
            [{ 'font': [] }],                               // Font options

            // Text alignment and direction
            [{ 'align': [] }],                              // Text alignment
            [{ 'direction': 'rtl' }],                       // Text direction

            // Lists and indents
            [{ 'list': 'ordered' }, { 'list': 'bullet' }],  // Lists
            [{ 'indent': '-1' }, { 'indent': '+1' }],       // Indents

            // Subscript/superscript
            [{ 'script': 'sub' }, { 'script': 'super' }],   // Subscript/superscript

            // Colors and background
            [{ 'color': [] }, { 'background': [] }],        // Text and background colors

            // Embeds and links
            ['link', 'image', 'video'],                     // Links, images, videos

            // Headers and blockquote
            [{ 'header': [1, 2, 3, 4, 5, 6, false] }],      // Header dropdown
            ['blockquote', 'code-block'],                  // Blockquote and code block

            // Clear formatting
            ['clean'],                                      // Clear formatting
        ];

        // Initialize Quill editor
        const quill = new Quill('#editor', {
            theme: 'snow', // Snow theme
            modules: {
                toolbar: toolbarOptions, // Dynamically add toolbar options
            },
        });

        // Optional: Add image upload handler
        quill.getModule('toolbar').addHandler('image', function () {
            const input = document.createElement('input');
            input.setAttribute('type', 'file');
            input.setAttribute('accept', 'image/*');
            input.click();

            input.onchange = async () => {
                const file = input.files[0];
                if (file) {
                    const formData = new FormData();
                    formData.append('image', file);

                    // Replace this URL with your own image upload endpoint
                    const uploadURL = 'https://api.example.com/upload';

                    try {
                        const response = await fetch(uploadURL, {
                            method: 'POST',
                            body: formData,
                        });
                        const result = await response.json();
                        const imageUrl = result.url; // Assume the response contains the uploaded image URL
                        const range = quill.getSelection();
                        quill.insertEmbed(range.index, 'image', imageUrl);
                    } catch (error) {
                        console.error('Image upload failed:', error);
                        alert('Failed to upload image');
                    }
                }
            };
        });
    </script>

    <script type="text/javascript" src="{{asset('adminAssets/js/toastify.js')}}"></script>
    <script>
        let sendBtn = document.querySelector('#send-btn')
        let loadBtn = document.querySelector('#loading-btn')
        sendBtn.addEventListener('click', (e) => {
            sendBtn.classList.add('d-none');
            loadBtn.classList.remove('d-none')
            let recipients = document.querySelector('input[name="recipients_email"]');
            let subject = document.querySelector('input[name="subject"]');
            let bcc = document.querySelector('input[name="bcc"]');
            let cc = document.querySelector('input[name="cc"]');
            let message = quill.root.innerHTML;
            const files = document.getElementById('file-input').files;
            const images = Array.from(document.querySelectorAll('#captured-photos img')).map(img => img.src);

            try {
                // Validate and parse JSON inputs safely
                let recipientsData = recipients.value ? JSON.parse(recipients.value) : [];
                let bccData = bcc.value ? JSON.parse(bcc.value) : [];
                let ccData = cc.value ? JSON.parse(cc.value) : [];

                console.log('Recipients:', recipientsData);
                console.log('Subject:', subject.value);
                console.log('BCC:', bccData);
                console.log('CC:', ccData);
                console.log('Message:', message);
                console.log('Files:', files);
                console.log('Captured Images:', images);

                let url = "{{ route('send-mail') }}";
                let formData = new FormData();

                // Append data to FormData
                formData.append('recipients', JSON.stringify(recipientsData)); // Convert back to JSON string
                formData.append('bcc', JSON.stringify(bccData));
                formData.append('cc', JSON.stringify(ccData));
                formData.append('subject', subject.value);
                formData.append('message', message);

                // Append files
                for (let file of files) {
                    formData.append('files[]', file); // Use `files[]` for multiple files
                }

                // Append images (as Base64 strings)
                images.forEach((image, index) => {
                    formData.append(`images[${index}]`, image); // Use unique keys for each image
                });

                fetch_cycle('--Send mail', url, 'POST', formData).then(result => {
                    // let data = await result.json()
                    loadBtn.classList.add('d-none')
                    sendBtn.classList.remove('d-none');
                    console.log(result);
                    if (result.success) {
                        loader.style.display = 'none';
                    }
                });
            } catch (error) {
                console.error('Invalid JSON in input fields:', error.message);
            }
        });

        // end activate and deactivate start
        async function fetch_cycle(subject, url, method, form_data) {
            try {
                let response = await fetch(url, {
                    method: method,
                    headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}', },
                    credentials: 'same-origin',
                    body: form_data
                });

                let data = await response.json();

                // feedback
                if (data.status == 'success') {
                    Toastify({
                        text: data.message,
                        duration: 3000,
                        close: true,
                        gravity: "top", // `top` or `bottom`
                        position: "right", // `left`, `center` or `right`
                        stopOnFocus: true, // Prevents dismissing of toast on hover
                        style: {
                            background: "linear-gradient(to right, #00b09b, #96c93d)",
                        },
                    }).showToast();
                    return data
                } else if (data.status == 'error') {
                    console.log(data.errors);
                    for (let key in data.errors) {
                        Toastify({
                            text: data.errors[key],
                            duration: 3000,
                            close: true,
                            gravity: "top", // `top` or `bottom`
                            position: "right", // `left`, `center` or `right`
                            stopOnFocus: true, // Prevents dismissing of toast on hover
                            style: {
                                background: "linear-gradient(to right, #ff0000, #ff1745)",
                            },
                        }).showToast();
                    }
                }
                // end feedback
            } catch (error) {
                console.error('Fetch error:', error);
                Toastify({
                    text: "An unexpected error occurred.",
                    duration: 3000,
                    close: true,
                    gravity: "top",
                    position: "right",
                    stopOnFocus: true,
                    style: {
                        background: "linear-gradient(to right, #ff0000, #ff1745)",
                    },
                }).showToast();
            }
        }
    </script>
    <script>
    function changeTab(button) {
      // Change the active class
      document.querySelectorAll('.nav-link').forEach(link => link.classList.remove('active'));
      button.classList.add('active');

      // Update the tab title
      const tabTitle = document.getElementById('tab-title');
      const tabName = button.getAttribute('data-tab');
      tabTitle.innerHTML = `<i class="bi bi-folder"></i> ${tabName}`;
    }
  </script>
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
                                <h2 class="card-title" id="tab-title"><i class="fa fa-inbox"></i> Inbox</h2>
                                <a class="btn btn-block btn-primary" data-toggle="modal" data-target="#compose-modal"><i
                                        class="fa fa-pencil"></i>&nbsp;&nbsp;NEW MESSAGE</a>
                                <hr>

                                <div>
                                    <div class="nav nav-pills flex-column">
                                        <div class="header">Folders</div>
                                        <a class="nav-link active" data-bs-toggle="tab" href="#inbox" role="tab"
                                            aria-selected="true"  data-tab="Inbox" onclick="changeTab(this)"><i class="fa fa-inbox"></i> Inbox (14)</a>
                                        <a class="nav-link" data-bs-toggle="tab" href="#starred" role="tab"
                                            aria-selected="false" data-tab="Starred" onclick="changeTab(this)"><i class="fa fa-star"></i> Starred</a>
                                        <a class="nav-link" data-bs-toggle="tab" href="#important" role="tab"
                                            aria-selected="false" data-tab="Important" onclick="changeTab(this)"><i class="fa fa-bookmark"></i> Important</a>
                                        <a class="nav-link" data-bs-toggle="tab" href="#sent" role="tab"
                                            aria-selected="false"  data-tab="Sent" onclick="changeTab(this)"><i class="fa fa-mail-forward"></i> Sent</a>
                                        <a class="nav-link" data-bs-toggle="tab" href="#draft" role="tab"
                                            aria-selected="false" data-tab="Drafts" onclick="changeTab(this)"><i class="fa fa-pencil-square-o"></i> Drafts</a>
                                        <a class="nav-link" data-bs-toggle="tab" href="#spam" role="tab"
                                            aria-selected="false" data-tab="Spam" onclick="changeTab(this)"><i class="fa fa-folder"></i> Spam (217)</a>
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
                                                    data-bs-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
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
                <!-- inbox -->
                <div class="tab-content">
                    <div class="tab-pane active" id="inbox">
                    <div class="table-responsive">
                        <h5>INBOX</h5>
                    <table class="table table-bordered mt-2 table-centered">
    <tbody>
        @php $hasRecords = false; @endphp

        @foreach ($notifications as $notification)
            @php $hasRecords = true; @endphp
            <tr class="notification-row" data-id="{{ $notification->id }}">
                <td class="action"><input type="checkbox" /></td>
                <td class="action"><i class="fa fa-star-o"></i></td>
                <td class="action"><i class="fa fa-bookmark-o"></i></td>
                <td class="name"><a href="{{ route('admin.show-email', ['email' => encrypt($notification->id)]) }}">{{ $notification->data['sender_name'] ?? 'Unknown Sender' }}</a></td>                
                <td class="subject"><a href="#">{{ $notification->data['subject'] ?? 'No message available' }}</a></td>
                <td class="time">{{ \Carbon\Carbon::parse($notification->created_at)->format('h:i A') }}</td>
            </tr>
        @endforeach

        @if (!$hasRecords)
            <tr>
                <td colspan="6" class="text-center">No records found</td>
            </tr>
        @endif
    </tbody>
</table>

                            </div>
                    </div>
                    <div class="tab-pane" id="starred">
                        <h5>Starred Messages</h5>
                        <table class="table table-bordered mt-2 table-centered">
    <tbody>
    @php $hasRecords = false; @endphp

@foreach ($starredMessages as $starred)
    @php $hasRecords = true; @endphp
    <tr>
        <td class="action"><input type="checkbox" /></td>
        <td class="action"><i class="fa fa-star-o"></i></td>
        <td class="action"><i class="fa fa-bookmark-o"></i></td>
        <!-- Display Sender Name -->
        <td class="name">
            <a href="#">{{ $starred->data['sender_name'] ?? 'Unknown Sender' }}</a>
        </td>
        <!-- Display Message -->
        <td class="subject">
            <a href="#">{{ $starred->data['subject'] ?? 'No message available' }}</a>
        </td>
        <!-- Display the time of the message -->
        <td class="time">{{ $starred->created_at->format('h:i A') }}</td>
    </tr>
@endforeach

@if (!$hasRecords)
    <tr>
        <td colspan="6" class="text-center">No records found</td>
    </tr>
@endif
    </tbody>
</table>

                    </div>
                    <div class="tab-pane" id="important">
                        <h5>Important </h5>
                        <table class="table table-bordered mt-2 table-centered">
    <tbody>
        @php $hasRecords = false; @endphp

        @foreach ($importantMessages as $important)
            @php $hasRecords = true; @endphp
            <tr>
                <td class="action"><input type="checkbox" /></td>
                <td class="action"><i class="fa fa-star-o"></i></td>
                <td class="action"><i class="fa fa-bookmark-o"></i></td>
                <td class="name"><a href="#">{{ $important->data['sender'] ?? 'Unknown Sender' }}</a></td>
                <td class="subject"><a href="#">{{ $important->data['message'] ?? 'No message available' }}</a></td>
                <td class="time">{{ $important->created_at->format('h:i A') }}</td>
            </tr>
        @endforeach

        @if (!$hasRecords)
            <tr>
                <td colspan="6" class="text-center">No records found</td>
            </tr>
        @endif
    </tbody>
</table>

                    </div>
                    <div class="tab-pane" id="sent">
                        <h5>Sent</h5>
                        <table class="table table-bordered mt-2 table-centered">
    <tbody>
    @php $hasRecords = false; @endphp

@foreach ($sentMessages as $message)
    @php $hasRecords = true; @endphp
    <tr>
        <td class="action"><input type="checkbox" /></td>
        <td class="action"><i class="fa fa-star-o"></i></td>
        <td class="action"><i class="fa fa-bookmark-o"></i></td>
        <!-- Display Sender Name -->
        <td class="name">
            <a href="#">{{ $message->data['sender_name'] ?? 'Unknown Sender' }}</a>
        </td>
        <!-- Display Message -->
        <td class="subject">
            <a href="#">{{ $message->data['subject'] ?? 'No message available' }}</a>
        </td>
        <!-- Display the time of the message -->
        <td class="time">{{ $message->created_at->format('h:i A') }}</td>
    </tr>
@endforeach

@if (!$hasRecords)
    <tr>
        <td colspan="6" class="text-center">No records found</td>
    </tr>
@endif
    </tbody>
</table>

                    </div>
                    <div class="tab-pane" id="draft">
                        <h5>DRAFT</h5>
                        <table class="table table-bordered mt-2 table-centered">
    <tbody>
        @php $hasRecords = false; @endphp

        @foreach ($notifications as $notification)
            @php $hasRecords = true; @endphp
            <tr>
                <td class="action"><input type="checkbox" /></td>
                <td class="action"><i class="fa fa-star-o"></i></td>
                <td class="action"><i class="fa fa-bookmark-o"></i></td>
                <td class="name"><a href="#">{{ $notification->data['sender'] ?? 'Unknown Sender' }}</a></td>
                <td class="subject"><a href="#">{{ $notification->data['message'] ?? 'No message available' }}</a></td>
                <td class="time">{{ $notification->created_at->format('h:i A') }}</td>
            </tr>
        @endforeach

        @if (!$hasRecords)
            <tr>
                <td colspan="6" class="text-center">No records found</td>
            </tr>
        @endif
    </tbody>
</table>

                    </div>
                    <div class="tab-pane" id="spam">
                        <h5>Spam</h5>
                        <table class="table table-bordered mt-2 table-centered">
    <tbody>
        @php $hasRecords = false; @endphp

        @foreach ($notifications as $notification)
            @php $hasRecords = true; @endphp
            <tr>
                <td class="action"><input type="checkbox" /></td>
                <td class="action"><i class="fa fa-star-o"></i></td>
                <td class="action"><i class="fa fa-bookmark-o"></i></td>
                <td class="name"><a href="#">{{ $notification->data['sender'] ?? 'Unknown Sender' }}</a></td>
                <td class="subject"><a href="#">{{ $notification->data['message'] ?? 'No message available' }}</a></td>
                <td class="time">{{ $notification->created_at->format('h:i A') }}</td>
            </tr>
        @endforeach

        @if (!$hasRecords)
            <tr>
                <td colspan="6" class="text-center">No records found</td>
            </tr>
        @endif
    </tbody>
</table>

                    </div>
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
                        <!-- email view start -->
                    
                        <div class="col-12" id="detail-view" style="display:none;">
                        <div style=" border: 1px dashed #a5adc3; padding: 20px;">
                        <table class="body-wrap" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; width: 100%; background-color: transparent; margin: 0;" bgcolor="transparent">
                        <button id="back-button" class="back-button">Back</button>
                                <tr style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                    <td style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0;" valign="top"></td>
                                    <td class="container" width="600" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; display: block !important; max-width: 600px !important; clear: both !important; margin: 0 auto;" valign="top">
                                        <div class="content" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; max-width: 600px; display: block; margin: 0 auto; padding: 20px;">
                                            <table class="main" width="100%" cellpadding="0" cellspacing="0" itemprop="action" itemscope itemtype="http://schema.org/ConfirmAction" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; border-radius: 3px; background-color: transparent; margin: 0; border: 1px dashed #a5adc3;" bgcolor="#fff">
                        
                                                <tr style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                                    <td class="content-wrap" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 20px;" valign="top">
                                                        <meta itemprop="name" content="Confirm Email" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;" />
                                                        <table width="100%" cellpadding="0" cellspacing="0" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                                            <tbody id="detail-content">

                                                </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </table><!--end table-->                                                
                                        </div><!--end content-->
                                    </td>
                                    <td style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0;" valign="top"></td>
                                </tr>
                            </table><!--end table-->   
                        </div>
                        </div> <!--end col-->                                                       
                 
                        <!-- email view end -->
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
                    <form action="" method="post">
                        @csrf
                        <div class="modal-body">
                            <div class="row g-3 chat-box">
                                <div class="form-group col-md-12">
                                    <input name="recipients_email" type="text" class="form-control" placeholder="To"
                                        id="user-selector">
                                </div>
                                <div class="form-group col-md-6">
                                    <input name="cc" type="email" class="form-control" placeholder="Cc">
                                </div>
                                <div class="form-group col-md-6">
                                    <input name="bcc" type="email" class="form-control" placeholder="Bcc">
                                </div>
                                <div class="form-group col-md-12">
                                    <input name="subject" type="text" class="form-control" placeholder="Subject">
                                </div>
                                <div class="form-group">
                                    <div class="chat-input">
                                        <div id="editor"></div>
                                        <div class="chat-icons">
                                            <a href="#">
                                                <label for="">
                                                    <i class="iconoir-camera" title="Take Photo" id="camera-btn"></i>
                                                </label>
                                            </a>
                                            <a href="#">
                                                <label for="file-input">
                                                    <i class="iconoir-attachment" title="Attach File"></i>
                                                </label>
                                                <input type="file" id="file-input" multiple>
                                            </a>
                                            <a href="#"><i class="iconoir-microphone"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <video id="camera-preview" style="display:none;" autoplay></video>
                                <canvas id="camera-canvas" style="display:none;"></canvas>
                                <div id="captured-photos"></div>
                                <div class="file-preview" id="file-preview"></div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal"><i
                                    class="fa fa-times"></i>
                                Discard</button>
                            <button type="button" class="btn btn-primary pull-right" id="send-btn"><i
                                    class="fa fa-envelope"></i> Send
                                Message</button>
                            <button class="btn btn-primary d-none" id="loading-btn" type="button" disabled>
                                <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                Loading...
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- END COMPOSE MESSAGE -->
   
</x-layouts.admin-app>