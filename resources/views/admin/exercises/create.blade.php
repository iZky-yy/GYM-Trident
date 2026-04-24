@extends('layouts.admin')

@section('title')
Tambah Exercise
@endsection

@section('content')
<div class="content">
    <div class="form-container">
        <h2 class="form-title">Tambah Exercise</h2>

        <form action="{{ route('exercises.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- NAMA -->
            <div class="form-group">
                <label>Nama Latihan</label>
                <input type="text" name="name" class="form-input" value="{{ old('name') }}">
                @error('name')
                    <div class="form-error">{{ $message }}</div>
                @enderror
            </div>

            <!-- OTOT -->
            <div class="form-group">
                <label>Target Otot</label>
                <select name="muscle_group" class="form-input">
                    <option value="">-- Pilih Otot --</option>
                    <option value="chest">Chest</option>
                    <option value="back">Back</option>
                    <option value="legs">Legs</option>
                    <option value="shoulder">Shoulder</option>
                    <option value="biceps">Biceps</option>
                    <option value="triceps">Triceps</option>
                </select>
                @error('muscle_group')
                    <div class="form-error">{{ $message }}</div>
                @enderror
            </div>

            <!-- DESKRIPSI -->
            <div class="form-group">
                <label>Deskripsi</label>
                <textarea name="description" class="form-input" rows="3">{{ old('description') }}</textarea>
            </div>

            <!-- YOUTUBE -->
            <div class="form-group">
                <label>Link YouTube</label>
                <input type="text" id="youtube" name="youtube" class="form-input"
                       placeholder="https://youtube.com/watch?v=..." value="{{ old('youtube') }}">
            </div>

            <!-- PREVIEW VIDEO -->
            <div id="youtube-preview" style="margin-top:15px;"></div>

            <!-- GAMBAR -->
            <div class="form-group">
                <label>Gambar Latihan</label>
                <input type="file" name="image" id="image" class="form-input">
            </div>

            <!-- PREVIEW GAMBAR -->
            <div style="margin-top:15px;">
                <img id="image-preview" style="width:100%; border-radius:10px; display:none;">
            </div>

            <!-- SUBMIT -->
            <button type="submit">Simpan Exercise</button>
        </form>
    </div>
</div>

<script>
// ==================
// PREVIEW YOUTUBE
// ==================
const youtubeInput = document.getElementById("youtube");
const preview = document.getElementById("youtube-preview");

youtubeInput.addEventListener("input", function () {
    const url = this.value;

    let videoId = "";

    // ambil ID youtube
    const match = url.match(/v=([^&]+)/);
    if (match) {
        videoId = match[1];
    } else {
        videoId = url; // fallback kalau langsung ID
    }

    if (videoId.length > 5) {
        preview.innerHTML = `
            <iframe width="100%" height="200"
                src="https://www.youtube.com/embed/${videoId}"
                frameborder="0" allowfullscreen>
            </iframe>
        `;
    } else {
        preview.innerHTML = "";
    }
});

// ==================
// PREVIEW GAMBAR
// ==================
const imageInput = document.getElementById("image");
const imagePreview = document.getElementById("image-preview");

imageInput.addEventListener("change", function () {
    const file = this.files[0];

    if (file) {
        const reader = new FileReader();

        reader.onload = function (e) {
            imagePreview.src = e.target.result;
            imagePreview.style.display = "block";
        };

        reader.readAsDataURL(file);
    }
});
</script>
@endsection
