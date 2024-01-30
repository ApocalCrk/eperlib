@extends('user.slicing.index')

@section('title', 'Profil')

@section('content')
<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
        <div class="card">
            <div class="card-body">
                <div class="user-avatar-section">
                    <div class="d-flex align-items-center flex-column">
                        <img class="img-fluid rounded mt-3 mb-2" src="/storage/{{ Auth::user()->avatar }}" height="110" width="110" alt="User avatar" onclick="updateAvatar()">
                        <div class="user-info text-center">
                            <h4>{{ Auth::user()->nama }}</h4>
                            <span class="badge bg-light-secondary">{{ Auth::user()->npm }}</span>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-around my-2 pt-75">
                    <div class="d-flex align-items-start me-2">
                        <span class="badge bg-light-danger p-75 rounded">
                            <i data-feather="heart" class="font-medium-2"></i>
                        </span>
                        <div class="ms-75">
                            <h4 class="mb-0">{{ $count_disukai }}</h4>
                            <small>Likes</small>
                        </div>
                    </div>
                    <div class="d-flex align-items-start">
                        <span class="badge bg-light-primary p-75 rounded">
                            <i data-feather="bookmark" class="font-medium-2"></i>
                        </span>
                        <div class="ms-75">
                            <h4 class="mb-0">{{ $count_bookmark }}</h4>
                            <small>Bookmarks</small>
                        </div>
                    </div>
                </div>
                <h4 class="fw-bolder border-bottom pb-50 mb-1">Details</h4>
                <div class="info-container">
                    <ul class="list-unstyled">
                        <li class="mb-75 d-flex justify-content-between">
                            <span class="fw-bolder me-25">NPM</span>
                            <span>{{ Auth::user()->npm }}</span>
                        </li>
                        <li class="mb-75 d-flex justify-content-between">
                            <span class="fw-bolder me-25">Nama</span>
                            <span>{{ Auth::user()->nama }}</span>
                        </li>
                        <li class="mb-75 d-flex justify-content-between">
                            <span class="fw-bolder me-25">Email</span>
                            <span>{{ Auth::user()->email }}</span>
                        </li>
                        <li class="mb-75 d-flex justify-content-between">
                            <span class="fw-bolder me-25">Fakultas</span>
                            <span>{{ Auth::user()->fakultas }}</span>
                        </li>
                        <li class="mb-75 d-flex justify-content-between">
                            <span class="fw-bolder me-25">Program Studi</span>
                            <span>{{ Auth::user()->program_studi }}</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function updateAvatar() {
    Swal.fire({
        title: 'Update Avatar',
        html: '<form id="avatarForm" enctype="multipart/form-data"><input type="file" name="avatar" class="form-control" accept="image/*"></form>',
        showCancelButton: true,
        confirmButtonText: 'Update',
        preConfirm: () => {
            const formData = new FormData();
            formData.append('_token', "{{ csrf_token() }}");
            formData.append('avatar', document.querySelector('input[name="avatar"]').files[0]);
            return fetch(`/user/profil/update-avatar`, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error(response.statusText)
                }
                return response.json()
            })
            .catch(error => {
                Swal.showValidationMessage(
                    `Request failed: ${error}`
                )
            })
        },
        allowOutsideClick: () => !Swal.isLoading()
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire({
                title: 'Berhasil',
                text: 'Avatar berhasil diupdate',
                icon: 'success',
                confirmButtonText: 'OK'
            }).then((result) => {
                if (result.isConfirmed) {
                    location.reload();
                }
            })
        }
    })
}

</script>
@endsection