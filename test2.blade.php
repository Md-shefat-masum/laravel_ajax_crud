<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container">
        <div class="card my-2">
            <div class="card-body">
                <div id="all_data"></div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="userDetailsModal" tabindex="-1" aria-labelledby="userDetailsModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="userDetailsModalLabel">User Management</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="user_details"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <hr>

    <hr>
    <button onclick="create_user()">Create User</button>

    <script>
        const myModalAlternative = new bootstrap.Modal('#userDetailsModal', {})

        function all_user() {
            fetch('/user')
                .then(res => res.text())
                .then(function(data) {
                    all_data.innerHTML = data;
                });
        }
        all_user();

        function show_data(id) {
            fetch(`/user/${id}`)
                .then(res => res.text())
                .then(data => {
                    user_details.innerHTML = data;
                    myModalAlternative.show();
                })

        }

        function create_user() {
            fetch(`/create-user`)
                .then(res => res.text())
                .then(data => {
                    user_details.innerHTML = data;
                    myModalAlternative.show();
                });
        }

        function show_edit_form(id) {
            fetch(`/edit-user/${id}`)
                .then(res => res.text())
                .then(data => {
                    user_details.innerHTML = data;
                    myModalAlternative.show();
                });
        }

        function store_user() {
            event.preventDefault();
            let formData = new FormData(event.target);
            fetch(`/user`, {
                    method: 'POST',
                    body: formData,
                })
                .then(res => res.json())
                .then(data => {
                    show_data(data.id);
                    all_user();
                })
        }

        function edit_user(id) {
            event.preventDefault();
            let formData = new FormData(event.target);
            fetch(`/user/${id}`, {
                    method: 'POST',
                    body: formData,
                })
                .then(res => res.json())
                .then(data => {
                    show_data(data.id);
                    all_user();
                })
        }

        function delete_data(id) {
            event.preventDefault();
            fetch(`/user/${id}/delete`, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('[name="csrf-token"]').content
                    }
                })
                .then(res => res.json())
                .then(data => {
                    all_user();
                })
        }
    </script>
</body>

</html>
