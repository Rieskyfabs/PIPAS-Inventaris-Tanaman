
document.addEventListener('DOMContentLoaded', function () {
        // Auto-fill logic when selecting plant code
        document.getElementById('plantAttributes').addEventListener('change', function () {
            var selectedOption = this.options[this.selectedIndex];
            // Mengambil data dari attribute 'data-*' di option yang dipilih
            var plantName = selectedOption.getAttribute('data-name');
            var scientificName = selectedOption.getAttribute('data-scientific-name');
            var plantTypeId = selectedOption.getAttribute('data-type-id');
            var categoryId = selectedOption.getAttribute('data-category-id');
            var plantBenefit = selectedOption.getAttribute('data-benefit');
            // Pilih option di select 'plantName' sesuai nama tanaman
            var plantNameSelect = document.getElementById('plantName');
            for (var i = 0; i < plantNameSelect.options.length; i++) {
                if (plantNameSelect.options[i].text === plantName) {
                    plantNameSelect.selectedIndex = i;
                    break;
                }
            }
            // Pilih option di select 'scientificName' sesuai nama ilmiah
            var scientificNameSelect = document.getElementById('scientificName');
            for (var i = 0; i < scientificNameSelect.options.length; i++) {
                if (scientificNameSelect.options[i].text === scientificName) {
                    scientificNameSelect.selectedIndex = i;
                    break;
                }
            }
            // Pilih option di select 'benefit' sesuai nama benefit
            var benefitSelect = document.getElementById('plantBenefit');
            for (var i = 0; i < benefitSelect.options.length; i++) {
                if (benefitSelect.options[i].text === plantBenefit) {
                    benefitSelect.selectedIndex = i;
                    break;
                }
            }
            // Isi otomatis field lainnya
            document.getElementById('plantType').value = plantTypeId || '';
            document.getElementById('plantCategories').value = categoryId || '';
            // document.getElementById('plantBenefits').value = benefitId || '';
            // Tampilkan additional fields
            document.getElementById('additionalFields').classList.remove('d-none');
            // Gunakan readonly bukan disabled
            if (plantName && scientificName && plantType) {
                plantNameSelect.setAttribute('readonly', 'readonly');
                scientificNameSelect.setAttribute('readonly', 'readonly');
                benefitSelect.setAttribute('readonly', 'readonly');
                document.getElementById('plantType').setAttribute('readonly', 'readonly');
                document.getElementById('plantCategories').setAttribute('readonly', 'readonly');
            }
        });
    });
    // Preview gambar
    function previewImage(event) {
        var imagePreview = document.getElementById('imagePreview');
        imagePreview.src = URL.createObjectURL(event.target.files[0]);
        imagePreview.style.display = 'block';
    }
    document.addEventListener('DOMContentLoaded', function() {
    // Open modal when "Tambah Lokasi Tanaman Baru" button is clicked
    document.getElementById('plantLocations').addEventListener('change', function() {
        if (this.value === 'add_new_location') {
            // Show the modal for adding a new location
            new bootstrap.Modal(document.getElementById('addNewLocationModal')).show();
            this.value = ''; // Reset dropdown
        }
    });
    // AJAX submission for adding a new location
    document.getElementById('addNewLocationForm').addEventListener('submit', function(event) {
        event.preventDefault();
        let formData = new FormData(this);
        // Check if location name already exists in the select options
        let existingLocationNames = Array.from(document.querySelectorAll('#plantLocations option'))
            .map(option => option.text);
        if (existingLocationNames.includes(formData.get('name'))) {
            alert('Nama lokasi sudah ada. Silakan gunakan nama lain.');
            return; // Stop submission if the location already exists
        }
        fetch("{{ route('addNewLocation') }}", {
            method: "POST",
            headers: {
                "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content
            },
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                let select = document.getElementById('plantLocations');
                let option = new Option(data.name, data.id);
                select.add(option, select.options[select.options.length - 1]); // Add before 'Add New' option
                // Set the select value to the newly added location
                select.value = data.id; // Automatically select the new location
                // Close the modal after successfully adding the location
                let newLocationModal = bootstrap.Modal.getInstance(document.getElementById('addNewLocationModal'));
                newLocationModal.hide();
                // Show the previous modal again
                new bootstrap.Modal(document.getElementById('plantAttribute')).show();
                // Reset the form for the next entry
                this.reset(); // Reset form fields
            } else {
                alert(data.message || "Error adding location");
            }
        })
        .catch(error => console.error('Error in AJAX request:', error));
    });
});