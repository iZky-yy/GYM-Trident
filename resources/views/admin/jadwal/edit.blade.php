@extends('layouts.admin')

@section('title')
    Tambah Jadwal
@endsection

@section('content')
<div class="content">
  <div class="form-container">
    <h2 class="form-title">Tambah Jadwal</h2>
    <form action="{{ route('admin.jadwal.update', $jadwal->id) }}" method="POST">
        @method('PUT')
      @csrf

      <label>Hari</label>
      <div class="checkbox-group">
        @foreach (['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'] as $hari)
          <label class="checkbox-label">
            <input type="checkbox" class="form-checkbox" name="hari[]" value="{{ $hari }}">
            {{ $hari }}
          </label>
        @endforeach
      </div>

      <label>Jam</label>
      <div class="clock-wrapper">
        <div class="clock-face" id="clockFace">
          <div class="clock-hand hour-hand" id="hourHand"></div>
          <div class="clock-hand minute-hand" id="minuteHand"></div>
          <div class="clock-center"></div>
        </div>
        <div class="clock-time-display" id="clockDisplay">00:00</div>
        <input type="time" name="jam" id="timeInput" class="form-input" required>
      </div>

      <button type="submit">Simpan</button>
    </form>
  </div>
</div>

<script>
  const numbers = [12,1,2,3,4,5,6,7,8,9,10,11];
  const face = document.getElementById('clockFace');

  numbers.forEach(n => {
    const angle = (n / 12) * 360 - 90;
    const rad = angle * Math.PI / 180;
    const r = 82;
    const x = 100 + r * Math.cos(rad);
    const y = 100 + r * Math.sin(rad);
    const el = document.createElement('span');
    el.className = 'clock-number';
    el.textContent = n;
    el.style.left = x + 'px';
    el.style.top = y + 'px';
    face.appendChild(el);
  });

  const timeInput = document.getElementById('timeInput');
  const hourHand = document.getElementById('hourHand');
  const minuteHand = document.getElementById('minuteHand');
  const clockDisplay = document.getElementById('clockDisplay');

  timeInput.addEventListener('input', function () {
    const [h, m] = this.value.split(':').map(Number);
    const hourDeg = (h % 12) * 30 + m * 0.5;
    const minDeg = m * 6;
    hourHand.style.transform = `translateX(-50%) rotate(${hourDeg}deg)`;
    minuteHand.style.transform = `translateX(-50%) rotate(${minDeg}deg)`;
    clockDisplay.textContent = this.value;
  });
</script>
@endsection
