<div wire:init="refreshEditButton">
    <script>
        document.addEventListener('livewire:load', function () {
            Livewire.on('canAccessEditLink', function (canAccess) {
                showEditLinks();
            });

            function showEditLinks() {
                var editLinks = document.getElementsByClassName("edit-link");
                for (var i = 0; i < editLinks.length; i++) {
                    editLinks[i].classList.remove("d-none");
                }
            }
        });
    </script>
</div>