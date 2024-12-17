<!-- Profile Dropdown Menu -->
<li class="nav-item dropdown">
    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
    <img src="{{ Auth::user()->profile_photo ? asset('storage/' . Auth::user()->profile_photo) : asset('default-avatar.png') }}"
         alt="{{ Auth::user()->name }}"
         class="user-image img-circle elevation-2" width="30" height="30">
    </a>


    <div class="dropdown-menu dropdown-menu-right">
        <!-- Profile Link -->
        <a href="#" class="dropdown-item" id="openProfileModal">
            <i class="fa fa-user text-primary mr-2"></i> Profile
        </a>
        <div class="dropdown-divider"></div>
        <!-- Logout Link -->
        <a href="#" class="dropdown-item"
           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="fa fa-sign-out-alt text-danger mr-2"></i> Logout
        </a>
        <!-- Logout Form -->
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </div>
</li>

<!-- Profile Modal -->
<div class="modal fade" id="profileModal" tabindex="-1" data-backdrop="false" data-keyboard="true" aria-labelledby="profileModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="profileModalLabel">Your Profile Picture</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <img src="{{ Auth::user()->profile_photo ? asset('storage/' . Auth::user()->profile_photo) : asset('default-avatar.png') }}"
                     class="img-circle elevation-2 mb-3"
                     alt="User Image" width="100" height="100">
                <div>
                    <!-- Camera Button -->
                    <button type="button" id="openPhotoModal" class="btn btn-light btn-sm">
                        <i class="fa fa-camera text-primary"></i> Change Photo
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Photo Source Modal -->
<div class="modal fade" id="photoSourceModal" tabindex="-1" data-backdrop="false" data-keyboard="true" aria-labelledby="photoSourceModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="photoSourceModalLabel">Choose Photo Source</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <form id="photoForm" action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="profile_photo" class="btn btn-primary btn-block">Upload from Computer</label>
                        <input type="file" id="profile_photo" name="profile_photo" accept="image/*" style="display: none;">
                    </div>
                    <button type="submit" class="btn btn-success btn-block">Save Photo</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Modal instances
        const profileModal = new bootstrap.Modal(document.getElementById('profileModal'), {
            backdrop: false,
            keyboard: true
        });
        const photoSourceModal = new bootstrap.Modal(document.getElementById('photoSourceModal'), {
            backdrop: false,
            keyboard: true
        });

        // Open profile modal
        document.getElementById('openProfileModal').addEventListener('click', function (e) {
            e.preventDefault();
            profileModal.show();
        });

        // Open photo source modal
        document.getElementById('openPhotoModal').addEventListener('click', function (e) {
            e.preventDefault();
            profileModal.hide();
            photoSourceModal.show();
        });

        // Return to profile modal when photo source modal closes
        document.getElementById('photoSourceModal').addEventListener('hidden.bs.modal', function () {
            profileModal.show();
        });
    });
</script>
