<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contador de Saudade 😥</title>
    <style>
        body {
            font-family: "Nirmala UI", sans-serif;
            text-align: center;
            padding: 50px;
        }
        /* Animação para o H1 */
        @keyframes slideIn {
            0% {
                opacity: 0;
                transform: translateY(50px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Estilo da barra de progresso */
        #progressBar {
            width: 100%;
            background-color: #f3f3f3;
            border: 1px solid #ddd;
            height: 30px;
            border-radius: 5px;
            margin-bottom: 20px;
            overflow: hidden;
        }

        /* Barra de progresso com animação de faixas */
        #progress {
            height: 100%;
            width: 0;
            border-radius: 5px;
            background: linear-gradient(90deg, #0987d0 50%, #679cc5 50%, #0987d0 50%, #679cc5 50%, #4caf50 50%, #2196f3 50%);
            background-size: 40% 100%;
            animation: moveStripes 2s linear infinite;
            transition: width 0.5s ease;
        }

        /* Animação das faixas se movendo pela barra */
        @keyframes moveStripes {
            from {
                background-position: 0 0;
            }
            to {
                background-position: 200% 0;
            }
        }
        #timer {
            font-size: 24px;
            font-weight: bold;
        }
        #texto {
            font-size: 20px;
            font-weight: bold;
        }
    </style>
</head>
<body>

<h1><img src="https://i.gifer.com/YyBQ.gif" alt="loading gif">
</h1>
<!-- Barra de progresso -->
<div id="progressBar">
    <div id="progress"></div>
</div>

<!-- Timer -->
<div id="timer">00:00:00</div>
<div id="texto" > Para a Europa </div>
<div> <img src="https://i.gifer.com/6oa.gif" height="50px"></div>
<script>
    // Definir a data final (fixa)
    const endDate = new Date("2024-12-21 14:00:00").getTime();

    // Obter a data atual
    const startDate = new Date("2024-08-27 00:00:00").getTime();

    // Calcular o intervalo total de tempo (em milissegundos)
    const totalTime = endDate - startDate;

    const progressBar = document.getElementById('progress');
    const timerElement = document.getElementById('timer');

    function updateProgressBar() {
        // Calcular o tempo restante
        const now = new Date().getTime();
        const timeLeft = endDate - now;

        // Calcular o progresso (em %)
        const progress = ((totalTime - timeLeft) / totalTime) * 100;
        progressBar.style.width = Math.min(progress, 100) + '%';

        // Atualizar o timer
        updateTimer(timeLeft);

        // Parar quando atingir 100%
        if (timeLeft <= 0) {
            clearInterval(interval);
        }
    }

    function updateTimer(timeLeft) {
        // Converter milissegundos para dias, horas, minutos e segundos
        const days = Math.floor(timeLeft / (1000 * 60 * 60 * 24));
        const hours = Math.floor((timeLeft % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        const minutes = Math.floor((timeLeft % (1000 * 60 * 60)) / (1000 * 60));
        const seconds = Math.floor((timeLeft % (1000 * 60)) / 1000);

        // Exibir no formato "DD:HH:MM:SS"
        timerElement.innerHTML =
            (days > 0 ? days + 'd ' : '') +
            (hours < 10 ? '0' : '') + hours + ':' +
            (minutes < 10 ? '0' : '') + minutes + ':' +
            (seconds < 10 ? '0' : '') + seconds;
    }


    // Atualiza a cada segundo
    const interval = setInterval(updateProgressBar, 1000);

    // Inicializa o timer ao carregar a página
    window.onload = function() {
        updateProgressBar();
    }
</script>

</body>
</html>
