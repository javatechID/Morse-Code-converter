<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Konverter Kode Morse</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    body {
      background-color: #f8f9fa;
    }

    .container {
      max-width: 800px;
      margin: 0 auto;
    }

    textarea {
      margin-top: 10px;
    }

    .btn {
      margin-top: 10px;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1 class="text-center mt-5 mb-4">Konverter Kode Morse</h1>
    <div class="row">
      <div class="col-md-6">
        <h3 class="text-center">Teks ke Morse</h3>
        <textarea id="text-to-morse-input" class="form-control" rows="6" placeholder="Masukkan teks..."></textarea>
        <button id="text-to-morse-btn" class="btn btn-primary btn-block mt-3">Konversi ke Morse</button>
        <textarea id="text-to-morse-output" class="form-control mt-3" rows="6" readonly></textarea>
        <button id="clear-text-to-morse" class="btn btn-danger btn-block mt-3">Bersihkan</button>
      </div>
      <div class="col-md-6">
        <h3 class="text-center">Morse ke Teks</h3>
        <textarea id="morse-to-text-input" class="form-control" rows="6" placeholder="Masukkan kode Morse..."></textarea>
        <button id="morse-to-text-btn" class="btn btn-primary btn-block mt-3">Konversi ke Teks</button>
        <textarea id="morse-to-text-output" class="form-control mt-3" rows="6" readonly></textarea>
        <button id="clear-morse-to-text" class="btn btn-danger btn-block mt-3">Bersihkan</button>
      </div>
    </div>
    <div class="row mt-3">
      <div class="col-md-6 offset-md-3">
        <button id="swap-btn" class="btn btn-secondary btn-block">Tukar</button>
      </div>
    </div>
    <div class="row mt-5">
      <div class="col-md-12">
        <h2 class="text-center">Tentang Kode Morse</h2>
        <p>Kode Morse adalah metode yang digunakan dalam telekomunikasi untuk mengkodekan karakter teks sebagai urutan dari dua durasi sinyal yang berbeda, disebut titik dan strip atau dit dan dah. Kode Morse dinamai dari Samuel Morse, penemu telegraf.</p>
        <p>Untuk menggunakan Kode Morse:</p>
        <ol>
          <li>Gunakan titik untuk sinyal pendek dan strip untuk sinyal panjang.</li>
          <li>Pisahkan setiap huruf dengan spasi.</li>
          <li>Pisahkan setiap kata dengan garis miring (/).</li>
        </ol>
        <p>Contohnya, "HELLO WORLD" akan diubah menjadi ".... . .-.. .-.. --- / .-- --- .-. .-.. -.."</p>
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script>
    $(document).ready(function() {
      // Dictionary Morse code
      var morseCode = {
        'A': '.-', 'B': '-...', 'C': '-.-.', 'D': '-..', 'E': '.', 'F': '..-.', 'G': '--.', 'H': '....',
        'I': '..', 'J': '.---', 'K': '-.-', 'L': '.-..', 'M': '--', 'N': '-.', 'O': '---', 'P': '.--.',
        'Q': '--.-', 'R': '.-.', 'S': '...', 'T': '-', 'U': '..-', 'V': '...-', 'W': '.--', 'X': '-..-',
        'Y': '-.--', 'Z': '--..', '0': '-----', '1': '.----', '2': '..---', '3': '...--', '4': '....-',
        '5': '.....', '6': '-....', '7': '--...', '8': '---..', '9': '----.', '.': '.-.-.-', ',': '--..--',
        '?': '..--..', '\'': '.----.', '!': '-.-.--', '/': '-..-.',
      };

      // Reverse Morse code dictionary
      var reverseMorseCode = {};
      for (var key in morseCode) {
        reverseMorseCode[morseCode[key]] = key;
      }

      // Convert text to Morse
      $('#text-to-morse-btn').click(function() {
        var text = $('#text-to-morse-input').val().toUpperCase();
        var morse = '';
        for (var i = 0; i < text.length; i++) {
          var char = text[i];
          if (morseCode[char]) {
            morse += morseCode[char] + ' ';
          } else if (char === ' ') {
            morse += '/ ';
          }
        }
        $('#text-to-morse-output').val(morse.trim());
      });

      // Convert Morse to text
      $('#morse-to-text-btn').click(function() {
        var morse = $('#morse-to-text-input').val().split(' ');
        var text = '';
        for (var i = 0; i < morse.length; i++) {
          if (reverseMorseCode[morse[i]]) {
            text += reverseMorseCode[morse[i]];
          } else if (morse[i] === '/') {
            text += ' ';
          }
        }
        $('#morse-to-text-output').val(text);
      });

      // Clear text-to-morse
      $('#clear-text-to-morse').click(function() {
        $('#text-to-morse-input').val('');
        $('#text-to-morse-output').val('');
      });

      // Clear morse-to-text
      $('#clear-morse-to-text').click(function() {
        $('#morse-to-text-input').val('');
        $('#morse-to-text-output').val('');
      });

      // Swap text
      $('#swap-btn').click(function() {
        var textToMorseInput = $('#text-to-morse-input').val();
        var textToMorseOutput = $('#text-to-morse-output').val();
        $('#text-to-morse-input').val($('#morse-to-text-input').val());
        $('#text-to-morse-output').val($('#morse-to-text-output').val());
        $('#morse-to-text-input').val(textToMorseInput);
        $('#morse-to-text-output').val(textToMorseOutput);
      });
    });
  </script>
</body>
</html>
