@extends('layouts.' . auth()->user()->role)

@section('title')
    Train Guide
@endsection

@section('content')
    <div class="content">
        <div class="table-wrapper">
            <div class="table-title">
                <h2>{{ ucfirst($muscle) }} Workout</h2>
                <input type="text" id="search" class="form-input" placeholder="Search exercise...">
            </div>

            <div id="exercise-list" class="stats-container"></div>
        </div>

        <!-- MODAL -->
        <div id="exercise-modal" style="display:none;">
            <div class="form-container">
                <h2 id="modal-title"></h2>
                <div id="modal-media"></div>
                <p id="modal-desc"></p>
                <button onclick="closeModal()" class="btn-submit">Close</button>
            </div>
        </div>
    </div>

    <script>
        const EXERCISES = @json($exercises);

        const listEl = document.getElementById("exercise-list");
        const searchEl = document.getElementById("search");

        function renderExercises(data) {
            listEl.innerHTML = "";

            data.forEach(ex => {
                listEl.innerHTML += `
            <div class="stat-box">
                <h3>${ex.name}</h3>
                <p class="stat-label">${ex.muscle_group}</p>
                <button class="btn-submit" onclick="showDetail(${ex.id})">View</button>
            </div>
        `;
            });
        }

        function showDetail(id) {
            const ex = EXERCISES.find(e => e.id === id);

            document.getElementById("modal-title").innerText = ex.name;
            document.getElementById("modal-desc").innerText = ex.description ?? "";

            let mediaHTML = "";

            ex.media.forEach(m => {
                if (m.type === "video") {
                    mediaHTML += `
                <iframe width="100%" height="200"
                    src="https://www.youtube.com/embed/${m.url}"
                    frameborder="0" allowfullscreen>
                </iframe>
            `;
                } else {
                    mediaHTML += `
                <img src="${m.url}" style="width:100%; border-radius:10px; margin-top:10px;">
            `;
                }
            });

            document.getElementById("modal-media").innerHTML = mediaHTML;
            document.getElementById("exercise-modal").style.display = "flex";
        }

        function closeModal() {
            document.getElementById("exercise-modal").style.display = "none";
        }

        // SEARCH
        searchEl.addEventListener("input", function() {
            const keyword = this.value.toLowerCase();

            const filtered = EXERCISES.filter(e =>
                e.name.toLowerCase().includes(keyword)
            );

            renderExercises(filtered);
        });

        // INIT
        renderExercises(EXERCISES);
    </script>
@endsection
